<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ByRanksDataTable;
use App\Http\Controllers\AppBaseController;

class ReportByRanksController extends AppBaseController
{

    public function index(ByRanksDataTable $byRanksDataTable)
    {
        return $byRanksDataTable->render('by_ranks.index');
    }

}