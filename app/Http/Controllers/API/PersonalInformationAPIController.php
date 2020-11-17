<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonalInformationAPIRequest;
use App\Http\Requests\API\UpdatePersonalInformationAPIRequest;
use App\Models\PersonalInformation;
use App\Repositories\PersonalInformationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PersonalInformationController
 * @package App\Http\Controllers\API
 */

class PersonalInformationAPIController extends AppBaseController
{
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;

    public function __construct(PersonalInformationRepository $personalInformationRepo)
    {
        $this->personalInformationRepository = $personalInformationRepo;
    }

    /**
     * Display a listing of the PersonalInformation.
     * GET|HEAD /personalInformations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $personalInformations = $this->personalInformationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($personalInformations->toArray(), 'Personal Informations retrieved successfully');
    }

    /**
     * Store a newly created PersonalInformation in storage.
     * POST /personalInformations
     *
     * @param CreatePersonalInformationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalInformationAPIRequest $request)
    {
        $input = $request->all();

        $personalInformation = $this->personalInformationRepository->create($input);

        return $this->sendResponse($personalInformation->toArray(), 'Personal Information saved successfully');
    }

    /**
     * Display the specified PersonalInformation.
     * GET|HEAD /personalInformations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PersonalInformation $personalInformation */
        $personalInformation = $this->personalInformationRepository->find($id);

        if (empty($personalInformation)) {
            return $this->sendError('Personal Information not found');
        }

        return $this->sendResponse($personalInformation->toArray(), 'Personal Information retrieved successfully');
    }

    /**
     * Update the specified PersonalInformation in storage.
     * PUT/PATCH /personalInformations/{id}
     *
     * @param int $id
     * @param UpdatePersonalInformationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalInformationAPIRequest $request)
    {
        $input = $request->all();

        /** @var PersonalInformation $personalInformation */
        $personalInformation = $this->personalInformationRepository->find($id);

        if (empty($personalInformation)) {
            return $this->sendError('Personal Information not found');
        }

        $personalInformation = $this->personalInformationRepository->update($input, $id);

        return $this->sendResponse($personalInformation->toArray(), 'PersonalInformation updated successfully');
    }

    /**
     * Remove the specified PersonalInformation from storage.
     * DELETE /personalInformations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PersonalInformation $personalInformation */
        $personalInformation = $this->personalInformationRepository->find($id);

        if (empty($personalInformation)) {
            return $this->sendError('Personal Information not found');
        }

        $personalInformation->delete();

        return $this->sendSuccess('Personal Information deleted successfully');
    }
}
