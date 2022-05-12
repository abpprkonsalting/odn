<?php

namespace App\DataTables\Reports;

use App\Models\PersonalInformation;
use App\Models\SeaGoingExperience;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;

class SeafarersByEngineTypeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $collection = SeaGoingExperience::get()
            ->map(function ($item, $key) {
                $endDate = Carbon::createFromFormat('d-m-Y', $item->end_date);
                $startDate = Carbon::createFromFormat('d-m-Y', $item->start_date);
                return [
                    'id' => $item->personal_information_id,
                    'engine_type' => $item->vessel->engineType->name,
                    'full_name' => $item->personalInformation->full_name,
                    'avatar' => $item->personalInformation->avatar,
                    'experience' => $endDate->diffInDays($startDate)
                ];
            })
            ->groupBy(function ($item, $key) {
                return $item['id'] . "-" . $item['engine_type'];
            })
            ->map(function ($item, $key) {
                $first = $item->first();
                $carbon = Carbon::now()->addDay($item->sum('experience'));
                $experienceForHumans = Carbon::now()->longAbsoluteDiffForHumans($carbon, 3);
                return collect([
                    'id' =>     $first["id"],
                    'engine_type' =>  $first["engine_type"],
                    'full_name' =>   $first["full_name"],
                    'avatar' =>   $first["avatar"],
                    'experience' =>  $experienceForHumans
                ]);
            })
            ->sortBy([
                ['engine_type', 'asc'],
                ['experience', 'asc']
            ]);
        $dataTable = new CollectionDataTable($collection);
        return $dataTable->addColumn('avatar', function ($data) {
            $image = "/img/default-image.png";
            if ($data['avatar'] != null && $data['avatar'] != "") {
                $image = $data['avatar'];
            }
            return "<img class='thumbnail' src='" . $image . "' width='100px' height='auto'/>";
        })->rawColumns(['avatar']);
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
            'engine_type',
            'experience',
            'avatar',
            'full_name'
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
