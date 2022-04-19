<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLanguagesAPIRequest;
use App\Http\Requests\API\UpdateLanguagesAPIRequest;
use App\Models\Language;
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
     * Store a newly created Language in storage.
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

        return $this->sendResponse($languages->toArray(), 'Language saved successfully');
    }

    /**
     * Display the specified Language.
     * GET|HEAD /languages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Language $language */
        $language = $this->languagesRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        return $this->sendResponse($language->toArray(), 'Language retrieved successfully');
    }

    /**
     * Update the specified Language in storage.
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

        /** @var Language $language */
        $language = $this->languagesRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        $language = $this->languagesRepository->update($input, $id);

        return $this->sendResponse($language->toArray(), 'Language updated successfully');
    }

    /**
     * Remove the specified Language from storage.
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
        /** @var Language $languages */
        $language = $this->languagesRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        $language->delete();

        return $this->sendSuccess('Language deleted successfully');
    }
}
