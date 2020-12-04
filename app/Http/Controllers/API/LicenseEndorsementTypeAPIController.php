<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLicenseEndorsementTypeAPIRequest;
use App\Http\Requests\API\UpdateLicenseEndorsementTypeAPIRequest;
use App\Models\LicenseEndorsementType;
use App\Repositories\LicenseEndorsementTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LicenseEndorsementTypeController
 * @package App\Http\Controllers\API
 */

class LicenseEndorsementTypeAPIController extends AppBaseController
{
    /** @var  LicenseEndorsementTypeRepository */
    private $licenseEndorsementTypeRepository;

    public function __construct(LicenseEndorsementTypeRepository $licenseEndorsementTypeRepo)
    {
        $this->licenseEndorsementTypeRepository = $licenseEndorsementTypeRepo;
    }

    /**
     * Display a listing of the LicenseEndorsementType.
     * GET|HEAD /licenseEndorsementTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $licenseEndorsementTypes = $this->licenseEndorsementTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($licenseEndorsementTypes->toArray(), 'License Endorsement Types retrieved successfully');
    }

    /**
     * Store a newly created LicenseEndorsementType in storage.
     * POST /licenseEndorsementTypes
     *
     * @param CreateLicenseEndorsementTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseEndorsementTypeAPIRequest $request)
    {
        $input = $request->all();

        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->create($input);

        return $this->sendResponse($licenseEndorsementType->toArray(), 'License Endorsement Type saved successfully');
    }

    /**
     * Display the specified LicenseEndorsementType.
     * GET|HEAD /licenseEndorsementTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LicenseEndorsementType $licenseEndorsementType */
        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->find($id);

        if (empty($licenseEndorsementType)) {
            return $this->sendError('License Endorsement Type not found');
        }

        return $this->sendResponse($licenseEndorsementType->toArray(), 'License Endorsement Type retrieved successfully');
    }

    /**
     * Update the specified LicenseEndorsementType in storage.
     * PUT/PATCH /licenseEndorsementTypes/{id}
     *
     * @param int $id
     * @param UpdateLicenseEndorsementTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseEndorsementTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var LicenseEndorsementType $licenseEndorsementType */
        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->find($id);

        if (empty($licenseEndorsementType)) {
            return $this->sendError('License Endorsement Type not found');
        }

        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->update($input, $id);

        return $this->sendResponse($licenseEndorsementType->toArray(), 'LicenseEndorsementType updated successfully');
    }

    /**
     * Remove the specified LicenseEndorsementType from storage.
     * DELETE /licenseEndorsementTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LicenseEndorsementType $licenseEndorsementType */
        $licenseEndorsementType = $this->licenseEndorsementTypeRepository->find($id);

        if (empty($licenseEndorsementType)) {
            return $this->sendError('License Endorsement Type not found');
        }

        $licenseEndorsementType->delete();

        return $this->sendSuccess('License Endorsement Type deleted successfully');
    }
}
