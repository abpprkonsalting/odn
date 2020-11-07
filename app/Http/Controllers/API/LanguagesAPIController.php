<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLanguagesAPIRequest;
use App\Http\Requests\API\UpdateLanguagesAPIRequest;
use App\Models\Languages;
use App\Repositories\LanguagesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LanguagesController
 * @package App\Http\Controllers\API
 */

class LanguagesAPIController extends AppBaseController
{
    /** @var  LanguagesRepository */
    private $languagesRepository;

    public function __construct(LanguagesRepository $languagesRepo)
    {
        $this->languagesRepository = $languagesRepo;
    }

    /**
     * Display a listing of the Languages.
     * GET|HEAD /languages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $languages = $this->languagesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($languages->toArray(), 'Languages retrieved successfully');
    }

    /**
     * Store a newly created Languages in storage.
     * POST /languages
     *
     * @param CreateLanguagesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguagesAPIRequest $request)
    {
        $input = $request->all();

        $languages = $this->languagesRepository->create($input);

        return $this->sendResponse($languages->toArray(), 'Languages saved successfully');
    }

    /**
     * Display the specified Languages.
     * GET|HEAD /languages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Languages $languages */
        $languages = $this->languagesRepository->find($id);

        if (empty($languages)) {
            return $this->sendError('Languages not found');
        }

        return $this->sendResponse($languages->toArray(), 'Languages retrieved successfully');
    }

    /**
     * Update the specified Languages in storage.
     * PUT/PATCH /languages/{id}
     *
     * @param int $id
     * @param UpdateLanguagesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguagesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Languages $languages */
        $languages = $this->languagesRepository->find($id);

        if (empty($languages)) {
            return $this->sendError('Languages not found');
        }

        $languages = $this->languagesRepository->update($input, $id);

        return $this->sendResponse($languages->toArray(), 'Languages updated successfully');
    }

    /**
     * Remove the specified Languages from storage.
     * DELETE /languages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Languages $languages */
        $languages = $this->languagesRepository->find($id);

        if (empty($languages)) {
            return $this->sendError('Languages not found');
        }

        $languages->delete();

        return $this->sendSuccess('Languages deleted successfully');
    }
}
