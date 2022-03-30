<?php

namespace App\DataTables;

use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PersonalInformationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('avatar', function($data) {
            $image = "/img/default-image.png";
            if($data->avatar == "" && Storage::disk('public')->exists("{$data->internal_file_number}/FOTO.jpg")) {
                $image = asset("storage/{$data->internal_file_number}/FOTO.jpg");
            }
            return "<img class='thumbnail' src='" . $image . "' width='100px' height='auto'/>";
        })
        ->addColumn('action', 'personal_informations.datatables_actions')
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
        return $model->newQuery();
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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            'internal_file_number',
            'external_file_number',
            'id_number',
            'serial_number',
            /*'birthday',
            'birthplace',
            'province_id',
            'municipality_id',
            'address',
            'political_integration_id',
            'principal_phone',
            'secondary_phone',
            'cell_phone',
            'relevant_action',
            'skin_color',
            'sex',
            'eyes_color_id',
            'hair_color_id',
            'height',
            'weight',
            'particular_sings',
            'email',
            'marital_status_id',
            'school_grade_id',
            'avatar'*/
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
