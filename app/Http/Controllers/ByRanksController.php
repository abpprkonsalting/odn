<?php

namespace App\Http\Controllers;

use App\DataTables\ByRanksDataTable;
use App\Http\Controllers\AppBaseController;

class ByRanksController extends AppBaseController
{

    public function __construct()
    {
    }

    public function index(ByRanksDataTable $byRanksDataTable)
    {
        return $byRanksDataTable->render('by_ranks.index');
    }


}
