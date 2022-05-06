<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\OnVacationsByCompanyDataTable;
use App\Http\Controllers\AppBaseController;

class OnVacationsByCompanyController extends AppBaseController
{

    public function index(OnVacationsByCompanyDataTable $onVacationsByCompanyDataTable)
    {
        return $onVacationsByCompanyDataTable->render('onvacations_by_company.index');
    }
}
