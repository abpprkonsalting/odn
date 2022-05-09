<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\WithForeignLicenseByTypeDataTable;
use App\Http\Controllers\AppBaseController;
use Response;

class ReportWithForeignLicenseByTypeController extends AppBaseController
{
    public function __construct()
    {
    }

    /**
     *
     * @param WithForeignLicenseByTypeDataTable $personalInformationDataTable
     * @return mixed
     */
    public function index(WithForeignLicenseByTypeDataTable $withForeignLicenseByTypeDataTable)
    {
        return $withForeignLicenseByTypeDataTable->render('report_with_foreign_license_by_type.index');
    }

}
