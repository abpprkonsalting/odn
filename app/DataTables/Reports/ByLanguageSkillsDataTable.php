<?php

namespace App\DataTables\Reports;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;

use App\Models\PersonalInformation;
use App\Models\LanguageInformation;

class ByLanguageSkillsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $collection = LanguageInformation::with(['personalInformation','language','languageSkill','level'])
                                            ->get()
                                            ->map(function ($item, $key) {
                                                return [
                                                    'id' =>  $item->personalInformation->id,
                                                    'language' => $item->language->name,
                                                    'skill' => $item->languageSkill->name,
                                                    'level' => $item->level->name,
                                                    'full_name' => $item->personalInformation->full_name,
                                                    'avatar' => $item->personalInformation->avatar
                                                ];})
                                            ->groupBy(function ($item, $key) {
                                                return $item['id']."-".$item['language'];
                                            })
                                            ->map(function($item,$key){
                                                $first = $item->first();
                                                $proficiency = [];
                                                foreach ($item as $value) {
                                                    $proficiency[$value['skill']] = $value['level'];
                                                }
                                                return [
                                                    'language' => $first["language"],
                                                    'name' => $first["full_name"],
                                                    'avatar' => $first['avatar'],
                                                    'proficiency' => $proficiency
                                                ];
                                            });
        $dataTable = new CollectionDataTable($collection);

        return $dataTable->addColumn('avatar', function($data) {
            $image = "/img/default-image.png";
            if($data['avatar'] != null && $data['avatar'] != "") {
                $image = $data['avatar'];
            }
            return "<img class='thumbnail' src='" . $image . "' width='100px' height='auto'/>";
        })->editColumn('proficiency', function($data){
            $keysColumn = "<div style=\"width: 50%;\">";
            $valuesColumn = "<div style=\"width: 50%;\">";
            foreach ($data['proficiency'] as $key => $value) {
                $keysColumn .= "<div>".$key."</div>";
                $classEnding = $value == "High" ? "green" : ($value == "Middle" ? "yellow" : "red");
                $valuesColumn .= "<div class=\"datatable-cell-color-".$classEnding."\">".$value."</div>";
            }
            return "<div style=\"display: flex;\">".$keysColumn."</div>".$valuesColumn."</div></div>";
        })
        ->rawColumns(['avatar','proficiency']);
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
            'language',
            'proficiency',
            'avatar',
            'name'
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
