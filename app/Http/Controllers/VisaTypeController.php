<?php

namespace App\Http\Controllers;

use App\DataTables\VisaTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVisaTypeRequest;
use App\Http\Requests\UpdateVisaTypeRequest;
use App\Repositories\VisaTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VisaTypeController extends AppBaseController
{
    /** @var  VisaTypeRepository */
    private $visaTypeRepository;

    public function __construct(VisaTypeRepository $visaTypeRepo)
    {
        $this->visaTypeRepository = $visaTypeRepo;
    }

    /**
     * Display a listing of the VisaType.
     *
     * @param VisaTypeDataTable $visaTypeDataTable
     * @return Response
     */
    public function index(VisaTypeDataTable $visaTypeDataTable)
    {
        return $visaTypeDataTable->render('visa_types.index');
    }

    /**
     * Show the form for creating a new VisaType.
     *
     * @return Response
     */
    public function create()
    {
        return view('visa_types.create');
    }

    /**
     * Store a newly created VisaType in storage.
     *
     * @param CreateVisaTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVisaTypeRequest $request)
    {
        $input = $request->all();

        $visaType = $this->visaTypeRepository->create($input);

        Flash::success('Visa Type saved successfully.');

        return redirect(route('visaTypes.index'));
    }

    /**
     * Display the specified VisaType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visaType = $this->visaTypeRepository->find($id);

        if (empty($visaType)) {
            Flash::error('Visa Type not found');

            return redirect(route('visaTypes.index'));
        }

        return view('visa_types.show')->with('visaType', $visaType);
    }

    /**
     * Show the form for editing the specified VisaType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visaType = $this->visaTypeRepository->find($id);

        if (empty($visaType)) {
            Flash::error('Visa Type not found');

            return redirect(route('visaTypes.index'));
        }

        return view('visa_types.edit')->with('visaType', $visaType);
    }

    /**
     * Update the specified VisaType in storage.
     *
     * @param  int              $id
     * @param UpdateVisaTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisaTypeRequest $request)
    {
        $visaType = $this->visaTypeRepository->find($id);

        if (empty($visaType)) {
            Flash::error('Visa Type not found');

            return redirect(route('visaTypes.index'));
        }

        $visaType = $this->visaTypeRepository->update($request->all(), $id);

        Flash::success('Visa Type updated successfully.');

        return redirect(route('visaTypes.index'));
    }

    /**
     * Remove the specified VisaType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->visaTypeRepository->find($id)->forcedelete();

            Flash::success('Visa Type deleted successfully.');
        }
        catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::error('The Visa Type can not be deleted. Probably it\'s been used by other entity');
            
             }
        finally{
            return redirect(route('visaTypes.index'));

        }     
            
    
       
       

        
    }
}
