<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePoliticalIntegrationAPIRequest;
use App\Http\Requests\API\UpdatePoliticalIntegrationAPIRequest;
use App\Models\PoliticalIntegration;
use App\Repositories\PoliticalIntegrationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PoliticalIntegrationController
 * @package App\Http\Controllers\API
 */

class PoliticalIntegrationAPIController extends AppBaseController
{
    /** @var  PoliticalIntegrationRepository */
    private $politicalIntegrationRepository;

    public function __construct(PoliticalIntegrationRepository $politicalIntegrationRepo)
    {
        $this->politicalIntegrationRepository = $politicalIntegrationRepo;
    }

    /**
     * Display a listing of the PoliticalIntegration.
     * GET|HEAD /politicalIntegrations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $politicalIntegrations = $this->politicalIntegrationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($politicalIntegrations->toArray(), 'Political Integrations retrieved successfully');
    }

    /**
     * Store a newly created PoliticalIntegration in storage.
     * POST /politicalIntegrations
     *
     * @param CreatePoliticalIntegrationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePoliticalIntegrationAPIRequest $request)
    {
        $input = $request->all();

        $politicalIntegration = $this->politicalIntegrationRepository->create($input);

        return $this->sendResponse($politicalIntegration->toArray(), 'Political Integration saved successfully');
    }

    /**
     * Display the specified PoliticalIntegration.
     * GET|HEAD /politicalIntegrations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PoliticalIntegration $politicalIntegration */
        $politicalIntegration = $this->politicalIntegrationRepository->find($id);

        if (empty($politicalIntegration)) {
            return $this->sendError('Political Integration not found');
        }

        return $this->sendResponse($politicalIntegration->toArray(), 'Political Integration retrieved successfully');
    }

    /**
     * Update the specified PoliticalIntegration in storage.
     * PUT/PATCH /politicalIntegrations/{id}
     *
     * @param int $id
     * @param UpdatePoliticalIntegrationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePoliticalIntegrationAPIRequest $request)
    {
        $input = $request->all();

        /** @var PoliticalIntegration $politicalIntegration */
        $politicalIntegration = $this->politicalIntegrationRepository->find($id);

        if (empty($politicalIntegration)) {
            return $this->sendError('Political Integration not found');
        }

        $politicalIntegration = $this->politicalIntegrationRepository->update($input, $id);

        return $this->sendResponse($politicalIntegration->toArray(), 'PoliticalIntegration updated successfully');
    }

    /**
     * Remove the specified PoliticalIntegration from storage.
     * DELETE /politicalIntegrations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PoliticalIntegration $politicalIntegration */
        $politicalIntegration = $this->politicalIntegrationRepository->find($id);

        if (empty($politicalIntegration)) {
            return $this->sendError('Political Integration not found');
        }

        $politicalIntegration->delete();

        return $this->sendSuccess('Political Integration deleted successfully');
    }
}
