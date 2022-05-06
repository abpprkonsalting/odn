<?php

namespace App\Http\Controllers;

use App\DataTables\PoliticalIntegrationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePoliticalIntegrationRequest;
use App\Http\Requests\UpdatePoliticalIntegrationRequest;
use App\Repositories\PoliticalIntegrationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PoliticalIntegrationController extends AppBaseController
{
    /** @var  PoliticalIntegrationRepository */
    private $politicalIntegrationRepository;

    public function __construct(PoliticalIntegrationRepository $politicalIntegrationRepo)
    {
        $this->politicalIntegrationRepository = $politicalIntegrationRepo;
    }

    /**
     * Display a listing of the PoliticalIntegration.
     *
     * @param PoliticalIntegrationDataTable $politicalIntegrationDataTable
     * @return Response
     */
    public function index(PoliticalIntegrationDataTable $politicalIntegrationDataTable)
    {
        return $politicalIntegrationDataTable->render('political_integrations.index');
    }

    /**
     * Show the form for creating a new PoliticalIntegration.
     *
     * @return Response
     */
    public function create()
    {
        return view('political_integrations.create');
    }

    /**
     * Store a newly created PoliticalIntegration in storage.
     *
     * @param CreatePoliticalIntegrationRequest $request
     *
     * @return Response
     */
    public function store(CreatePoliticalIntegrationRequest $request)
    {
        $input = $request->all();

        $politicalIntegration = $this->politicalIntegrationRepository->create($input);

        Flash::success('Political Integration saved successfully.');

        return redirect(route('politicalIntegrations.index'));
    }

    /**
     * Display the specified PoliticalIntegration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $politicalIntegration = $this->politicalIntegrationRepository->find($id);

        if (empty($politicalIntegration)) {
            Flash::error('Political Integration not found');

            return redirect(route('politicalIntegrations.index'));
        }

        return view('political_integrations.show')->with('politicalIntegration', $politicalIntegration);
    }

    /**
     * Show the form for editing the specified PoliticalIntegration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $politicalIntegration = $this->politicalIntegrationRepository->find($id);

        if (empty($politicalIntegration)) {
            Flash::error('Political Integration not found');

            return redirect(route('politicalIntegrations.index'));
        }

        return view('political_integrations.edit')->with('politicalIntegration', $politicalIntegration);
    }

    /**
     * Update the specified PoliticalIntegration in storage.
     *
     * @param  int              $id
     * @param UpdatePoliticalIntegrationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePoliticalIntegrationRequest $request)
    {
        $politicalIntegration = $this->politicalIntegrationRepository->find($id);

        if (empty($politicalIntegration)) {
            Flash::error('Political Integration not found');

            return redirect(route('politicalIntegrations.index'));
        }

        $politicalIntegration = $this->politicalIntegrationRepository->update($request->all(), $id);

        Flash::success('Political Integration updated successfully.');

        return redirect(route('politicalIntegrations.index'));
    }

    /**
     * Remove the specified PoliticalIntegration from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $politicalIntegration = $this->politicalIntegrationRepository->find($id);

        if (empty($politicalIntegration)) {
            Flash::error('Political Integration not found');

            return redirect(route('politicalIntegrations.index'));
        }

        try{
            
            $this->politicalIntegrationRepository->find($id)->forcedelete();

            Flash::success('Political Integration deleted successfully.');
    
 
             }
         catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::success('Political Integration Cannot Delete. It has been used for other entity');
            
             }

       
        return redirect(route('politicalIntegrations.index'));
    }
}
