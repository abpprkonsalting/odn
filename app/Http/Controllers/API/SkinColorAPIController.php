<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSkinColorAPIRequest;
use App\Http\Requests\API\UpdateSkinColorAPIRequest;
use App\Models\SkinColor;
use App\Repositories\SkinColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SkinColorController
 * @package App\Http\Controllers\API
 */

class SkinColorAPIController extends AppBaseController
{
    /** @var  SkinColorRepository */
    private $skinColorRepository;

    public function __construct(SkinColorRepository $skinColorRepo)
    {
        $this->skinColorRepository = $skinColorRepo;
    }

    /**
     * Display a listing of the SkinColor.
     * GET|HEAD /skinColors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $skinColors = $this->skinColorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($skinColors->toArray(), 'Skin Colors retrieved successfully');
    }

    /**
     * Store a newly created SkinColor in storage.
     * POST /skinColors
     *
     * @param CreateSkinColorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSkinColorAPIRequest $request)
    {
        $input = $request->all();

        $skinColor = $this->skinColorRepository->create($input);

        return $this->sendResponse($skinColor->toArray(), 'Skin Color saved successfully');
    }

    /**
     * Display the specified SkinColor.
     * GET|HEAD /skinColors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SkinColor $skinColor */
        $skinColor = $this->skinColorRepository->find($id);

        if (empty($skinColor)) {
            return $this->sendError('Skin Color not found');
        }

        return $this->sendResponse($skinColor->toArray(), 'Skin Color retrieved successfully');
    }

    /**
     * Update the specified SkinColor in storage.
     * PUT/PATCH /skinColors/{id}
     *
     * @param int $id
     * @param UpdateSkinColorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkinColorAPIRequest $request)
    {
        $input = $request->all();

        /** @var SkinColor $skinColor */
        $skinColor = $this->skinColorRepository->find($id);

        if (empty($skinColor)) {
            return $this->sendError('Skin Color not found');
        }

        $skinColor = $this->skinColorRepository->update($input, $id);

        return $this->sendResponse($skinColor->toArray(), 'SkinColor updated successfully');
    }

    /**
     * Remove the specified SkinColor from storage.
     * DELETE /skinColors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SkinColor $skinColor */
        $skinColor = $this->skinColorRepository->find($id);

        if (empty($skinColor)) {
            return $this->sendError('Skin Color not found');
        }

        $skinColor->delete();

        return $this->sendSuccess('Skin Color deleted successfully');
    }
}
