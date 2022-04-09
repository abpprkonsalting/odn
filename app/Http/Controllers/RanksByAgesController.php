<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\DataTables\RanksByAgesDataTable;
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

class RanksByAgesController extends AppBaseController
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
     * @param RanksByAgesDataTable DataTable $personalInformationDataTable
     * @return Response
     */
    public function index(RanksByAgesDataTable $ranksByAgesDataTable)
    {
        return $ranksByAgesDataTable->render('ranks_by_ages.index');
    }

   
}
