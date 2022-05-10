<?php

namespace App\Http\Controllers;

use App\DataTables\ShoreExperiencieDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShoreExperiencieRequest;
use App\Http\Requests\UpdateShoreExperiencieRequest;
use App\Repositories\ShoreExperiencieRepository;
use App\Models\PersonalInformation;
use App\Repositories\PersonalInformationRepository;
use Yajra\DataTables\DataTables;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ShoreExperiencieController extends AppBaseController
{
    /** @var  ShoreExperiencieRepository */
    private $shoreExperiencieRepository;
     /** @var  PersonalInformationRepository */
     private $personalInformationRepo;

    public function __construct(ShoreExperiencieRepository $shoreExperiencieRepo,PersonalInformationRepository $personalInformationRepo)
    {
        $this->shoreExperiencieRepository = $shoreExperiencieRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the ShoreExperiencie.
     *
     * @param ShoreExperiencieDataTable $shoreExperiencieDataTable
     * @return Response
     */
    public function index(ShoreExperiencieDataTable $shoreExperiencieDataTable)
    {
        return $shoreExperiencieDataTable->render('shore_experiencies.index');
    }

    /**
     * Show the form for creating a new ShoreExperiencie.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        
        if(isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if(!empty($personalInformation)) {
                return view('shore_experiencies.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Personal Information not found');
        return redirect(route('personalInformations.index'));
    }

    /**
     * Store a newly created ShoreExperiencie in storage.
     *
     * @param CreateShoreExperiencieRequest $request
     *
     * @return Response
     */
    public function store(CreateShoreExperiencieRequest $request)
    {
        $input = $request->all();

        $shoreExperiencie = $this->shoreExperiencieRepository->create($input);

        Flash::success('Shore Experiencie saved successfully.');

      
        return redirect(route('shoreExperiencies.create', [ 'id' => $shoreExperiencie->personal_informations_id ]));
    }

    /**
     * Display the specified ShoreExperiencie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shoreExperiencie = $this->shoreExperiencieRepository->find($id);

        if (empty($shoreExperiencie)) {
            Flash::error('Shore Experiencie not found');

            return redirect(route('shoreExperiencies.index'));
        }

        return view('shore_experiencies.show')->with('shoreExperiencie', $shoreExperiencie);
    }

    /**
     * Show the form for editing the specified ShoreExperiencie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shoreExperiencie = $this->shoreExperiencieRepository->find($id);

        if (empty($shoreExperiencie)) {
            Flash::error('Shore Experiencie not found');

            return redirect(route('shoreExperiencies.index'));
        }
        return view('shore_experiencies.edit')->with(['shoreExperiencie' => $shoreExperiencie, 'personalInformation' => $shoreExperiencie->personalInformation]);
       
    }

    /**
     * Update the specified ShoreExperiencie in storage.
     *
     * @param  int              $id
     * @param UpdateShoreExperiencieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShoreExperiencieRequest $request)
    {
        $shoreExperiencie = $this->shoreExperiencieRepository->find($id);

        if (empty($shoreExperiencie)) {
            Flash::error('Shore Experiencie not found');

            return redirect(route('shoreExperiencies.index'));
        }

        $shoreExperiencie = $this->shoreExperiencieRepository->update($request->all(), $id);

        Flash::success('Shore Experiencie updated successfully.');

       
        return redirect(route('shoreExperiencies.create', [ 'id' => $shoreExperiencie->personal_informations_id ]));
    }

    /**
     * Remove the specified ShoreExperiencie from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
       

        try{
            
            $this->shoreExperiencieRepository->find($id)->forcedelete();

            Flash::success('Shore Experiencie deleted successfully.');
    
 
             }
         catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::error('The Shore Experiencie can not be deleted. Probably it\'s been used by other entity');
            
             }
         finally{
            return redirect(route('shoreExperiencies.create', ['id' => $shoreExperiencie->personal_informations_id]));

         }    


       

        
    }


     /**
     * Return JSON with listing of the Shore Experiencies belong to PersonalInformation.
     *
     * @param integer $personal_informations_id
     * @return JSON
     */
    public function getPersonalInformationExperiencie($id)
    {
        $shoreExperiencieModel = $this->shoreExperiencieRepository->model();
        return Datatables::of($shoreExperiencieModel::where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'shore_experiencies.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    
    }
}
