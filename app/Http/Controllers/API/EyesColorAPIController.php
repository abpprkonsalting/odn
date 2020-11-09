<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEyesColorAPIRequest;
use App\Http\Requests\API\UpdateEyesColorAPIRequest;
use App\Models\EyesColor;
use App\Repositories\EyesColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EyesColorController
 * @package App\Http\Controllers\API
 */

class EyesColorAPIController extends AppBaseController
{
    /** @var  EyesColorRepository */
    private $eyesColorRepository;

    public function __construct(EyesColorRepository $eyesColorRepo)
    {
        $this->eyesColorRepository = $eyesColorRepo;
    }

    /**
     * Display a listing of the EyesColor.
     * GET|HEAD /eyesColors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $eyesColors = $this->eyesColorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($eyesColors->toArray(), 'Eyes Colors retrieved successfully');
    }

    /**
     * Store a newly created EyesColor in storage.
     * POST /eyesColors
     *
     * @param CreateEyesColorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEyesColorAPIRequest $request)
    {
        $input = $request->all();

        $eyesColor = $this->eyesColorRepository->create($input);

        return $this->sendResponse($eyesColor->toArray(), 'Eyes Color saved successfully');
    }

    /**
     * Display the specified EyesColor.
     * GET|HEAD /eyesColors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EyesColor $eyesColor */
        $eyesColor = $this->eyesColorRepository->find($id);

        if (empty($eyesColor)) {
            return $this->sendError('Eyes Color not found');
        }

        return $this->sendResponse($eyesColor->toArray(), 'Eyes Color retrieved successfully');
    }

    /**
     * Update the specified EyesColor in storage.
     * PUT/PATCH /eyesColors/{id}
     *
     * @param int $id
     * @param UpdateEyesColorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEyesColorAPIRequest $request)
    {
        $input = $request->all();

        /** @var EyesColor $eyesColor */
        $eyesColor = $this->eyesColorRepository->find($id);

        if (empty($eyesColor)) {
            return $this->sendError('Eyes Color not found');
        }

        $eyesColor = $this->eyesColorRepository->update($input, $id);

        return $this->sendResponse($eyesColor->toArray(), 'EyesColor updated successfully');
    }

    /**
     * Remove the specified EyesColor from storage.
     * DELETE /eyesColors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EyesColor $eyesColor */
        $eyesColor = $this->eyesColorRepository->find($id);

        if (empty($eyesColor)) {
            return $this->sendError('Eyes Color not found');
        }

        $eyesColor->delete();

        return $this->sendSuccess('Eyes Color deleted successfully');
    }
}
