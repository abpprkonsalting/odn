<?php

namespace App\Http\Controllers;

use App\DataTables\LicenseEndorsementTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLicenseEndorsementTypeRequest;
use App\Http\Requests\UpdateLicenseEndorsementTypeRequest;
use App\Repositories\LicenseEndorsementTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LicenseEndorsementTypeController extends AppBaseController
{
    /** @var  LicenseEndorsementTypeRepository */
    private $licenseEndorsementTypeRepository;

    public function __construct(LicenseEndorsementTypeRepository $licenseEndorsementTypeRepo)
    {
        $this->licenseEndorsementTypeRepository = $licenseEndorsementTypeRepo;
    }

    /**
     * Display a listing of the LicenseEndorsementType.
     *
     * @param LicenseEndorsementTypeDataTable $licenseEndorsementTypeDataTable
     * @return Response
     */
    public function index(LicenseEndorsementTypeDataTable $licenseEndorsementTypeDataTable)
    {
        return $licenseEndorsementTypeDataTable->render('license_endorsement_types.index');
    }

    /**
     * Show the form for creating a new LicenseEndorsementType.
     *
     * @return Response
     */
    public function create()
    {
        return view('license_endorsement_types.create');
    }

    /**
     * Store a newly created LicenseEndorsementType in storage.
     *
     * @param CreateLicenseEndorsementTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseEndorsementTypeRequest $request)
    {
        $input = $request->all();

        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->create($input);

        Flash::success('License Endorsement Type saved successfully.');

        return redirect(route('licenseEndorsementTypes.index'));
    }

    /**
     * Display the specified LicenseEndorsementType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->find($id);

        if (empty($licenseEndorsementType)) {
            Flash::error('License Endorsement Type not found');

            return redirect(route('licenseEndorsementTypes.index'));
        }

        return view('license_endorsement_types.show')->with('licenseEndorsementType', $licenseEndorsementType);
    }

    /**
     * Show the form for editing the specified LicenseEndorsementType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->find($id);

        if (empty($licenseEndorsementType)) {
            Flash::error('License Endorsement Type not found');

            return redirect(route('licenseEndorsementTypes.index'));
        }

        return view('license_endorsement_types.edit')->with('licenseEndorsementType', $licenseEndorsementType);
    }

    /**
     * Update the specified LicenseEndorsementType in storage.
     *
     * @param  int              $id
     * @param UpdateLicenseEndorsementTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseEndorsementTypeRequest $request)
    {
        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->find($id);

        if (empty($licenseEndorsementType)) {
            Flash::error('License Endorsement Type not found');

            return redirect(route('licenseEndorsementTypes.index'));
        }

        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->update($request->all(), $id);

        Flash::success('License Endorsement Type updated successfully.');

        return redirect(route('licenseEndorsementTypes.index'));
    }

    /**
     * Remove the specified LicenseEndorsementType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->find($id);

        if (empty($licenseEndorsementType)) {
            Flash::error('License Endorsement Type not found');

            return redirect(route('licenseEndorsementTypes.index'));
        }

        $this->licenseEndorsementTypeRepository->delete($id);

        Flash::success('License Endorsement Type deleted successfully.');

        return redirect(route('licenseEndorsementTypes.index'));
    }
}
