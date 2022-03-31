<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\DataTables\WithForeignLicenseByTypeDataTable;
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

class WithForeignLicenseByTypeController extends AppBaseController
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
     * @param WithForeignLicenseByTypeDataTable $personalInformationDataTable
     * @return Response
     */
    public function index(WithForeignLicenseByTypeDataTable $withForeignLicenseByTypeDataTable)
    {
        return $withForeignLicenseByTypeDataTable->render('with_foreign_license_by_type.index');
    }

}   