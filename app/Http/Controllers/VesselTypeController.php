<?php

namespace App\Http\Controllers;

use App\DataTables\VesselTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVesselTypeRequest;
use App\Http\Requests\UpdateVesselTypeRequest;
use App\Repositories\VesselTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VesselTypeController extends AppBaseController
{
    /** @var  VesselTypeRepository */
    private $vesselTypeRepository;

    public function __construct(VesselTypeRepository $vesselTypeRepo)
    {
        $this->vesselTypeRepository = $vesselTypeRepo;
    }

    /**
     * Display a listing of the VesselType.
     *
     * @param VesselTypeDataTable $vesselTypeDataTable
     * @return Response
     */
    public function index(VesselTypeDataTable $vesselTypeDataTable)
    {
        return $vesselTypeDataTable->render('vessel_types.index');
    }

    /**
     * Show the form for creating a new VesselType.
     *
     * @return Response
     */
    public function create()
    {
        return view('vessel_types.create');
    }

    /**
     * Store a newly created VesselType in storage.
     *
     * @param CreateVesselTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVesselTypeRequest $request)
    {
        $input = $request->all();

        $vesselType = $this->vesselTypeRepository->create($input);

        Flash::success('Vessel Type saved successfully.');

        return redirect(route('vesselTypes.index'));
    }

    /**
     * Display the specified VesselType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vesselType = $this->vesselTypeRepository->find($id);

        if (empty($vesselType)) {
            Flash::error('Vessel Type not found');

            return redirect(route('vesselTypes.index'));
        }

        return view('vessel_types.show')->with('vesselType', $vesselType);
    }

    /**
     * Show the form for editing the specified VesselType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vesselType = $this->vesselTypeRepository->find($id);

        if (empty($vesselType)) {
            Flash::error('Vessel Type not found');

            return redirect(route('vesselTypes.index'));
        }

        return view('vessel_types.edit')->with('vesselType', $vesselType);
    }

    /**
     * Update the specified VesselType in storage.
     *
     * @param  int              $id
     * @param UpdateVesselTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVesselTypeRequest $request)
    {
        $vesselType = $this->vesselTypeRepository->find($id);

        if (empty($vesselType)) {
            Flash::error('Vessel Type not found');

            return redirect(route('vesselTypes.index'));
        }

        $vesselType = $this->vesselTypeRepository->update($request->all(), $id);

        Flash::success('Vessel Type updated successfully.');

        return redirect(route('vesselTypes.index'));
    }

    /**
     * Remove the specified VesselType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vesselType = $this->vesselTypeRepository->find($id);

        if (empty($vesselType)) {
            Flash::error('Vessel Type not found');

            return redirect(route('vesselTypes.index'));
        }

        $this->vesselTypeRepository->find($id)->forcedelete();

        Flash::success('Vessel Type deleted successfully.');

        return redirect(route('vesselTypes.index'));
    }
}
