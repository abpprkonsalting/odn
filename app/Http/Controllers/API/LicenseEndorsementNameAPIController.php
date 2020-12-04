<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLicenseEndorsementNameAPIRequest;
use App\Http\Requests\API\UpdateLicenseEndorsementNameAPIRequest;
use App\Models\LicenseEndorsementName;
use App\Repositories\LicenseEndorsementNameRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LicenseEndorsementNameController
 * @package App\Http\Controllers\API
 */

class LicenseEndorsementNameAPIController extends AppBaseController
{
    /** @var  LicenseEndorsementNameRepository */
    private $licenseEndorsementNameRepository;

    public function __construct(LicenseEndorsementNameRepository $licenseEndorsementNameRepo)
    {
        $this->licenseEndorsementNameRepository = $licenseEndorsementNameRepo;
    }

    /**
     * Display a listing of the LicenseEndorsementName.
     * GET|HEAD /licenseEndorsementNames
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $licenseEndorsementNames = $this->licenseEndorsementNameRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($licenseEndorsementNames->toArray(), 'License Endorsement Names retrieved successfully');
    }

    /**
     * Store a newly created LicenseEndorsementName in storage.
     * POST /licenseEndorsementNames
     *
     * @param CreateLicenseEndorsementNameAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseEndorsementNameAPIRequest $request)
    {
        $input = $request->all();

        $licenseEndorsementName = $this->licenseEndorsementNameRepository->create($input);

        return $this->sendResponse($licenseEndorsementName->toArray(), 'License Endorsement Name saved successfully');
    }

    /**
     * Display the specified LicenseEndorsementName.
     * GET|HEAD /licenseEndorsementNames/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LicenseEndorsementName $licenseEndorsementName */
        $licenseEndorsementName = $this->licenseEndorsementNameRepository->find($id);

        if (empty($licenseEndorsementName)) {
            return $this->sendError('License Endorsement Name not found');
        }

        return $this->sendResponse($licenseEndorsementName->toArray(), 'License Endorsement Name retrieved successfully');
    }

    /**
     * Update the specified LicenseEndorsementName in storage.
     * PUT/PATCH /licenseEndorsementNames/{id}
     *
     * @param int $id
     * @param UpdateLicenseEndorsementNameAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseEndorsementNameAPIRequest $request)
    {
        $input = $request->all();

        /** @var LicenseEndorsementName $licenseEndorsementName */
        $licenseEndorsementName = $this->licenseEndorsementNameRepository->find($id);

        if (empty($licenseEndorsementName)) {
            return $this->sendError('License Endorsement Name not found');
        }

        $licenseEndorsementName = $this->licenseEndorsementNameRepository->update($input, $id);

        return $this->sendResponse($licenseEndorsementName->toArray(), 'LicenseEndorsementName updated successfully');
    }

    /**
     * Remove the specified LicenseEndorsementName from storage.
     * DELETE /licenseEndorsementNames/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LicenseEndorsementName $licenseEndorsementName */
        $licenseEndorsementName = $this->licenseEndorsementNameRepository->find($id);

        if (empty($licenseEndorsementName)) {
            return $this->sendError('License Endorsement Name not found');
        }

        $licenseEndorsementName->delete();

        return $this->sendSuccess('License Endorsement Name deleted successfully');
    }
}
