<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ByStatusWithTimeInStatusDataTable;
use App\Http\Controllers\AppBaseController;


class ReportByStatusWithTimeInStatusController extends AppBaseController
{

    public function index(ByStatusWithTimeInStatusDataTable $byStatusWithTimeInStatusDataTable)
    {
        return $byStatusWithTimeInStatusDataTable->render('report_by_status_with_time_in_status.index');
    }
}
