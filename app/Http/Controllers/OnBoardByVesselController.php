<?php

namespace App\Http\Controllers;

use App\DataTables\OnBoardByVesselDataTable;
use App\Repositories\PersonalInformationRepository;
use App\Http\Controllers\AppBaseController;
use Response;

class OnBoardByVesselController extends AppBaseController
{
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;

    public function __construct(PersonalInformationRepository $personalInformationRepo)
    {
        $this->personalInformationRepository = $personalInformationRepo;
    }

    public function index(OnBoardByVesselDataTable $onBoardByVesselDataTable)
    {
        return $onBoardByVesselDataTable->render('onboard_by_vessels.index');
    }

}
