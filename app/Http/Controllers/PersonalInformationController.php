<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePersonalInformationRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use App\Repositories\PersonalInformationRepository;
use App\Repositories\OperationalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\OperationalInformation;

use Response;
use PDF;


class PersonalInformationController extends AppBaseController
{
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;

    public function __construct( PersonalInformationRepository $personalInformationRepo) {
        $this->personalInformationRepository = $personalInformationRepo;
    }

    /**
     * Display a listing of the PersonalInformation.
     *
     * @param PersonalInformationDataTable $personalInformationDataTable
     * @return Response
     */
    public function index(PersonalInformationDataTable $personalInformationDataTable)
    {
        return $personalInformationDataTable->render('personal_informations.index');
    }

    /**
     * Show the form for creating a new PersonalInformation.
     *
     * @return Response
     */
    public function create()
    {
        return view('personal_informations.create');
    }

    /**
     * Store a newly created PersonalInformation in storage.
     *
     * @param CreatePersonalInformationRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalInformationRequest $request)
    {
        try {
            $personalInformation = $this->personalInformationRepository->createPersonalInformation($request);
            Flash::success('Personal Information saved successfully.');
            return redirect(route('personalInformations.edit', $personalInformation->id));
        } catch (\Exception $ex) {
            Flash::error($ex->getMessage());
            return redirect(route('personalInformations.create'));
        }
    }

    /**
     * Display the specified PersonalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personalInformation = $this->personalInformationRepository->find($id);

        if (empty($personalInformation)) {
            Flash::error('Personal Information not found');
            return redirect(route('personalInformations.index'));
        }

        return view('personal_informations.show')->with('personalInformation', $personalInformation);
    }

    /**
     * Show the form for editing the specified PersonalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personalInformation = $this->personalInformationRepository->find($id);
        if (empty($personalInformation)) {
            Flash::error('Personal Information not found');
            return redirect(route('personalInformations.index'));
        }
        return view('personal_informations.edit')->with('personalInformation', $personalInformation);
    }

    /**
     * Update the specified PersonalInformation in storage.
     *
     * @param  int $id
     * @param UpdatePersonalInformationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalInformationRequest $request)
    {
        $personalInformation = $this->personalInformationRepository->find($id);

        if (empty($personalInformation)) {
            Flash::error('Personal Information not found');

            return redirect(route('personalInformations.index'));
        }

        $personalInformation = $this->personalInformationRepository->updatePersonalInformation($request, $id, $personalInformation);

        Flash::success('Personal Information updated successfully.');

        return redirect(route('personalInformations.edit', $personalInformation->id));
    }

    /**
     * Remove the specified PersonalInformation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personalInformation = $this->personalInformationRepository->find($id);

        if (empty($personalInformation)) {
            Flash::error('Personal Information not found');

            return redirect(route('personalInformations.index'));
        }

        try {

            $this->personalInformationRepository->find($id)->forcedelete();

            Flash::success('Personal Information deleted successfully.');
        } catch (\Illuminate\Database\QueryException $ex) {


            Flash::success('Personal Information Cannot Delete. It has been used for other entity');
        }


        return redirect(route('personalInformations.index'));
    }

    public function getAjaxPersonalInformationById($id)
    {
        $personalInformation = $this->personalInformationRepository->find($id);

        return response()->json($personalInformation);
    }

    public function getPersonalInformationPdfById($id)
    {
        $personalInformationModel = $this->personalInformationRepository->model();
        $personalInformation = $personalInformationModel::with(
            [
                'maritalStatus',
                'province',
                'municipality',
                'familyInformations',
                'familyInformations.nextOfKind',
                'familyInformations.familyStatus',
                'familyInformations.province',
                'familyInformations.municipality',
                'passports',
                'visas',
                'visas.visaType',
                'seamanBooks',
                'personalMedicalInformations',
                'personalMedicalInformations.medicalInformation',
                'courses',
                'courses.country',
                'courses.courseNumber',
                'otherSkills',
                'shoreExperiencies',
                'licenseEndorsements',
                'licenseEndorsements.country',
                'licenseEndorsements.licenseEndorsementType',
                'licenseEndorsements.licenseEndorsementName',
                'memos',
                'company'
            ]
        )->find($id);
        $pdf = PDF::loadView('personal_informations.pdf', ['personalInformation' => $personalInformation]);
        return $pdf->download("{$personalInformation->id_number}.pdf");
    }

    public function getPersonalInformationFilesById($id)
    {
        $personalInformationModel = $this->personalInformationRepository->model();
        $personalInformation = $personalInformationModel::find($id);

        session(["personalInformationFolder" => $personalInformation->internal_file_number]);
        return view('personal_informations.files')->with('personalInformation', $personalInformation);
    }

    public function getPersonalInformationIframeById()
    {
        return view('personal_informations.iframe');
    }
}
