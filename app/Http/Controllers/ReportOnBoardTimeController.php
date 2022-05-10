<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\OnBoardTimeDataTable;
use App\Http\Controllers\AppBaseController;

class ReportOnBoardTimeController extends AppBaseController
{

    public function index(OnBoardTimeDataTable $onBoardTimeDataTable)
    {
        return $onBoardTimeDataTable->render('report_onboard_time.index');
    }

}
