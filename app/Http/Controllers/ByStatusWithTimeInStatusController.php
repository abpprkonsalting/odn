<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\DataTables\ByStatusWithTimeInStatusDataTable;
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

class ByStatusWithTimeInStatusController extends AppBaseController
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
     * @param ByStatusWithTimeInStatusDataTable $personalInformationDataTable
     * @return Response
     */
    public function index(ByStatusWithTimeInStatusDataTable $byStatusWithTimeInStatusDataTable)
    {
        return $byStatusWithTimeInStatusDataTable->render('by_status_with_time_in_status.index');
    }

   
}
