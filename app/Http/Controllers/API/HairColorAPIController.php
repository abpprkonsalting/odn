<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHairColorAPIRequest;
use App\Http\Requests\API\UpdateHairColorAPIRequest;
use App\Models\HairColor;
use App\Repositories\HairColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class HairColorController
 * @package App\Http\Controllers\API
 */

class HairColorAPIController extends AppBaseController
{
    /** @var  HairColorRepository */
    private $hairColorRepository;

    public function __construct(HairColorRepository $hairColorRepo)
    {
        $this->hairColorRepository = $hairColorRepo;
    }

    /**
     * Display a listing of the HairColor.
     * GET|HEAD /hairColors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $hairColors = $this->hairColorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($hairColors->toArray(), 'Hair Colors retrieved successfully');
    }

    /**
     * Store a newly created HairColor in storage.
     * POST /hairColors
     *
     * @param CreateHairColorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHairColorAPIRequest $request)
    {
        $input = $request->all();

        $hairColor = $this->hairColorRepository->create($input);

        return $this->sendResponse($hairColor->toArray(), 'Hair Color saved successfully');
    }

    /**
     * Display the specified HairColor.
     * GET|HEAD /hairColors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HairColor $hairColor */
        $hairColor = $this->hairColorRepository->find($id);

        if (empty($hairColor)) {
            return $this->sendError('Hair Color not found');
        }

        return $this->sendResponse($hairColor->toArray(), 'Hair Color retrieved successfully');
    }

    /**
     * Update the specified HairColor in storage.
     * PUT/PATCH /hairColors/{id}
     *
     * @param int $id
     * @param UpdateHairColorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHairColorAPIRequest $request)
    {
        $input = $request->all();

        /** @var HairColor $hairColor */
        $hairColor = $this->hairColorRepository->find($id);

        if (empty($hairColor)) {
            return $this->sendError('Hair Color not found');
        }

        $hairColor = $this->hairColorRepository->update($input, $id);

        return $this->sendResponse($hairColor->toArray(), 'HairColor updated successfully');
    }

    /**
     * Remove the specified HairColor from storage.
     * DELETE /hairColors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HairColor $hairColor */
        $hairColor = $this->hairColorRepository->find($id);

        if (empty($hairColor)) {
            return $this->sendError('Hair Color not found');
        }

        $hairColor->delete();

        return $this->sendSuccess('Hair Color deleted successfully');
    }
}
