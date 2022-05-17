<?php

namespace App\DataTables\Reports;

use App\Models\Passport;
use App\Models\PersonalInformation;
use App\Models\Country;
use App\Models\Visa;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;
use Illuminate\Support\Carbon;

class SeafarersVisasDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $cubaCountry = Country::where(['name' => "Cuba"])->first();
        if (!empty($cubaCountry)) {
            $currentTime = Carbon::now()->format('Y-m-d');
            $cubaCountryId = $cubaCountry->id;
            $collection = Passport::whereNotIn('countries_id', [$cubaCountryId])
                ->where(function ($query) use ($currentTime) {
                    $query->where('expiry_date', '>', $currentTime)
                            ->orWhere(function ($query) use ($currentTime) {
                                $query->whereNotNull('expiry_extension_date')
                                    ->where('expiry_extension_date', '>', $currentTime);
                            });
                })
                ->get()
                ->map(function ($item, $key) {
                    return [
                        'id' =>  $item->personalInformation->id,
                        'passport_nationality' => $item->country->name,
                        'avatar' => $item->personalInformation->avatar,
                        'full_name' => $item->personalInformation->full_name,
                        'destination' => $item->country->name,
                        'expiry' => $item->expiry_extension_date != null ? $item->expiry_extension_date : $item->expiry_date,
                        'internal_file_number' => $item->personalInformation->internal_file_number
                    ];
                });
            $collection_2 = Visa::whereNotIn('countries_id', [$cubaCountryId])
                ->where('expiry_date', '>', $currentTime)
                ->get()
                ->map(function ($item, $key) {
                    return [
                        'id' =>  $item->personalInformationId(),
                        'passport_nationality' => $item->passport->country->name,
                        'avatar' => $item->passport->personalInformation->avatar,
                        'full_name' => $item->passport->personalInformation->full_name,
                        'destination' => $item->country->name,
                        'expiry' => $item->expiry_date,
                        'internal_file_number' => $item->passport->personalInformation->internal_file_number
                    ];
                });
            $collection = $collection->concat($collection_2)
                        ->sortByDesc([
                            ['destination', 'asc'],
                            ['expiry', 'asc']
                        ]);
            $dataTable = new CollectionDataTable($collection);
            return $dataTable->addColumn('avatar', function ($data) {
                $image = "/img/default-image.png";
                if ($data['avatar'] != null && $data['avatar'] != "") {
                    $image = $data['avatar'];
                }
                return "<img class='thumbnail' src='" . $image . "' width='100px' height='auto'/>";
            })->addColumn('action', 'personal_informations.datatables_edit_action')
                ->rawColumns(['avatar', 'action']);
        }
        $collection = collect([]);
        $dataTable = new CollectionDataTable($collection);
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PersonalInformation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PersonalInformation $model)
    {
        return $model->query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'destination',
            'passport_nationality',
            'expiry',
            'avatar',
            'full_name',
            'internal_file_number'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'personal_informations_datatable_' . time();
    }
}
