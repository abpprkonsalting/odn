<?php

namespace App\DataTables\Reports;

use App\Models\LicenseEndorsement;
use App\Models\PersonalInformation;
use App\Models\Country;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;

class WithForeignLicenseByTypeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $cubaCountryId = Country::where(['name' => "Cuba"])->first()->id;
        $collection = LicenseEndorsement::with(['personalInformation','country','licenseEndorsementType'])
                                        ->whereNotIn('countries_id',[$cubaCountryId])
                                        ->get()
                                        ->map(function ($item, $key) {
                                            return [
                                                'id' =>  $item->personalInformation->id,
                                                'country' => $item->country->name,
                                                'license_type' => $item->licenseEndorsementType->name,
                                                'avatar' => $item->personalInformation->avatar,
                                                'full_name' => $item->personalInformation->full_name
                                            ];
                                        });

        $dataTable = new CollectionDataTable($collection);
        return $dataTable->addColumn('avatar', function($data) {
            $image = "/img/default-image.png";
            if($data['avatar'] != null && $data['avatar'] != "") {
                $image = $data['avatar'];
            }
            return "<img class='thumbnail' src='" . $image . "' width='100px' height='auto'/>";
        })->addColumn('action', 'personal_informations.datatables_edit_action')
        ->rawColumns(['avatar', 'action']);
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
            'avatar',
            'full_name',
            'country',
            'license_type'
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
