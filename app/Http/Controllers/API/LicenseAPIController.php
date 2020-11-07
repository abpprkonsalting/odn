<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLicenseAPIRequest;
use App\Http\Requests\API\UpdateLicenseAPIRequest;
use App\Models\License;
use App\Repositories\LicenseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LicenseController
 * @package App\Http\Controllers\API
 */

class LicenseAPIController extends AppBaseController
{
    /** @var  LicenseRepository */
    private $licenseRepository;

    public function __construct(LicenseRepository $licenseRepo)
    {
        $this->licenseRepository = $licenseRepo;
    }

    /**
     * Display a listing of the License.
     * GET|HEAD /licenses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $licenses = $this->licenseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($licenses->toArray(), 'Licenses retrieved successfully');
    }

    /**
     * Store a newly created License in storage.
     * POST /licenses
     *
     * @param CreateLicenseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseAPIRequest $request)
    {
        $input = $request->all();

        $license = $this->licenseRepository->create($input);

        return $this->sendResponse($license->toArray(), 'License saved successfully');
    }

    /**
     * Display the specified License.
     * GET|HEAD /licenses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var License $license */
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            return $this->sendError('License not found');
        }

        return $this->sendResponse($license->toArray(), 'License retrieved successfully');
    }

    /**
     * Update the specified License in storage.
     * PUT/PATCH /licenses/{id}
     *
     * @param int $id
     * @param UpdateLicenseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseAPIRequest $request)
    {
        $input = $request->all();

        /** @var License $license */
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            return $this->sendError('License not found');
        }

        $license = $this->licenseRepository->update($input, $id);

        return $this->sendResponse($license->toArray(), 'License updated successfully');
    }

    /**
     * Remove the specified License from storage.
     * DELETE /licenses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var License $license */
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            return $this->sendError('License not found');
        }

        $license->delete();

        return $this->sendSuccess('License deleted successfully');
    }
}
