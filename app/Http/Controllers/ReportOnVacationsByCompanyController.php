<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\OnVacationsByCompanyDataTable;
use App\Http\Controllers\AppBaseController;

class ReportOnVacationsByCompanyController extends AppBaseController
{

    public function index(OnVacationsByCompanyDataTable $onVacationsByCompanyDataTable)
    {
        return $onVacationsByCompanyDataTable->render('report_onvacations_by_company.index');
    }
}
