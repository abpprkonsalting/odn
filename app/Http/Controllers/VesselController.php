<?php

namespace App\Http\Controllers;

use App\DataTables\VesselDataTable;
//use App\Http\Requests;
use App\Http\Requests\CreateVesselRequest;
use App\Http\Requests\UpdateVesselRequest;
use App\Repositories\VesselRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VesselController extends AppBaseController
{
    /** @var  VesselRepository */
    private $vesselRepository;

    public function __construct(VesselRepository $vesselRepo)
    {
        $this->vesselRepository = $vesselRepo;
    }

    /**
     * Display a listing of the Vessel.
     *
     * @param VesselDataTable $vesselDataTable
     * @return Response
     */
    public function index(VesselDataTable $vesselDataTable)
    {
        return $vesselDataTable->render('vessels.index');
    }

    /**
     * Show the form for creating a new Vessel.
     *
     * @return Response
     */
    public function create()
    {
        return view('vessels.create');
    }

    /**
     * Store a newly created Vessel in storage.
     *
     * @param CreateVesselRequest $request
     *
     * @return Response
     */
    public function store(CreateVesselRequest $request)
    {
        $req = $this->setActive($request);
        $vessel = $this->vesselRepository->create($req);

        Flash::success('Vessel saved successfully.');

        return redirect(route('vessels.index'));
    }

    /**
     * Display the specified Vessel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vessel = $this->vesselRepository->find($id);

        if (empty($vessel)) {
            Flash::error('Vessel not found');
            return redirect(route('vessels.index'));
        }
        return view('vessels.show')->with('vessel', $vessel);
    }

    /**
     * Show the form for editing the specified Vessel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vessel = $this->vesselRepository->find($id);

        if (empty($vessel)) {
            Flash::error('Vessel not found');
            return redirect(route('vessels.index'));
        }
        return view('vessels.edit')->with('vessel', $vessel);
    }

    /**
     * Update the specified Vessel in storage.
     *
     * @param  int              $id
     * @param UpdateVesselRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVesselRequest $request)
    {
        $vessel = $this->vesselRepository->find($id);

        if (empty($vessel)) {
            Flash::error('Vessel not found');
            return redirect(route('vessels.index'));
        }
        $req = $this->setActive($request);
        $vessel = $this->vesselRepository->update($req, $id);

        Flash::success('Vessel updated successfully.');

        return redirect(route('vessels.index'));
    }

    /**
     * Remove the specified Vessel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vessel = $this->vesselRepository->find($id);

        if (empty($vessel)) {
            Flash::error('Vessel not found');

            return redirect(route('vessels.index'));
        }

        try{
            
            $this->vesselRepository->find($id)->forcedelete();

            Flash::success('Vessel deleted successfully.');
    

    
 
             }
         catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::success('Vessel Cannot Delete. It has been used for other entity');
            
             }

        

        return redirect(route('vessels.index'));
    }

    private function setActive($request) {
        $req = $request->all();
        $req['active'] = $request->has('active');
        return $req;
    }
}
