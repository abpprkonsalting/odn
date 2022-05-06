<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\OnBoardTimeDataTable;
use App\Http\Controllers\AppBaseController;

class OnBoardTimeController extends AppBaseController
{

    public function index(OnBoardTimeDataTable $onBoardTimeDataTable)
    {
        return $onBoardTimeDataTable->render('onboard_time.index');
    }

}
