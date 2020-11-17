<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMemoAPIRequest;
use App\Http\Requests\API\UpdateMemoAPIRequest;
use App\Models\Memo;
use App\Repositories\MemoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MemoController
 * @package App\Http\Controllers\API
 */

class MemoAPIController extends AppBaseController
{
    /** @var  MemoRepository */
    private $memoRepository;

    public function __construct(MemoRepository $memoRepo)
    {
        $this->memoRepository = $memoRepo;
    }

    /**
     * Display a listing of the Memo.
     * GET|HEAD /memos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $memos = $this->memoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($memos->toArray(), 'Memos retrieved successfully');
    }

    /**
     * Store a newly created Memo in storage.
     * POST /memos
     *
     * @param CreateMemoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMemoAPIRequest $request)
    {
        $input = $request->all();

        $memo = $this->memoRepository->create($input);

        return $this->sendResponse($memo->toArray(), 'Memo saved successfully');
    }

    /**
     * Display the specified Memo.
     * GET|HEAD /memos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Memo $memo */
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            return $this->sendError('Memo not found');
        }

        return $this->sendResponse($memo->toArray(), 'Memo retrieved successfully');
    }

    /**
     * Update the specified Memo in storage.
     * PUT/PATCH /memos/{id}
     *
     * @param int $id
     * @param UpdateMemoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Memo $memo */
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            return $this->sendError('Memo not found');
        }

        $memo = $this->memoRepository->update($input, $id);

        return $this->sendResponse($memo->toArray(), 'Memo updated successfully');
    }

    /**
     * Remove the specified Memo from storage.
     * DELETE /memos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Memo $memo */
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            return $this->sendError('Memo not found');
        }

        $memo->delete();

        return $this->sendSuccess('Memo deleted successfully');
    }
}
