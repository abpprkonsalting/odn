<?php

namespace App\DataTables\Reports;

use App\Models\PersonalInformation;
use App\Models\OperationalInformation;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;

use App\Models\Status;

class DismissedDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dismissedStatusId = Status::where(['name' => "Dismissed"])->first()->id;
        $collection = OperationalInformation::with(['personalInformation.company','status','rank'])
                                            ->where(['statuses_id' => $dismissedStatusId])
                                            ->get()
                                            ->map(function ($item, $key) {
                                                return [
                                                    'id' =>  $item->personalInformation->id,
                                                    'company' => $item->personalInformation->company?->company_name,
                                                    'avatar' => $item->personalInformation->avatar,
                                                    'full_name' => $item->personalInformation->full_name,
                                                    'reason' => $item->description
                                                ];
                                            })->sortBy([
                                                ['company','asc'],
                                                ['full_name','asc']
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
            'company',
            'avatar',
            'full_name',
            'reason'
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
