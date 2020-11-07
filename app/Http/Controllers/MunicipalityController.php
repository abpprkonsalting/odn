<?php

namespace App\Http\Controllers;

use App\DataTables\MunicipalityDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMunicipalityRequest;
use App\Http\Requests\UpdateMunicipalityRequest;
use App\Repositories\MunicipalityRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MunicipalityController extends AppBaseController
{
    /** @var  MunicipalityRepository */
    private $municipalityRepository;

    public function __construct(MunicipalityRepository $municipalityRepo)
    {
        $this->municipalityRepository = $municipalityRepo;
    }

    /**
     * Display a listing of the Municipality.
     *
     * @param MunicipalityDataTable $municipalityDataTable
     * @return Response
     */
    public function index(MunicipalityDataTable $municipalityDataTable)
    {
        return $municipalityDataTable->render('municipalities.index');
    }

    /**
     * Show the form for creating a new Municipality.
     *
     * @return Response
     */
    public function create()
    {
        return view('municipalities.create');
    }

    /**
     * Store a newly created Municipality in storage.
     *
     * @param CreateMunicipalityRequest $request
     *
     * @return Response
     */
    public function store(CreateMunicipalityRequest $request)
    {
        $input = $request->all();

        $municipality = $this->municipalityRepository->create($input);

        Flash::success('Municipality saved successfully.');

        return redirect(route('municipalities.index'));
    }

    /**
     * Display the specified Municipality.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            Flash::error('Municipality not found');

            return redirect(route('municipalities.index'));
        }

        return view('municipalities.show')->with('municipality', $municipality);
    }

    /**
     * Show the form for editing the specified Municipality.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            Flash::error('Municipality not found');

            return redirect(route('municipalities.index'));
        }

        return view('municipalities.edit')->with('municipality', $municipality);
    }

    /**
     * Update the specified Municipality in storage.
     *
     * @param  int              $id
     * @param UpdateMunicipalityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMunicipalityRequest $request)
    {
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            Flash::error('Municipality not found');

            return redirect(route('municipalities.index'));
        }

        $municipality = $this->municipalityRepository->update($request->all(), $id);

        Flash::success('Municipality updated successfully.');

        return redirect(route('municipalities.index'));
    }

    /**
     * Remove the specified Municipality from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            Flash::error('Municipality not found');

            return redirect(route('municipalities.index'));
        }

        $this->municipalityRepository->delete($id);

        Flash::success('Municipality deleted successfully.');

        return redirect(route('municipalities.index'));
    }
}
