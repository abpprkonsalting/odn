<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ByCertificationsDataTable;
use App\Http\Controllers\AppBaseController;

class ReportByCertificationsController extends AppBaseController
{

    public function index(ByCertificationsDataTable $byCertificationsDataTable)
    {
        return $byCertificationsDataTable->render('by_certifications.index');
    }

}
