<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\SeafarersByRankDataTable;
use App\Http\Controllers\AppBaseController;
use Response;

class ReportSeafarersByRankController extends AppBaseController
{
    public function __construct()
    {
    }

    /**
     *
     * @param SeafarersByRankDataTable $seafarersByRankDataTable
     * @return mixed
     */
    public function index(SeafarersByRankDataTable $seafarersByRankDataTable)
    {
        return $seafarersByRankDataTable->render('report_seafarers_by_rank.index');
    }

}
