<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalMedicalInformationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePersonalMedicalInformationRequest;
use App\Http\Requests\UpdatePersonalMedicalInformationRequest;
use App\Repositories\PersonalMedicalInformationRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;

class PersonalMedicalInformationController extends AppBaseController
{
    /** @var  PersonalMedicalInformationRepository */
    private $personalMedicalInformationRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;

    public function __construct(PersonalMedicalInformationRepository $personalMedicalInformationRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->personalMedicalInformationRepository = $personalMedicalInformationRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the PersonalMedicalInformation.
     *
     * @param PersonalMedicalInformationDataTable $personalMedicalInformationDataTable
     * @return Response
     */
    public function index(PersonalMedicalInformationDataTable $personalMedicalInformationDataTable)
    {
        return $personalMedicalInformationDataTable->render('personal_medical_informations.index');
    }

    /**
     * Show the form for creating a new PersonalMedicalInformation.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if(isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if(!empty($personalInformation)) {
                return view('personal_medical_informations.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Personal Information not found');
        return redirect(route('personalInformations.index'));
    }

    /**
     * Store a newly created PersonalMedicalInformation in storage.
     *
     * @param CreatePersonalMedicalInformationRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalMedicalInformationRequest $request)
    {
        $input = $request->all();

        $personalMedicalInformation = $this->personalMedicalInformationRepository->create($input);

        Flash::success('Personal Medical Information saved successfully.');

        return redirect(route('personalMedicalInformations.create', [ 'id' => $personalMedicalInformation->personal_informations_id ]));
    }

    /**
     * Display the specified PersonalMedicalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personalMedicalInformation = $this->personalMedicalInformationRepository->find($id);

        if (empty($personalMedicalInformation)) {
            Flash::error('Personal Medical Information not found');

            return redirect(route('personalMedicalInformations.index'));
        }

        return view('personal_medical_informations.show')->with('personalMedicalInformation', $personalMedicalInformation);
    }

    /**
     * Show the form for editing the specified PersonalMedicalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personalMedicalInformation = $this->personalMedicalInformationRepository->find($id);
        if (empty($personalMedicalInformation)) {
            Flash::error('Personal Medical Information not found');

            return redirect(route('personal_medical_informations.index'));
        }
        return view('personal_medical_informations.edit')->with(['personalMedicalInformation' => $personalMedicalInformation, 'personalInformation' => $personalMedicalInformation->personalInformation]);

        //return view('personal_medical_informations.edit')->with('personalMedicalInformation', $personalMedicalInformation);
    }

    /**
     * Update the specified PersonalMedicalInformation in storage.
     *
     * @param  int              $id
     * @param UpdatePersonalMedicalInformationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalMedicalInformationRequest $request)
    {
        $personalMedicalInformation = $this->personalMedicalInformationRepository->find($id);

        if (empty($personalMedicalInformation)) {
            Flash::error('Personal Medical Information not found');

            return redirect(route('personalInformations.index'));
        }

        $personalMedicalInformation = $this->personalMedicalInformationRepository->update($request->all(), $id);

        Flash::success('Personal Medical Information updated successfully.');

        return redirect(route('personalMedicalInformations.create', ['id' => $personalMedicalInformation->personal_informations_id]));
    }

    /**
     * Remove the specified PersonalMedicalInformation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personalMedicalInformation = $this->personalMedicalInformationRepository->find($id);
        

        if (empty($personalMedicalInformation)) {
            Flash::error('Personal Medical Information not found');

            return redirect(route('personalInformation.index'));
        }

        $this->personalMedicalInformationRepository->delete($id);

        Flash::success('Personal Medical Information deleted successfully.');

        return redirect(route('personalMedicalInformations.create', ['id' => $personalMedicalInformation->personal_informations_id]));
    }

    
     /**
     * Return JSON with listing of the Medical Personal Information belong to PersonalInformation.
     *
     * @param integer $personal_informations_id
     * @return JSON
     */
    public function getPersonalInformationMedical($id)
    {
        $personalMedicalInformationModel = $this->personalMedicalInformationRepository->model();
        return Datatables::of($personalMedicalInformationModel::with(['medicalInformation'])->whereHas('medicalInformation', function($q) {
            $q->whereNull('deleted_at');
        })->where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'personal_medical_informations.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    
    }
}
