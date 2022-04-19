<?php

namespace App\Http\Controllers;

use App\DataTables\ReadyByExperienceDataTable;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReadyByExperienceController extends AppBaseController
{
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;

    public function __construct(PersonalInformationRepository $personalInformationRepo)
    {
        $this->personalInformationRepository = $personalInformationRepo;
    }

    /**
     * Display a listing of the PersonalInformation.
     *
     * @param ReadyByExperienceDataTable $readyByExperienceDataTable
     * @return Response
     */
    public function index(ReadyByExperienceDataTable $readyByExperienceDataTable)
    {
        return $readyByExperienceDataTable->render('ready_by_experience.index');
    }

}
