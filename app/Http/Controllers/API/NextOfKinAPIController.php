<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNextOfKinAPIRequest;
use App\Http\Requests\API\UpdateNextOfKinAPIRequest;
use App\Models\NextOfKin;
use App\Repositories\NextOfKinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NextOfKinController
 * @package App\Http\Controllers\API
 */

class NextOfKinAPIController extends AppBaseController
{
    /** @var  NextOfKinRepository */
    private $nextOfKinRepository;

    public function __construct(NextOfKinRepository $nextOfKinRepo)
    {
        $this->nextOfKinRepository = $nextOfKinRepo;
    }

    /**
     * Display a listing of the NextOfKin.
     * GET|HEAD /nextOfKins
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nextOfKins = $this->nextOfKinRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($nextOfKins->toArray(), 'Next Of Kins retrieved successfully');
    }

    /**
     * Store a newly created NextOfKin in storage.
     * POST /nextOfKins
     *
     * @param CreateNextOfKinAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNextOfKinAPIRequest $request)
    {
        $input = $request->all();

        $nextOfKin = $this->nextOfKinRepository->create($input);

        return $this->sendResponse($nextOfKin->toArray(), 'Next Of Kin saved successfully');
    }

    /**
     * Display the specified NextOfKin.
     * GET|HEAD /nextOfKins/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NextOfKin $nextOfKin */
        $nextOfKin = $this->nextOfKinRepository->find($id);

        if (empty($nextOfKin)) {
            return $this->sendError('Next Of Kin not found');
        }

        return $this->sendResponse($nextOfKin->toArray(), 'Next Of Kin retrieved successfully');
    }

    /**
     * Update the specified NextOfKin in storage.
     * PUT/PATCH /nextOfKins/{id}
     *
     * @param int $id
     * @param UpdateNextOfKinAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNextOfKinAPIRequest $request)
    {
        $input = $request->all();

        /** @var NextOfKin $nextOfKin */
        $nextOfKin = $this->nextOfKinRepository->find($id);

        if (empty($nextOfKin)) {
            return $this->sendError('Next Of Kin not found');
        }

        $nextOfKin = $this->nextOfKinRepository->update($input, $id);

        return $this->sendResponse($nextOfKin->toArray(), 'NextOfKin updated successfully');
    }

    /**
     * Remove the specified NextOfKin from storage.
     * DELETE /nextOfKins/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NextOfKin $nextOfKin */
        $nextOfKin = $this->nextOfKinRepository->find($id);

        if (empty($nextOfKin)) {
            return $this->sendError('Next Of Kin not found');
        }

        $nextOfKin->delete();

        return $this->sendSuccess('Next Of Kin deleted successfully');
    }
}
