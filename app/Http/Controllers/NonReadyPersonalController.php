<?php

namespace App\Http\Controllers;

use App\DataTables\NonReadyPersonalDataTable;
use App\Http\Controllers\AppBaseController;

class NonReadyPersonalController extends AppBaseController
{

    public function index(NonReadyPersonalDataTable $nonReadyPersonalDataTable)
    {
        return $nonReadyPersonalDataTable->render('non_ready_personal.index');
    }

}
