<?php

namespace App\Http\Controllers;

use App\DataTables\FamilyStatusDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFamilyStatusRequest;
use App\Http\Requests\UpdateFamilyStatusRequest;
use App\Repositories\FamilyStatusRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FamilyStatusController extends AppBaseController
{
    /** @var  FamilyStatusRepository */
    private $familyStatusRepository;

    public function __construct(FamilyStatusRepository $familyStatusRepo)
    {
        $this->familyStatusRepository = $familyStatusRepo;
    }

    /**
     * Display a listing of the FamilyStatus.
     *
     * @param FamilyStatusDataTable $familyStatusDataTable
     * @return Response
     */
    public function index(FamilyStatusDataTable $familyStatusDataTable)
    {
        return $familyStatusDataTable->render('family_statuses.index');
    }

    /**
     * Show the form for creating a new FamilyStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('family_statuses.create');
    }

    /**
     * Store a newly created FamilyStatus in storage.
     *
     * @param CreateFamilyStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilyStatusRequest $request)
    {
        $input = $request->all();

        $familyStatus = $this->familyStatusRepository->create($input);

        Flash::success('Family Status saved successfully.');

        return redirect(route('familyStatuses.index'));
    }

    /**
     * Display the specified FamilyStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $familyStatus = $this->familyStatusRepository->find($id);

        if (empty($familyStatus)) {
            Flash::error('Family Status not found');

            return redirect(route('familyStatuses.index'));
        }

        return view('family_statuses.show')->with('familyStatus', $familyStatus);
    }

    /**
     * Show the form for editing the specified FamilyStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $familyStatus = $this->familyStatusRepository->find($id);

        if (empty($familyStatus)) {
            Flash::error('Family Status not found');

            return redirect(route('familyStatuses.index'));
        }

        return view('family_statuses.edit')->with('familyStatus', $familyStatus);
    }

    /**
     * Update the specified FamilyStatus in storage.
     *
     * @param  int              $id
     * @param UpdateFamilyStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilyStatusRequest $request)
    {
        $familyStatus = $this->familyStatusRepository->find($id);

        if (empty($familyStatus)) {
            Flash::error('Family Status not found');

            return redirect(route('familyStatuses.index'));
        }

        $familyStatus = $this->familyStatusRepository->update($request->all(), $id);

        Flash::success('Family Status updated successfully.');

        return redirect(route('familyStatuses.index'));
    }

    /**
     * Remove the specified FamilyStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        
        try{
            $this->familyStatusRepository->find($id)->forcedelete();

            Flash::success('Family Status deleted successfully.');

            }
            catch(\Illuminate\Database\QueryException $ex){
            
    
                Flash::error('The Family Status can not be deleted. Probably it\'s been used by other entity');
           
            }
            finally{

                return redirect(route('familyStatuses.index'));     
            }
        
       

        
    }
}
