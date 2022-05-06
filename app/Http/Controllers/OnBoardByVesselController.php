<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\OnBoardByVesselDataTable;
use App\Http\Controllers\AppBaseController;

class OnBoardByVesselController extends AppBaseController
{

    public function index(OnBoardByVesselDataTable $onBoardByVesselDataTable)
    {
        return $onBoardByVesselDataTable->render('onboard_by_vessels.index');
    }
}
