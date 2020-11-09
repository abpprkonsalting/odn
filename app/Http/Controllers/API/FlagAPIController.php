<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFlagAPIRequest;
use App\Http\Requests\API\UpdateFlagAPIRequest;
use App\Models\Flag;
use App\Repositories\FlagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FlagController
 * @package App\Http\Controllers\API
 */

class FlagAPIController extends AppBaseController
{
    /** @var  FlagRepository */
    private $flagRepository;

    public function __construct(FlagRepository $flagRepo)
    {
        $this->flagRepository = $flagRepo;
    }

    /**
     * Display a listing of the Flag.
     * GET|HEAD /flags
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $flags = $this->flagRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($flags->toArray(), 'Flags retrieved successfully');
    }

    /**
     * Store a newly created Flag in storage.
     * POST /flags
     *
     * @param CreateFlagAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFlagAPIRequest $request)
    {
        $input = $request->all();

        $flag = $this->flagRepository->create($input);

        return $this->sendResponse($flag->toArray(), 'Flag saved successfully');
    }

    /**
     * Display the specified Flag.
     * GET|HEAD /flags/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Flag $flag */
        $flag = $this->flagRepository->find($id);

        if (empty($flag)) {
            return $this->sendError('Flag not found');
        }

        return $this->sendResponse($flag->toArray(), 'Flag retrieved successfully');
    }

    /**
     * Update the specified Flag in storage.
     * PUT/PATCH /flags/{id}
     *
     * @param int $id
     * @param UpdateFlagAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFlagAPIRequest $request)
    {
        $input = $request->all();

        /** @var Flag $flag */
        $flag = $this->flagRepository->find($id);

        if (empty($flag)) {
            return $this->sendError('Flag not found');
        }

        $flag = $this->flagRepository->update($input, $id);

        return $this->sendResponse($flag->toArray(), 'Flag updated successfully');
    }

    /**
     * Remove the specified Flag from storage.
     * DELETE /flags/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Flag $flag */
        $flag = $this->flagRepository->find($id);

        if (empty($flag)) {
            return $this->sendError('Flag not found');
        }

        $flag->delete();

        return $this->sendSuccess('Flag deleted successfully');
    }
}
