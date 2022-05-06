<?php

namespace App\DataTables\Reports;

use App\Models\PersonalInformation;
use App\Models\Course;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;
use Illuminate\Support\Carbon;


class WithExpiredCertificationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $currentTime = Carbon::now();
        $deadLine = Carbon::now()->addMonthsWithOverflow(2)->addDays(15);
        $deadLineFormated = $deadLine->format('Y-m-d');
        $collection = Course::with(['personalInformation.operationalInformation.rank'])
                            ->where('end_date','<',$deadLineFormated)
                            ->get()
                            ->map(function ($item, $key) use ($currentTime){
                                $endDate = Carbon::createFromFormat('d-m-Y', $item->end_date);
                                $toEndDate = $endDate->longRelativeDiffForHumans($currentTime,3);
                                $beforePosition = strrpos($toEndDate,'before');
                                if ( $beforePosition !== false ) {
                                    $toEndDate = "- ".str_replace(' before','',$toEndDate);
                                }
                                else {
                                    $afterPosition = strrpos($toEndDate,'after');
                                    if ( $afterPosition !== false ) {
                                        $toEndDate = str_replace(' after','',$toEndDate);
                                    }
                                }

                                return [
                                    'id' =>  $item->personalInformation->id,
                                    'course_number' => $item->courseNumber->name,
                                    'time_to_deadLine' => $toEndDate,
                                    'expired' => $beforePosition !== false ? true : false,
                                    'full_name' => $item->personalInformation->full_name,
                                    'avatar' => $item->personalInformation->avatar,
                                    'rank' => $item->personalInformation->operationalInformation->rank->name
                                ];
                            })->sortByDesc([
                                ['course_number', 'asc'],
                                ['rank', 'asc']
                            ]);
        $dataTable = new CollectionDataTable($collection);
        return $dataTable->editColumn('time_to_deadLine', function($data){
            if($data['expired']){
                return "<div class='datatable-cell-color-red'>".$data['time_to_deadLine']."</div>";
            }
            return "<div class='datatable-cell-color-yellow'>".$data['time_to_deadLine']."</div>";
        })
        ->addColumn('avatar', function ($data) {
            $image = "/img/default-image.png";
            if ($data['avatar'] != null && $data['avatar'] != "") {
                $image = $data['avatar'];
            }
            return "<img class='thumbnail' src='" . $image . "' width='100px' height='auto'/>";
        })->rawColumns(['avatar','time_to_deadLine']);

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
            'time_to_deadLine',
            'rank',
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
