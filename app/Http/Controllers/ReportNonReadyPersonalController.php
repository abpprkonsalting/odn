<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\NonReadyPersonalDataTable;
use App\Http\Controllers\AppBaseController;

class ReportNonReadyPersonalController extends AppBaseController
{

    public function index(NonReadyPersonalDataTable $nonReadyPersonalDataTable)
    {
        return $nonReadyPersonalDataTable->render('report_non_ready_personal.index');
    }

}
