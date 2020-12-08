<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLicenseEndorsementAPIRequest;
use App\Http\Requests\API\UpdateLicenseEndorsementAPIRequest;
use App\Models\LicenseEndorsement;
use App\Repositories\LicenseEndorsementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LicenseEndorsementController
 * @package App\Http\Controllers\API
 */

class LicenseEndorsementAPIController extends AppBaseController
{
    /** @var  LicenseEndorsementRepository */
    private $licenseEndorsementRepository;

    public function __construct(LicenseEndorsementRepository $licenseEndorsementRepo)
    {
        $this->licenseEndorsementRepository = $licenseEndorsementRepo;
    }

    /**
     * Display a listing of the LicenseEndorsement.
     * GET|HEAD /licenseEndorsements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $licenseEndorsements = $this->licenseEndorsementRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($licenseEndorsements->toArray(), 'License Endorsements retrieved successfully');
    }

    /**
     * Store a newly created LicenseEndorsement in storage.
     * POST /licenseEndorsements
     *
     * @param CreateLicenseEndorsementAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseEndorsementAPIRequest $request)
    {
        $input = $request->all();

        $licenseEndorsement = $this->licenseEndorsementRepository->create($input);

        return $this->sendResponse($licenseEndorsement->toArray(), 'License Endorsement saved successfully');
    }

    /**
     * Display the specified LicenseEndorsement.
     * GET|HEAD /licenseEndorsements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LicenseEndorsement $licenseEndorsement */
        $licenseEndorsement = $this->licenseEndorsementRepository->find($id);

        if (empty($licenseEndorsement)) {
            return $this->sendError('License Endorsement not found');
        }

        return $this->sendResponse($licenseEndorsement->toArray(), 'License Endorsement retrieved successfully');
    }

    /**
     * Update the specified LicenseEndorsement in storage.
     * PUT/PATCH /licenseEndorsements/{id}
     *
     * @param int $id
     * @param UpdateLicenseEndorsementAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseEndorsementAPIRequest $request)
    {
        $input = $request->all();

        /** @var LicenseEndorsement $licenseEndorsement */
        $licenseEndorsement = $this->licenseEndorsementRepository->find($id);

        if (empty($licenseEndorsement)) {
            return $this->sendError('License Endorsement not found');
        }

        $licenseEndorsement = $this->licenseEndorsementRepository->update($input, $id);

        return $this->sendResponse($licenseEndorsement->toArray(), 'LicenseEndorsement updated successfully');
    }

    /**
     * Remove the specified LicenseEndorsement from storage.
     * DELETE /licenseEndorsements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LicenseEndorsement $licenseEndorsement */
        $licenseEndorsement = $this->licenseEndorsementRepository->find($id);

        if (empty($licenseEndorsement)) {
            return $this->sendError('License Endorsement not found');
        }

        $licenseEndorsement->delete();

        return $this->sendSuccess('License Endorsement deleted successfully');
    }
}
