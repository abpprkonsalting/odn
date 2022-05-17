<?php

namespace App\DataTables\Reports;

use App\Models\LicenseEndorsement;
use App\Models\PersonalInformation;
use App\Models\Country;
use App\Models\Course;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;
use Illuminate\Support\Carbon;

class SeafarersByRankDataTable extends DataTable
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
        $collection = Course::get()
                            ->groupBy('personal_informations_id')
                            ->map(function ($item, $key) use ($currentTime){
                                $highestRankCourseNumber = $item->reduce(function($carry,$i){
                                    if ($carry == null) {
                                        return $i;
                                    }
                                    $carryRank = $carry->courseNumber->rank->order;
                                    $currentRank = $i->courseNumber->rank->order;
                                    if ($currentRank > $carryRank) {
                                        $carry->courseNumber = $i->courseNumber;
                                    }
                                    return $carry;
                                });
                                $birthday = Carbon::createFromFormat('d-m-Y', $highestRankCourseNumber->personalInformation->birthday);
                                $age = $currentTime->longRelativeDiffForHumans($birthday);
                                $afterPosition = strrpos($age,'after');
                                    if ( $afterPosition !== false ) {
                                        $age = str_replace(' after','',$age);
                                    }
                                return collect([
                                    'id' =>     $highestRankCourseNumber->personalInformation->id,
                                    'rank' =>    $highestRankCourseNumber->courseNumber->rank->name,
                                    'rankOrder' => $highestRankCourseNumber->courseNumber->rank->order,
                                    'full_name' =>   $highestRankCourseNumber->personalInformation->full_name,
                                    'avatar' => $highestRankCourseNumber->personalInformation->avatar,
                                    'age' => $age,
                                    'internal_file_number' => $highestRankCourseNumber->personalInformation->internal_file_number
                                ]);
                            })
                            ->sortBy([
                                ['rankOrder','desc'],
                                ['age','desc'],
                                ['full_name','asc']
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
            'avatar',
            'full_name',
            'internal_file_number',
            'rank',
            'age'
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
