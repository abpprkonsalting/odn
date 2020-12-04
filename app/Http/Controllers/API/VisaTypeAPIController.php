<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVisaTypeAPIRequest;
use App\Http\Requests\API\UpdateVisaTypeAPIRequest;
use App\Models\VisaType;
use App\Repositories\VisaTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VisaTypeController
 * @package App\Http\Controllers\API
 */

class VisaTypeAPIController extends AppBaseController
{
    /** @var  VisaTypeRepository */
    private $visaTypeRepository;

    public function __construct(VisaTypeRepository $visaTypeRepo)
    {
        $this->visaTypeRepository = $visaTypeRepo;
    }

    /**
     * Display a listing of the VisaType.
     * GET|HEAD /visaTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $visaTypes = $this->visaTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($visaTypes->toArray(), 'Visa Types retrieved successfully');
    }

    /**
     * Store a newly created VisaType in storage.
     * POST /visaTypes
     *
     * @param CreateVisaTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVisaTypeAPIRequest $request)
    {
        $input = $request->all();

        $visaType = $this->visaTypeRepository->create($input);

        return $this->sendResponse($visaType->toArray(), 'Visa Type saved successfully');
    }

    /**
     * Display the specified VisaType.
     * GET|HEAD /visaTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VisaType $visaType */
        $visaType = $this->visaTypeRepository->find($id);

        if (empty($visaType)) {
            return $this->sendError('Visa Type not found');
        }

        return $this->sendResponse($visaType->toArray(), 'Visa Type retrieved successfully');
    }

    /**
     * Update the specified VisaType in storage.
     * PUT/PATCH /visaTypes/{id}
     *
     * @param int $id
     * @param UpdateVisaTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisaTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var VisaType $visaType */
        $visaType = $this->visaTypeRepository->find($id);

        if (empty($visaType)) {
            return $this->sendError('Visa Type not found');
        }

        $visaType = $this->visaTypeRepository->update($input, $id);

        return $this->sendResponse($visaType->toArray(), 'VisaType updated successfully');
    }

    /**
     * Remove the specified VisaType from storage.
     * DELETE /visaTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VisaType $visaType */
        $visaType = $this->visaTypeRepository->find($id);

        if (empty($visaType)) {
            return $this->sendError('Visa Type not found');
        }

        $visaType->delete();

        return $this->sendSuccess('Visa Type deleted successfully');
    }
}
