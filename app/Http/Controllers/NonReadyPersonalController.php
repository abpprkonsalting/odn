<?php

namespace App\Http\Controllers;

use App\DataTables\NonReadyPersonalDataTable;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Services\StatusService;

class NonReadyPersonalController extends AppBaseController
{

    private $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function index(NonReadyPersonalDataTable $nonReadyPersonalDataTable)
    {
        return $nonReadyPersonalDataTable->render('non_ready_personal.index');
    }

}
