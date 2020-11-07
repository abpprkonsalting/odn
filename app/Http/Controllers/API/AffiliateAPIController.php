<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAffiliateAPIRequest;
use App\Http\Requests\API\UpdateAffiliateAPIRequest;
use App\Models\Affiliate;
use App\Repositories\AffiliateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AffiliateController
 * @package App\Http\Controllers\API
 */

class AffiliateAPIController extends AppBaseController
{
    /** @var  AffiliateRepository */
    private $affiliateRepository;

    public function __construct(AffiliateRepository $affiliateRepo)
    {
        $this->affiliateRepository = $affiliateRepo;
    }

    /**
     * Display a listing of the Affiliate.
     * GET|HEAD /affiliates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $affiliates = $this->affiliateRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($affiliates->toArray(), 'Affiliates retrieved successfully');
    }

    /**
     * Store a newly created Affiliate in storage.
     * POST /affiliates
     *
     * @param CreateAffiliateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAffiliateAPIRequest $request)
    {
        $input = $request->all();

        $affiliate = $this->affiliateRepository->create($input);

        return $this->sendResponse($affiliate->toArray(), 'Affiliate saved successfully');
    }

    /**
     * Display the specified Affiliate.
     * GET|HEAD /affiliates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Affiliate $affiliate */
        $affiliate = $this->affiliateRepository->find($id);

        if (empty($affiliate)) {
            return $this->sendError('Affiliate not found');
        }

        return $this->sendResponse($affiliate->toArray(), 'Affiliate retrieved successfully');
    }

    /**
     * Update the specified Affiliate in storage.
     * PUT/PATCH /affiliates/{id}
     *
     * @param int $id
     * @param UpdateAffiliateAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAffiliateAPIRequest $request)
    {
        $input = $request->all();

        /** @var Affiliate $affiliate */
        $affiliate = $this->affiliateRepository->find($id);

        if (empty($affiliate)) {
            return $this->sendError('Affiliate not found');
        }

        $affiliate = $this->affiliateRepository->update($input, $id);

        return $this->sendResponse($affiliate->toArray(), 'Affiliate updated successfully');
    }

    /**
     * Remove the specified Affiliate from storage.
     * DELETE /affiliates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Affiliate $affiliate */
        $affiliate = $this->affiliateRepository->find($id);

        if (empty($affiliate)) {
            return $this->sendError('Affiliate not found');
        }

        $affiliate->delete();

        return $this->sendSuccess('Affiliate deleted successfully');
    }
}
