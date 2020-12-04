<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSeamanBookAPIRequest;
use App\Http\Requests\API\UpdateSeamanBookAPIRequest;
use App\Models\SeamanBook;
use App\Repositories\SeamanBookRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SeamanBookController
 * @package App\Http\Controllers\API
 */

class SeamanBookAPIController extends AppBaseController
{
    /** @var  SeamanBookRepository */
    private $seamanBookRepository;

    public function __construct(SeamanBookRepository $seamanBookRepo)
    {
        $this->seamanBookRepository = $seamanBookRepo;
    }

    /**
     * Display a listing of the SeamanBook.
     * GET|HEAD /seamanBooks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $seamanBooks = $this->seamanBookRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($seamanBooks->toArray(), 'Seaman Books retrieved successfully');
    }

    /**
     * Store a newly created SeamanBook in storage.
     * POST /seamanBooks
     *
     * @param CreateSeamanBookAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSeamanBookAPIRequest $request)
    {
        $input = $request->all();

        $seamanBook = $this->seamanBookRepository->create($input);

        return $this->sendResponse($seamanBook->toArray(), 'Seaman Book saved successfully');
    }

    /**
     * Display the specified SeamanBook.
     * GET|HEAD /seamanBooks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SeamanBook $seamanBook */
        $seamanBook = $this->seamanBookRepository->find($id);

        if (empty($seamanBook)) {
            return $this->sendError('Seaman Book not found');
        }

        return $this->sendResponse($seamanBook->toArray(), 'Seaman Book retrieved successfully');
    }

    /**
     * Update the specified SeamanBook in storage.
     * PUT/PATCH /seamanBooks/{id}
     *
     * @param int $id
     * @param UpdateSeamanBookAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeamanBookAPIRequest $request)
    {
        $input = $request->all();

        /** @var SeamanBook $seamanBook */
        $seamanBook = $this->seamanBookRepository->find($id);

        if (empty($seamanBook)) {
            return $this->sendError('Seaman Book not found');
        }

        $seamanBook = $this->seamanBookRepository->update($input, $id);

        return $this->sendResponse($seamanBook->toArray(), 'SeamanBook updated successfully');
    }

    /**
     * Remove the specified SeamanBook from storage.
     * DELETE /seamanBooks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SeamanBook $seamanBook */
        $seamanBook = $this->seamanBookRepository->find($id);

        if (empty($seamanBook)) {
            return $this->sendError('Seaman Book not found');
        }

        $seamanBook->delete();

        return $this->sendSuccess('Seaman Book deleted successfully');
    }
}
