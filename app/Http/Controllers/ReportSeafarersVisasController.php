<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\SeafarersVisasDataTable;
use App\Http\Controllers\AppBaseController;
use Response;

class ReportSeafarersVisasController extends AppBaseController
{
    public function __construct()
    {
    }

    /**
     *
     * @param SeafarersVisasDataTable $SeafarersVisasDataTable
     * @return mixed
     */
    public function index(SeafarersVisasDataTable $SeafarersVisasDataTable)
    {
        return $SeafarersVisasDataTable->render('report_seafarers_visas.index');
    }

}
