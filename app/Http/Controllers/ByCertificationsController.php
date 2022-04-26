<?php

namespace App\Http\Controllers;

use App\DataTables\ByCertificationsDataTable;
use App\Http\Controllers\AppBaseController;

class ByCertificationsController extends AppBaseController
{

    public function index(ByCertificationsDataTable $byCertificationsDataTable)
    {
        return $byCertificationsDataTable->render('by_certifications.index');
    }

   
}
