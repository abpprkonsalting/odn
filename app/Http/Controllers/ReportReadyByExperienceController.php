<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ReadyByExperienceDataTable;
use App\Http\Controllers\AppBaseController;

class ReportReadyByExperienceController extends AppBaseController
{

    public function index(ReadyByExperienceDataTable $readyByExperienceDataTable)
    {
        return $readyByExperienceDataTable->render('report_ready_by_experience.index');
    }
}
