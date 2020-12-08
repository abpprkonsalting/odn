<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVisaAPIRequest;
use App\Http\Requests\API\UpdateVisaAPIRequest;
use App\Models\Visa;
use App\Repositories\VisaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VisaController
 * @package App\Http\Controllers\API
 */

class VisaAPIController extends AppBaseController
{
    /** @var  VisaRepository */
    private $visaRepository;

    public function __construct(VisaRepository $visaRepo)
    {
        $this->visaRepository = $visaRepo;
    }

    /**
     * Display a listing of the Visa.
     * GET|HEAD /visas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $visas = $this->visaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($visas->toArray(), 'Visas retrieved successfully');
    }

    /**
     * Store a newly created Visa in storage.
     * POST /visas
     *
     * @param CreateVisaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVisaAPIRequest $request)
    {
        $input = $request->all();

        $visa = $this->visaRepository->create($input);

        return $this->sendResponse($visa->toArray(), 'Visa saved successfully');
    }

    /**
     * Display the specified Visa.
     * GET|HEAD /visas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Visa $visa */
        $visa = $this->visaRepository->find($id);

        if (empty($visa)) {
            return $this->sendError('Visa not found');
        }

        return $this->sendResponse($visa->toArray(), 'Visa retrieved successfully');
    }

    /**
     * Update the specified Visa in storage.
     * PUT/PATCH /visas/{id}
     *
     * @param int $id
     * @param UpdateVisaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Visa $visa */
        $visa = $this->visaRepository->find($id);

        if (empty($visa)) {
            return $this->sendError('Visa not found');
        }

        $visa = $this->visaRepository->update($input, $id);

        return $this->sendResponse($visa->toArray(), 'Visa updated successfully');
    }

    /**
     * Remove the specified Visa from storage.
     * DELETE /visas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Visa $visa */
        $visa = $this->visaRepository->find($id);

        if (empty($visa)) {
            return $this->sendError('Visa not found');
        }

        $visa->delete();

        return $this->sendSuccess('Visa deleted successfully');
    }
}
