<?php

namespace App\Http\Controllers;

use App\DataTables\FamilyInformationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFamilyInformationRequest;
use App\Http\Requests\UpdateFamilyInformationRequest;
use App\Repositories\FamilyInformationRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class FamilyInformationController extends AppBaseController
{
    /** @var  FamilyInformationRepository */
    private $familyInformationRepository;
     /** @var  PersonalInformationRepository */
     private $personalInformationRepo;


    public function __construct(FamilyInformationRepository $familyInformationRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->familyInformationRepository = $familyInformationRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the FamilyInformation.
     *
     * @param FamilyInformationDataTable $familyInformationDataTable
     * @return Response
     */
    public function index(FamilyInformationDataTable $familyInformationDataTable)
    {
        return $familyInformationDataTable->render('family_informations.index');
    }

    /**
     * Show the form for creating a new FamilyInformation.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if(isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if(!empty($personalInformation)) {
                return view('family_informations.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Personal Information not found');
        return redirect(route('personalInformations.index'));
    }

    /**
     * Store a newly created FamilyInformation in storage.
     *
     * @param CreateFamilyInformationRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilyInformationRequest $request)
    {
        $input = $request->all();

        $familyInformation = $this->familyInformationRepository->create($input);

        Flash::success('Family Information saved successfully.');

        return redirect(route('familyInformations.create', ['id' => $familyInformation->personal_informations_id]));
    }

    /**
     * Display the specified FamilyInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $familyInformation = $this->familyInformationRepository->find($id);

        if (empty($familyInformation)) {
            Flash::error('Family Information not found');

            return redirect(route('familyInformations.index'));
        }

        return view('family_informations.show')->with('familyInformation', $familyInformation);
    }

    /**
     * Show the form for editing the specified FamilyInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $familyInformation = $this->familyInformationRepository->find($id);

        if (empty($familyInformation)) {
            Flash::error('Family Information not found');

            return redirect(route('familyInformations.index'));
        }

        return view('family_informations.edit')->with('familyInformation', $familyInformation);
    }

    /**
     * Update the specified FamilyInformation in storage.
     *
     * @param  int              $id
     * @param UpdateFamilyInformationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilyInformationRequest $request)
    {
        $familyInformation = $this->familyInformationRepository->find($id);

        if (empty($familyInformation)) {
            Flash::error('Family Information not found');

            return redirect(route('familyInformations.index'));
        }

        $familyInformation = $this->familyInformationRepository->update($request->all(), $id);

        Flash::success('Family Information updated successfully.');

        return redirect(route('familyInformations.index'));
    }

    /**
     * Remove the specified FamilyInformation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $familyInformation = $this->familyInformationRepository->find($id);

        if (empty($familyInformation)) {
            Flash::error('Family Information not found');

            return redirect(route('familyInformations.index'));
        }

        $this->familyInformationRepository->delete($id);

        Flash::success('Family Information deleted successfully.');

        return redirect(route('familyInformations.index'));
    }
}