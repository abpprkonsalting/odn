<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFamilyStatusAPIRequest;
use App\Http\Requests\API\UpdateFamilyStatusAPIRequest;
use App\Models\FamilyStatus;
use App\Repositories\FamilyStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FamilyStatusController
 * @package App\Http\Controllers\API
 */

class FamilyStatusAPIController extends AppBaseController
{
    /** @var  FamilyStatusRepository */
    private $familyStatusRepository;

    public function __construct(FamilyStatusRepository $familyStatusRepo)
    {
        $this->familyStatusRepository = $familyStatusRepo;
    }

    /**
     * Display a listing of the FamilyStatus.
     * GET|HEAD /familyStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $familyStatuses = $this->familyStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($familyStatuses->toArray(), 'Family Statuses retrieved successfully');
    }

    /**
     * Store a newly created FamilyStatus in storage.
     * POST /familyStatuses
     *
     * @param CreateFamilyStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilyStatusAPIRequest $request)
    {
        $input = $request->all();

        $familyStatus = $this->familyStatusRepository->create($input);

        return $this->sendResponse($familyStatus->toArray(), 'Family Status saved successfully');
    }

    /**
     * Display the specified FamilyStatus.
     * GET|HEAD /familyStatuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FamilyStatus $familyStatus */
        $familyStatus = $this->familyStatusRepository->find($id);

        if (empty($familyStatus)) {
            return $this->sendError('Family Status not found');
        }

        return $this->sendResponse($familyStatus->toArray(), 'Family Status retrieved successfully');
    }

    /**
     * Update the specified FamilyStatus in storage.
     * PUT/PATCH /familyStatuses/{id}
     *
     * @param int $id
     * @param UpdateFamilyStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilyStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var FamilyStatus $familyStatus */
        $familyStatus = $this->familyStatusRepository->find($id);

        if (empty($familyStatus)) {
            return $this->sendError('Family Status not found');
        }

        $familyStatus = $this->familyStatusRepository->update($input, $id);

        return $this->sendResponse($familyStatus->toArray(), 'FamilyStatus updated successfully');
    }

    /**
     * Remove the specified FamilyStatus from storage.
     * DELETE /familyStatuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FamilyStatus $familyStatus */
        $familyStatus = $this->familyStatusRepository->find($id);

        if (empty($familyStatus)) {
            return $this->sendError('Family Status not found');
        }

        $familyStatus->delete();

        return $this->sendSuccess('Family Status deleted successfully');
    }
}
