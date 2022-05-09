<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\RanksByAgesDataTable;
use App\Http\Controllers\AppBaseController;

class ReportRanksByAgesController extends AppBaseController
{

    public function index(RanksByAgesDataTable $ranksByAgesDataTable)
    {
        return $ranksByAgesDataTable->render('report_ranks_by_ages.index');
    }
}
