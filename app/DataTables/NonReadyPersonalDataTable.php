<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;

use App\Models\PersonalInformation;
use App\Models\OperationalInformation;
use App\Models\Status;
use App\Services\StatusService;

class NonReadyPersonalDataTable extends DataTable
{
    private $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $nonReadyStatus = Status::where(['name' => "Non Ready"])->first();
        $collection = collect($this->statusService->checkPersonalInformationStatus(null,true));
        $filtered = $collection->filter(function ($value, $key) use ($nonReadyStatus) {
            return $value['personalInformation']?->operationalInformation?->status == null ? true :
                $value['personalInformation']?->operationalInformation?->status == $nonReadyStatus;
        });

        $collection = $filtered->map(function ($item, $key) {
            return [
                'id' =>  $item["personalInformation"]->id,
                'passport_valid' => $item['passport'],
                'medical_informations_valid' => $item['medical_informations'],
                'courses_valid' => $item['courses'],
                'licences_valid' => $item['licences'],
                'seamanbook_valid' => $item['seamanbook'],
                'avatar' => $item["personalInformation"]->avatar,
                'full_name' => $item["personalInformation"]->full_name
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
            ->addAction(['width' => '120px', 'printable' => false])
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
            'passport_valid',
            'medical_informations_valid',
            'courses_valid',
            'licences_valid',
            'seamanbook_valid'
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
