<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\WithExpiredCertificationDataTable;
use App\Http\Controllers\AppBaseController;

class WithExpiredCertificationController extends AppBaseController
{

    public function index(WithExpiredCertificationDataTable $withExpiredCertificationDataTable)
    {
        return $withExpiredCertificationDataTable->render('with_expired_certification.index');
    }
}
