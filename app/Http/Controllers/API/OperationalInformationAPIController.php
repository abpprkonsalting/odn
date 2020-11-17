<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOperationalInformationAPIRequest;
use App\Http\Requests\API\UpdateOperationalInformationAPIRequest;
use App\Models\OperationalInformation;
use App\Repositories\OperationalInformationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OperationalInformationController
 * @package App\Http\Controllers\API
 */

class OperationalInformationAPIController extends AppBaseController
{
    /** @var  OperationalInformationRepository */
    private $operationalInformationRepository;

    public function __construct(OperationalInformationRepository $operationalInformationRepo)
    {
        $this->operationalInformationRepository = $operationalInformationRepo;
    }

    /**
     * Display a listing of the OperationalInformation.
     * GET|HEAD /operationalInformations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $operationalInformations = $this->operationalInformationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($operationalInformations->toArray(), 'Operational Informations retrieved successfully');
    }

    /**
     * Store a newly created OperationalInformation in storage.
     * POST /operationalInformations
     *
     * @param CreateOperationalInformationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationalInformationAPIRequest $request)
    {
        $input = $request->all();

        $operationalInformation = $this->operationalInformationRepository->create($input);

        return $this->sendResponse($operationalInformation->toArray(), 'Operational Information saved successfully');
    }

    /**
     * Display the specified OperationalInformation.
     * GET|HEAD /operationalInformations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OperationalInformation $operationalInformation */
        $operationalInformation = $this->operationalInformationRepository->find($id);

        if (empty($operationalInformation)) {
            return $this->sendError('Operational Information not found');
        }

        return $this->sendResponse($operationalInformation->toArray(), 'Operational Information retrieved successfully');
    }

    /**
     * Update the specified OperationalInformation in storage.
     * PUT/PATCH /operationalInformations/{id}
     *
     * @param int $id
     * @param UpdateOperationalInformationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationalInformationAPIRequest $request)
    {
        $input = $request->all();

        /** @var OperationalInformation $operationalInformation */
        $operationalInformation = $this->operationalInformationRepository->find($id);

        if (empty($operationalInformation)) {
            return $this->sendError('Operational Information not found');
        }

        $operationalInformation = $this->operationalInformationRepository->update($input, $id);

        return $this->sendResponse($operationalInformation->toArray(), 'OperationalInformation updated successfully');
    }

    /**
     * Remove the specified OperationalInformation from storage.
     * DELETE /operationalInformations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OperationalInformation $operationalInformation */
        $operationalInformation = $this->operationalInformationRepository->find($id);

        if (empty($operationalInformation)) {
            return $this->sendError('Operational Information not found');
        }

        $operationalInformation->delete();

        return $this->sendSuccess('Operational Information deleted successfully');
    }
}
