<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\DismissedDataTable;
use App\Http\Controllers\AppBaseController;

class ReportDismissedController extends AppBaseController
{

    public function index(DismissedDataTable $dismissedDataTable)
    {
        return $dismissedDataTable->render('report_dismissed.index');
    }

}
