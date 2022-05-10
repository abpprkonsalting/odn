<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\OnBoardByVesselDataTable;
use App\Http\Controllers\AppBaseController;

class ReportOnBoardByVesselController extends AppBaseController
{

    public function index(OnBoardByVesselDataTable $onBoardByVesselDataTable)
    {
        return $onBoardByVesselDataTable->render('report_onboard_by_vessels.index');
    }
}
