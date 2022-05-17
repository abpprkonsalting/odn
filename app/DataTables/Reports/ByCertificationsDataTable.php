<?php

namespace App\DataTables\Reports;

use App\Models\Course;
use App\Models\PersonalInformation;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;

class ByCertificationsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $collection = Course::with(['personalInformation.operationalInformation.rank'])
                            ->get()
                            ->map(function ($item, $key) {
                                return [
                                    'id' =>  $item->personalInformation->id,
                                    'course_number' => $item->courseNumber->name,
                                    'full_name' => $item->personalInformation->full_name,
                                    'avatar' => $item->personalInformation->avatar,
                                    'rank' => $item->personalInformation->operationalInformation?->rank->name,
                                    'course_date' => $item->start_date,
                                    'caducity_date' => $item->end_date,
                                    'internal_file_number' => $item->personalInformation->internal_file_number
                                ];
                            })->sortByDesc([
                                ['course_number','asc'],
                                ['rank','asc']
                            ]);
        $dataTable = new CollectionDataTable($collection);
        return $dataTable->addColumn('avatar', function($data) {
            $image = "/img/default-image.png";
            if($data['avatar'] != null && $data['avatar'] != "") {
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
            'course_number',
            'course_date',
            'caducity_date',
            'rank',
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
