<?php

namespace App\Http\Controllers;

use App\DataTables\LanguagesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLanguagesRequest;
use App\Http\Requests\UpdateLanguagesRequest;
use App\Repositories\LanguagesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LanguagesController extends AppBaseController
{
    /** @var  LanguagesRepository */
    private $languagesRepository;

    public function __construct(LanguagesRepository $languagesRepo)
    {
        $this->languagesRepository = $languagesRepo;
    }

    /**
     * Display a listing of the Languages.
     *
     * @param LanguagesDataTable $languagesDataTable
     * @return Response
     */
    public function index(LanguagesDataTable $languagesDataTable)
    {
        return $languagesDataTable->render('languages.index');
    }

    /**
     * Show the form for creating a new Languages.
     *
     * @return Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created Languages in storage.
     *
     * @param CreateLanguagesRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguagesRequest $request)
    {
        $input = $request->all();

        $languages = $this->languagesRepository->create($input);

        Flash::success('Languages saved successfully.');

        return redirect(route('languages.index'));
    }

    /**
     * Display the specified Languages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $languages = $this->languagesRepository->find($id);

        if (empty($languages)) {
            Flash::error('Languages not found');

            return redirect(route('languages.index'));
        }

        return view('languages.show')->with('languages', $languages);
    }

    /**
     * Show the form for editing the specified Languages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $languages = $this->languagesRepository->find($id);

        if (empty($languages)) {
            Flash::error('Languages not found');

            return redirect(route('languages.index'));
        }

        return view('languages.edit')->with('languages', $languages);
    }

    /**
     * Update the specified Languages in storage.
     *
     * @param  int              $id
     * @param UpdateLanguagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguagesRequest $request)
    {
        $languages = $this->languagesRepository->find($id);

        if (empty($languages)) {
            Flash::error('Languages not found');

            return redirect(route('languages.index'));
        }

        $languages = $this->languagesRepository->update($request->all(), $id);

        Flash::success('Languages updated successfully.');

        return redirect(route('languages.index'));
    }

    /**
     * Remove the specified Languages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $languages = $this->languagesRepository->find($id);

        if (empty($languages)) {
            Flash::error('Languages not found');

            return redirect(route('languages.index'));
        }

        $this->languagesRepository->delete($id);

        Flash::success('Languages deleted successfully.');

        return redirect(route('languages.index'));
    }
}
