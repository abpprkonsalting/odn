<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\SeafarersByEngineTypeDataTable;
use App\Http\Controllers\AppBaseController;
use Response;

class ReportSeafarersByEngineTypeController extends AppBaseController
{
    public function __construct()
    {
    }

    /**
     *
     * @param SeafarersByEngineTypeDataTable $seafarersByEngineTypeDataTable
     * @return mixed
     */
    public function index(SeafarersByEngineTypeDataTable $seafarersByEngineTypeDataTable)
    {
        return $seafarersByEngineTypeDataTable->render('report_seafarers_by_enginetype.index');
    }

}
