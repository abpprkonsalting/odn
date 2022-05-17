<?php

namespace App\DataTables\Reports;

use App\Models\PersonalInformation;
use App\Models\OperationalInformation;
use App\Models\SeaGoingExperience;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Models\Status;

class ReadyByExperienceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $readyStatus = Status::where(['name' => "Ready"])->first();
        $collection = SeaGoingExperience::with(['personalInformation.operationalInformation.status', 'vessel.vesselType', 'rank'])
                                        ->get()
                                        ->filter(function ($value, $key) use ($readyStatus){
                                            return $value->personalInformation->operationalInformation?->status == $readyStatus;
                                        })
                                        ->map(function ($item, $key) {
                                            $startDateCarbon = Carbon::createFromFormat('d-m-Y',$item->start_date);
                                            $endDateCarbon = Carbon::createFromFormat('d-m-Y',$item->end_date);
                                            return [
                                                'id' => $item->personal_information_id,
                                                'rank' =>  $item->rank->name,
                                                'vessel_type' => $item->vessel->vesselType->title,
                                                'full_name' => $item->personalInformation->full_name,
                                                'avatar' => $item->personalInformation->avatar,
                                                'experience' => $endDateCarbon->diffInDays($startDateCarbon),
                                                'internal_file_number' => $item->personalInformation->internal_file_number
                                            ];
                                        })
                                        ->groupBy(function ($item, $key) {
                                            return $item['id']."-".$item['vessel_type']."-".$item['rank'];
                                        })
                                        ->map(function ($item, $key) {
                                            $first = $item->first();
                                            $carbon = Carbon::now()->addDay($item->sum('experience'));
                                            $experienceForHumans = Carbon::now()->longAbsoluteDiffForHumans($carbon, 3);
                                            return collect([
                                                'id' =>     $first["id"],
                                                'rank' =>    $first["rank"],
                                                'vessel_type' =>  $first["vessel_type"],
                                                'full_name' =>   $first["full_name"],
                                                'avatar' =>   $first["avatar"],
                                                'experience' =>  $experienceForHumans,
                                                'internal_file_number' =>$first["internal_file_number"]
                                            ]);
                                        })
                                        ->sortBy([
                                            ['vessel_type','asc'],
                                            ['rank','asc'],
                                            ['experience','asc']
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
            'vessel_type',
            'rank',
            'experience',
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
