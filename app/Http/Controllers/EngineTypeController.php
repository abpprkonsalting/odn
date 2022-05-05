<?php

namespace App\Http\Controllers;

use App\DataTables\EngineTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEngineTypeRequest;
use App\Http\Requests\UpdateEngineTypeRequest;
use App\Repositories\EngineTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EngineTypeController extends AppBaseController
{
    /** @var  EngineTypeRepository */
    private $engineTypeRepository;

    public function __construct(EngineTypeRepository $engineTypeRepo)
    {
        $this->engineTypeRepository = $engineTypeRepo;
    }

    /**
     * Display a listing of the EngineType.
     *
     * @param EngineTypeDataTable $engineTypeDataTable
     * @return Response
     */
    public function index(EngineTypeDataTable $engineTypeDataTable)
    {
        return $engineTypeDataTable->render('engine_types.index');
    }

    /**
     * Show the form for creating a new EngineType.
     *
     * @return Response
     */
    public function create()
    {
        return view('engine_types.create');
    }

    /**
     * Store a newly created EngineType in storage.
     *
     * @param CreateEngineTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateEngineTypeRequest $request)
    {
        $input = $request->all();

        $engineType = $this->engineTypeRepository->create($input);

        Flash::success('Engine Type saved successfully.');

        return redirect(route('engineTypes.index'));
    }

    /**
     * Display the specified EngineType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $engineType = $this->engineTypeRepository->find($id);

        if (empty($engineType)) {
            Flash::error('Engine Type not found');

            return redirect(route('engineTypes.index'));
        }

        return view('engine_types.show')->with('engineType', $engineType);
    }

    /**
     * Show the form for editing the specified EngineType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $engineType = $this->engineTypeRepository->find($id);

        if (empty($engineType)) {
            Flash::error('Engine Type not found');

            return redirect(route('engineTypes.index'));
        }

        return view('engine_types.edit')->with('engineType', $engineType);
    }

    /**
     * Update the specified EngineType in storage.
     *
     * @param  int              $id
     * @param UpdateEngineTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEngineTypeRequest $request)
    {
        $engineType = $this->engineTypeRepository->find($id);

        if (empty($engineType)) {
            Flash::error('Engine Type not found');

            return redirect(route('engineTypes.index'));
        }

        $engineType = $this->engineTypeRepository->update($request->all(), $id);

        Flash::success('Engine Type updated successfully.');

        return redirect(route('engineTypes.index'));
    }

    /**
     * Remove the specified EngineType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $engineType = $this->engineTypeRepository->find($id);

        if (empty($engineType)) {
            Flash::error('Engine Type not found');

            return redirect(route('engineTypes.index'));
        }

        $this->engineTypeRepository->find($id)->forcedelete();

        Flash::success('Engine Type deleted successfully.');

        return redirect(route('engineTypes.index'));
    }
}
