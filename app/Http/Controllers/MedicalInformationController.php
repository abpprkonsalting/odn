<?php

namespace App\Http\Controllers;

use App\DataTables\MedicalInformationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMedicalInformationRequest;
use App\Http\Requests\UpdateMedicalInformationRequest;
use App\Repositories\MedicalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MedicalInformationController extends AppBaseController
{
    /** @var  MedicalInformationRepository */
    private $medicalInformationRepository;

    public function __construct(MedicalInformationRepository $medicalInformationRepo)
    {
        $this->medicalInformationRepository = $medicalInformationRepo;
    }

    /**
     * Display a listing of the MedicalInformation.
     *
     * @param MedicalInformationDataTable $medicalInformationDataTable
     * @return Response
     */
    public function index(MedicalInformationDataTable $medicalInformationDataTable)
    {
        return $medicalInformationDataTable->render('medical_informations.index');
    }

    /**
     * Show the form for creating a new MedicalInformation.
     *
     * @return Response
     */
    public function create()
    {
        return view('medical_informations.create');
    }

    /**
     * Store a newly created MedicalInformation in storage.
     *
     * @param CreateMedicalInformationRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicalInformationRequest $request)
    {
        $input = $request->all();

        $medicalInformation = $this->medicalInformationRepository->create($input);

        Flash::success('Medical Information saved successfully.');

        return redirect(route('medicalInformations.index'));
    }

    /**
     * Display the specified MedicalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medicalInformation = $this->medicalInformationRepository->find($id);

        if (empty($medicalInformation)) {
            Flash::error('Medical Information not found');

            return redirect(route('medicalInformations.index'));
        }

        return view('medical_informations.show')->with('medicalInformation', $medicalInformation);
    }

    /**
     * Show the form for editing the specified MedicalInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medicalInformation = $this->medicalInformationRepository->find($id);

        if (empty($medicalInformation)) {
            Flash::error('Medical Information not found');

            return redirect(route('medicalInformations.index'));
        }

        return view('medical_informations.edit')->with('medicalInformation', $medicalInformation);
    }

    /**
     * Update the specified MedicalInformation in storage.
     *
     * @param  int              $id
     * @param UpdateMedicalInformationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicalInformationRequest $request)
    {
        $medicalInformation = $this->medicalInformationRepository->find($id);

        if (empty($medicalInformation)) {
            Flash::error('Medical Information not found');

            return redirect(route('medicalInformations.index'));
        }

        $medicalInformation = $this->medicalInformationRepository->update($request->all(), $id);

        Flash::success('Medical Information updated successfully.');

        return redirect(route('medicalInformations.index'));
    }

    /**
     * Remove the specified MedicalInformation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medicalInformation = $this->medicalInformationRepository->find($id);

        if (empty($medicalInformation)) {
            Flash::error('Medical Information not found');

            return redirect(route('medicalInformations.index'));
        }

        $this->medicalInformationRepository->delete($id);

        Flash::success('Medical Information deleted successfully.');

        return redirect(route('medicalInformations.index'));
    }
}
