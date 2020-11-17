<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFamilyInformationAPIRequest;
use App\Http\Requests\API\UpdateFamilyInformationAPIRequest;
use App\Models\FamilyInformation;
use App\Repositories\FamilyInformationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FamilyInformationController
 * @package App\Http\Controllers\API
 */

class FamilyInformationAPIController extends AppBaseController
{
    /** @var  FamilyInformationRepository */
    private $familyInformationRepository;

    public function __construct(FamilyInformationRepository $familyInformationRepo)
    {
        $this->familyInformationRepository = $familyInformationRepo;
    }

    /**
     * Display a listing of the FamilyInformation.
     * GET|HEAD /familyInformations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $familyInformations = $this->familyInformationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($familyInformations->toArray(), 'Family Informations retrieved successfully');
    }

    /**
     * Store a newly created FamilyInformation in storage.
     * POST /familyInformations
     *
     * @param CreateFamilyInformationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilyInformationAPIRequest $request)
    {
        $input = $request->all();

        $familyInformation = $this->familyInformationRepository->create($input);

        return $this->sendResponse($familyInformation->toArray(), 'Family Information saved successfully');
    }

    /**
     * Display the specified FamilyInformation.
     * GET|HEAD /familyInformations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FamilyInformation $familyInformation */
        $familyInformation = $this->familyInformationRepository->find($id);

        if (empty($familyInformation)) {
            return $this->sendError('Family Information not found');
        }

        return $this->sendResponse($familyInformation->toArray(), 'Family Information retrieved successfully');
    }

    /**
     * Update the specified FamilyInformation in storage.
     * PUT/PATCH /familyInformations/{id}
     *
     * @param int $id
     * @param UpdateFamilyInformationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilyInformationAPIRequest $request)
    {
        $input = $request->all();

        /** @var FamilyInformation $familyInformation */
        $familyInformation = $this->familyInformationRepository->find($id);

        if (empty($familyInformation)) {
            return $this->sendError('Family Information not found');
        }

        $familyInformation = $this->familyInformationRepository->update($input, $id);

        return $this->sendResponse($familyInformation->toArray(), 'FamilyInformation updated successfully');
    }

    /**
     * Remove the specified FamilyInformation from storage.
     * DELETE /familyInformations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FamilyInformation $familyInformation */
        $familyInformation = $this->familyInformationRepository->find($id);

        if (empty($familyInformation)) {
            return $this->sendError('Family Information not found');
        }

        $familyInformation->delete();

        return $this->sendSuccess('Family Information deleted successfully');
    }
}
