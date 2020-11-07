<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEngineTypeAPIRequest;
use App\Http\Requests\API\UpdateEngineTypeAPIRequest;
use App\Models\EngineType;
use App\Repositories\EngineTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EngineTypeController
 * @package App\Http\Controllers\API
 */

class EngineTypeAPIController extends AppBaseController
{
    /** @var  EngineTypeRepository */
    private $engineTypeRepository;

    public function __construct(EngineTypeRepository $engineTypeRepo)
    {
        $this->engineTypeRepository = $engineTypeRepo;
    }

    /**
     * Display a listing of the EngineType.
     * GET|HEAD /engineTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $engineTypes = $this->engineTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($engineTypes->toArray(), 'Engine Types retrieved successfully');
    }

    /**
     * Store a newly created EngineType in storage.
     * POST /engineTypes
     *
     * @param CreateEngineTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEngineTypeAPIRequest $request)
    {
        $input = $request->all();

        $engineType = $this->engineTypeRepository->create($input);

        return $this->sendResponse($engineType->toArray(), 'Engine Type saved successfully');
    }

    /**
     * Display the specified EngineType.
     * GET|HEAD /engineTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EngineType $engineType */
        $engineType = $this->engineTypeRepository->find($id);

        if (empty($engineType)) {
            return $this->sendError('Engine Type not found');
        }

        return $this->sendResponse($engineType->toArray(), 'Engine Type retrieved successfully');
    }

    /**
     * Update the specified EngineType in storage.
     * PUT/PATCH /engineTypes/{id}
     *
     * @param int $id
     * @param UpdateEngineTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEngineTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var EngineType $engineType */
        $engineType = $this->engineTypeRepository->find($id);

        if (empty($engineType)) {
            return $this->sendError('Engine Type not found');
        }

        $engineType = $this->engineTypeRepository->update($input, $id);

        return $this->sendResponse($engineType->toArray(), 'EngineType updated successfully');
    }

    /**
     * Remove the specified EngineType from storage.
     * DELETE /engineTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EngineType $engineType */
        $engineType = $this->engineTypeRepository->find($id);

        if (empty($engineType)) {
            return $this->sendError('Engine Type not found');
        }

        $engineType->delete();

        return $this->sendSuccess('Engine Type deleted successfully');
    }
}
