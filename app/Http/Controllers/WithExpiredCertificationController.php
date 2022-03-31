<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\DataTables\WithExpiredCertificationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePersonalInformationRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\PersonalInformation;
use Response;
use PDF;
use Yajra\Datatables\Datatables;

class WithExpiredCertificationController extends AppBaseController
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
     * @param WithExpiredCertificationDataTable $personalInformationDataTable
     * @return Response
     */
    public function index(WithExpiredCertificationDataTable $withExpiredCertificationDataTable)
    {
        return $withExpiredCertificationDataTable->render('with_expired_certification.index');
    }

    
}
