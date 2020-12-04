<?php

namespace App\Http\Controllers;

use App\DataTables\LicenseEndorsementNameDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLicenseEndorsementNameRequest;
use App\Http\Requests\UpdateLicenseEndorsementNameRequest;
use App\Repositories\LicenseEndorsementNameRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LicenseEndorsementNameController extends AppBaseController
{
    /** @var  LicenseEndorsementNameRepository */
    private $licenseEndorsementNameRepository;

    public function __construct(LicenseEndorsementNameRepository $licenseEndorsementNameRepo)
    {
        $this->licenseEndorsementNameRepository = $licenseEndorsementNameRepo;
    }

    /**
     * Display a listing of the LicenseEndorsementName.
     *
     * @param LicenseEndorsementNameDataTable $licenseEndorsementNameDataTable
     * @return Response
     */
    public function index(LicenseEndorsementNameDataTable $licenseEndorsementNameDataTable)
    {
        return $licenseEndorsementNameDataTable->render('license_endorsement_names.index');
    }

    /**
     * Show the form for creating a new LicenseEndorsementName.
     *
     * @return Response
     */
    public function create()
    {
        return view('license_endorsement_names.create');
    }

    /**
     * Store a newly created LicenseEndorsementName in storage.
     *
     * @param CreateLicenseEndorsementNameRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseEndorsementNameRequest $request)
    {
        $input = $request->all();

        $licenseEndorsementName = $this->licenseEndorsementNameRepository->create($input);

        Flash::success('License Endorsement Name saved successfully.');

        return redirect(route('licenseEndorsementNames.index'));
    }

    /**
     * Display the specified LicenseEndorsementName.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $licenseEndorsementName = $this->licenseEndorsementNameRepository->find($id);

        if (empty($licenseEndorsementName)) {
            Flash::error('License Endorsement Name not found');

            return redirect(route('licenseEndorsementNames.index'));
        }

        return view('license_endorsement_names.show')->with('licenseEndorsementName', $licenseEndorsementName);
    }

    /**
     * Show the form for editing the specified LicenseEndorsementName.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $licenseEndorsementName = $this->licenseEndorsementNameRepository->find($id);

        if (empty($licenseEndorsementName)) {
            Flash::error('License Endorsement Name not found');

            return redirect(route('licenseEndorsementNames.index'));
        }

        return view('license_endorsement_names.edit')->with('licenseEndorsementName', $licenseEndorsementName);
    }

    /**
     * Update the specified LicenseEndorsementName in storage.
     *
     * @param  int              $id
     * @param UpdateLicenseEndorsementNameRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseEndorsementNameRequest $request)
    {
        $licenseEndorsementName = $this->licenseEndorsementNameRepository->find($id);

        if (empty($licenseEndorsementName)) {
            Flash::error('License Endorsement Name not found');

            return redirect(route('licenseEndorsementNames.index'));
        }

        $licenseEndorsementName = $this->licenseEndorsementNameRepository->update($request->all(), $id);

        Flash::success('License Endorsement Name updated successfully.');

        return redirect(route('licenseEndorsementNames.index'));
    }

    /**
     * Remove the specified LicenseEndorsementName from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $licenseEndorsementName = $this->licenseEndorsementNameRepository->find($id);

        if (empty($licenseEndorsementName)) {
            Flash::error('License Endorsement Name not found');

            return redirect(route('licenseEndorsementNames.index'));
        }

        $this->licenseEndorsementNameRepository->delete($id);

        Flash::success('License Endorsement Name deleted successfully.');

        return redirect(route('licenseEndorsementNames.index'));
    }
}
