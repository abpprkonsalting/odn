<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\WithExpiredCertificationDataTable;
use App\Http\Controllers\AppBaseController;

class ReportWithExpiredCertificationController extends AppBaseController
{

    public function index(WithExpiredCertificationDataTable $withExpiredCertificationDataTable)
    {
        return $withExpiredCertificationDataTable->render('report_with_expired_certification.index');
    }
}
