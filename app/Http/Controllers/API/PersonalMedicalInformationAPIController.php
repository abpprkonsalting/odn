<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonalMedicalInformationAPIRequest;
use App\Http\Requests\API\UpdatePersonalMedicalInformationAPIRequest;
use App\Models\PersonalMedicalInformation;
use App\Repositories\PersonalMedicalInformationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PersonalMedicalInformationController
 * @package App\Http\Controllers\API
 */

class PersonalMedicalInformationAPIController extends AppBaseController
{
    /** @var  PersonalMedicalInformationRepository */
    private $personalMedicalInformationRepository;

    public function __construct(PersonalMedicalInformationRepository $personalMedicalInformationRepo)
    {
        $this->personalMedicalInformationRepository = $personalMedicalInformationRepo;
    }

    /**
     * Display a listing of the PersonalMedicalInformation.
     * GET|HEAD /personalMedicalInformations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $personalMedicalInformations = $this->personalMedicalInformationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($personalMedicalInformations->toArray(), 'Personal Medical Informations retrieved successfully');
    }

    /**
     * Store a newly created PersonalMedicalInformation in storage.
     * POST /personalMedicalInformations
     *
     * @param CreatePersonalMedicalInformationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalMedicalInformationAPIRequest $request)
    {
        $input = $request->all();

        $personalMedicalInformation = $this->personalMedicalInformationRepository->create($input);

        return $this->sendResponse($personalMedicalInformation->toArray(), 'Personal Medical Information saved successfully');
    }

    /**
     * Display the specified PersonalMedicalInformation.
     * GET|HEAD /personalMedicalInformations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PersonalMedicalInformation $personalMedicalInformation */
        $personalMedicalInformation = $this->personalMedicalInformationRepository->find($id);

        if (empty($personalMedicalInformation)) {
            return $this->sendError('Personal Medical Information not found');
        }

        return $this->sendResponse($personalMedicalInformation->toArray(), 'Personal Medical Information retrieved successfully');
    }

    /**
     * Update the specified PersonalMedicalInformation in storage.
     * PUT/PATCH /personalMedicalInformations/{id}
     *
     * @param int $id
     * @param UpdatePersonalMedicalInformationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalMedicalInformationAPIRequest $request)
    {
        $input = $request->all();

        /** @var PersonalMedicalInformation $personalMedicalInformation */
        $personalMedicalInformation = $this->personalMedicalInformationRepository->find($id);

        if (empty($personalMedicalInformation)) {
            return $this->sendError('Personal Medical Information not found');
        }

        $personalMedicalInformation = $this->personalMedicalInformationRepository->update($input, $id);

        return $this->sendResponse($personalMedicalInformation->toArray(), 'PersonalMedicalInformation updated successfully');
    }

    /**
     * Remove the specified PersonalMedicalInformation from storage.
     * DELETE /personalMedicalInformations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PersonalMedicalInformation $personalMedicalInformation */
        $personalMedicalInformation = $this->personalMedicalInformationRepository->find($id);

        if (empty($personalMedicalInformation)) {
            return $this->sendError('Personal Medical Information not found');
        }

        $personalMedicalInformation->delete();

        return $this->sendSuccess('Personal Medical Information deleted successfully');
    }
}
