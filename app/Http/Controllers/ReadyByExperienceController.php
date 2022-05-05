<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ReadyByExperienceDataTable;
use App\Http\Controllers\AppBaseController;

class ReadyByExperienceController extends AppBaseController
{

    public function index(ReadyByExperienceDataTable $readyByExperienceDataTable)
    {
        return $readyByExperienceDataTable->render('ready_by_experience.index');
    }
}
