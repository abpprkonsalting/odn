<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePersonalInformationRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PersonalInformationController extends AppBaseController
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
        $personalInformation = $this->personalInformationRepository->createPersonalInformation($request);

        Flash::success('Personal Information saved successfully.');

        return redirect(route('personalInformations.edit', $personalInformation->id));
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

        $this->personalInformationRepository->delete($id);

        Flash::success('Personal Information deleted successfully.');

        return redirect(route('personalInformations.index'));
    }
}
