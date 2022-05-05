<?php

namespace App\Http\Controllers;

use App\DataTables\LicenseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLicenseRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Repositories\LicenseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LicenseController extends AppBaseController
{
    /** @var  LicenseRepository */
    private $licenseRepository;

    public function __construct(LicenseRepository $licenseRepo)
    {
        $this->licenseRepository = $licenseRepo;
    }

    /**
     * Display a listing of the License.
     *
     * @param LicenseDataTable $licenseDataTable
     * @return Response
     */
    public function index(LicenseDataTable $licenseDataTable)
    {
        return $licenseDataTable->render('licenses.index');
    }

    /**
     * Show the form for creating a new License.
     *
     * @return Response
     */
    public function create()
    {
        return view('licenses.create');
    }

    /**
     * Store a newly created License in storage.
     *
     * @param CreateLicenseRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseRequest $request)
    {
        $input = $request->all();

        $license = $this->licenseRepository->create($input);

        Flash::success('License saved successfully.');

        return redirect(route('licenses.index'));
    }

    /**
     * Display the specified License.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        return view('licenses.show')->with('license', $license);
    }

    /**
     * Show the form for editing the specified License.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        return view('licenses.edit')->with('license', $license);
    }

    /**
     * Update the specified License in storage.
     *
     * @param  int              $id
     * @param UpdateLicenseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseRequest $request)
    {
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        $license = $this->licenseRepository->update($request->all(), $id);

        Flash::success('License updated successfully.');

        return redirect(route('licenses.index'));
    }

    /**
     * Remove the specified License from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        $this->licenseRepository->find($id)->forcedelete();

        Flash::success('License deleted successfully.');

        return redirect(route('licenses.index'));
    }
}
