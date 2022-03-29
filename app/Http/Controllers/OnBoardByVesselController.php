<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\DataTables\OnBoardByVesselDataTable;
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

class OnBoardByVesselController extends AppBaseController
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
     * @param OnBoardByVesselDataTable $personalInformationDataTable
     * @return Response
     */
    public function index(OnBoardByVesselDataTable $onBoardByVesselDataTable)
    {
        return $onBoardByVesselDataTable->render('onboard_by_vessels.index');
    }

    public function getAjaxPersonalInformationById($id) {
        $personalInformation = $this->personalInformationRepository->find($id);
        
        return response()->json($personalInformation);
    }

    public function getPersonalInformationPdfById($id) {
        $personalInformationModel = $this->personalInformationRepository->model();
        $personalInformation = $personalInformationModel::with(['maritalStatus','province','municipality', 'familyInformations', 'familyInformations.nextOfKind', 'familyInformations.familyStatus','familyInformations.province','familyInformations.municipality','passports','visas','visas.visaType','seamanBooks','personalMedicalInformations','personalMedicalInformations.medicalInformation','courses','courses.country','courses.courseNumber','otherSkills','shoreExperiencies','licenseEndorsements','licenseEndorsements.country','licenseEndorsements.licenseEndorsementType','licenseEndorsements.licenseEndorsementName','memos'])->find($id);
        $pdf = PDF::loadView('personal_informations.pdf', ['personalInformation' => $personalInformation]);
        return $pdf->download("{$personalInformation->id_number}.pdf");
    }

    public function getPersonalInformationFilesById($id) {
        $personalInformationModel = $this->personalInformationRepository->model();
        $personalInformation = $personalInformationModel::find($id);
        
        session(["personalInformationFolder" => $personalInformation->internal_file_number]);
        return view('personal_informations.files')->with('personalInformation', $personalInformation);
    }

    public function getPersonalInformationIframeById() {
        return view('personal_informations.iframe');
    }
}
