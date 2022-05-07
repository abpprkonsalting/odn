<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ByStatusWithTimeInStatusDataTable;
use App\Http\Controllers\AppBaseController;


class ByStatusWithTimeInStatusController extends AppBaseController
{

    public function index(ByStatusWithTimeInStatusDataTable $byStatusWithTimeInStatusDataTable)
    {
        return $byStatusWithTimeInStatusDataTable->render('by_status_with_time_in_status.index');
    }
}
