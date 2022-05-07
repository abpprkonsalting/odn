<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\RanksByAgesDataTable;
use App\Http\Controllers\AppBaseController;

class RanksByAgesController extends AppBaseController
{

    public function index(RanksByAgesDataTable $ranksByAgesDataTable)
    {
        return $ranksByAgesDataTable->render('ranks_by_ages.index');
    }
}
