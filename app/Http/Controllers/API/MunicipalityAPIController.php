<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMunicipalityAPIRequest;
use App\Http\Requests\API\UpdateMunicipalityAPIRequest;
use App\Models\Municipality;
use App\Repositories\MunicipalityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MunicipalityController
 * @package App\Http\Controllers\API
 */

class MunicipalityAPIController extends AppBaseController
{
    /** @var  MunicipalityRepository */
    private $municipalityRepository;

    public function __construct(MunicipalityRepository $municipalityRepo)
    {
        $this->municipalityRepository = $municipalityRepo;
    }

    /**
     * Display a listing of the Municipality.
     * GET|HEAD /municipalities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $municipalities = $this->municipalityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($municipalities->toArray(), 'Municipalities retrieved successfully');
    }

    /**
     * Store a newly created Municipality in storage.
     * POST /municipalities
     *
     * @param CreateMunicipalityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMunicipalityAPIRequest $request)
    {
        $input = $request->all();

        $municipality = $this->municipalityRepository->create($input);

        return $this->sendResponse($municipality->toArray(), 'Municipality saved successfully');
    }

    /**
     * Display the specified Municipality.
     * GET|HEAD /municipalities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Municipality $municipality */
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            return $this->sendError('Municipality not found');
        }

        return $this->sendResponse($municipality->toArray(), 'Municipality retrieved successfully');
    }

    /**
     * Update the specified Municipality in storage.
     * PUT/PATCH /municipalities/{id}
     *
     * @param int $id
     * @param UpdateMunicipalityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMunicipalityAPIRequest $request)
    {
        $input = $request->all();

        /** @var Municipality $municipality */
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            return $this->sendError('Municipality not found');
        }

        $municipality = $this->municipalityRepository->update($input, $id);

        return $this->sendResponse($municipality->toArray(), 'Municipality updated successfully');
    }

    /**
     * Remove the specified Municipality from storage.
     * DELETE /municipalities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Municipality $municipality */
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            return $this->sendError('Municipality not found');
        }

        $municipality->delete();

        return $this->sendSuccess('Municipality deleted successfully');
    }
}
