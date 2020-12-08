<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShoreExperiencieAPIRequest;
use App\Http\Requests\API\UpdateShoreExperiencieAPIRequest;
use App\Models\ShoreExperiencie;
use App\Repositories\ShoreExperiencieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ShoreExperiencieController
 * @package App\Http\Controllers\API
 */

class ShoreExperiencieAPIController extends AppBaseController
{
    /** @var  ShoreExperiencieRepository */
    private $shoreExperiencieRepository;

    public function __construct(ShoreExperiencieRepository $shoreExperiencieRepo)
    {
        $this->shoreExperiencieRepository = $shoreExperiencieRepo;
    }

    /**
     * Display a listing of the ShoreExperiencie.
     * GET|HEAD /shoreExperiencies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $shoreExperiencies = $this->shoreExperiencieRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shoreExperiencies->toArray(), 'Shore Experiencies retrieved successfully');
    }

    /**
     * Store a newly created ShoreExperiencie in storage.
     * POST /shoreExperiencies
     *
     * @param CreateShoreExperiencieAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateShoreExperiencieAPIRequest $request)
    {
        $input = $request->all();

        $shoreExperiencie = $this->shoreExperiencieRepository->create($input);

        return $this->sendResponse($shoreExperiencie->toArray(), 'Shore Experiencie saved successfully');
    }

    /**
     * Display the specified ShoreExperiencie.
     * GET|HEAD /shoreExperiencies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ShoreExperiencie $shoreExperiencie */
        $shoreExperiencie = $this->shoreExperiencieRepository->find($id);

        if (empty($shoreExperiencie)) {
            return $this->sendError('Shore Experiencie not found');
        }

        return $this->sendResponse($shoreExperiencie->toArray(), 'Shore Experiencie retrieved successfully');
    }

    /**
     * Update the specified ShoreExperiencie in storage.
     * PUT/PATCH /shoreExperiencies/{id}
     *
     * @param int $id
     * @param UpdateShoreExperiencieAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShoreExperiencieAPIRequest $request)
    {
        $input = $request->all();

        /** @var ShoreExperiencie $shoreExperiencie */
        $shoreExperiencie = $this->shoreExperiencieRepository->find($id);

        if (empty($shoreExperiencie)) {
            return $this->sendError('Shore Experiencie not found');
        }

        $shoreExperiencie = $this->shoreExperiencieRepository->update($input, $id);

        return $this->sendResponse($shoreExperiencie->toArray(), 'ShoreExperiencie updated successfully');
    }

    /**
     * Remove the specified ShoreExperiencie from storage.
     * DELETE /shoreExperiencies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ShoreExperiencie $shoreExperiencie */
        $shoreExperiencie = $this->shoreExperiencieRepository->find($id);

        if (empty($shoreExperiencie)) {
            return $this->sendError('Shore Experiencie not found');
        }

        $shoreExperiencie->delete();

        return $this->sendSuccess('Shore Experiencie deleted successfully');
    }
}
