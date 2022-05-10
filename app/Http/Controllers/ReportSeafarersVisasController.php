<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ReportSeafarersVisasDataTable;
use App\Http\Controllers\AppBaseController;
use Response;

class ReportSeafarersVisasController extends AppBaseController
{
    public function __construct()
    {
    }

    /**
     *
     * @param ReportSeafarersVisasDataTable $reportSeafarersVisasDataTable
     * @return mixed
     */
    public function index(ReportSeafarersVisasDataTable $reportSeafarersVisasDataTable)
    {
        return $reportSeafarersVisasDataTable->render('report_seafarers_visas.index');
    }

}
