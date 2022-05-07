<?php

namespace App\Http\Controllers;

use App\DataTables\Reports\ByLanguageSkillsDataTable;
use App\Http\Controllers\AppBaseController;

class ReportByLanguageSkillsController extends AppBaseController
{

    public function index(ByLanguageSkillsDataTable $byLanguageSkillsDataTable)
    {
        return $byLanguageSkillsDataTable->render('report_by_languageSkills.index');
    }

}
