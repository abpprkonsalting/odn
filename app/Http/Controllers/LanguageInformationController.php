<?php

namespace App\Http\Controllers;

use App\DataTables\LanguageInformationDataTable;
use App\Http\Requests\CreateLanguageInformationRequest;
use App\Http\Requests\UpdateLanguageInformationRequest;
use App\Repositories\LanguageInformationRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;
use App\Models\LanguageInformation;

class LanguageInformationController extends Controller
{
    /** @var  LanguageInformationRepository */
    private $languageInformationRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;


    public function __construct(LanguageInformationRepository $languageInformationRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->languageInformationRepository = $languageInformationRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

     /**
     * Display a listing of the Course.
     *
     * @param LanguageInformationDataTable $courseDataTable
     * @return Response
     */

    public function index(LanguageInformationDataTable $languageInformationDataTable )
    {
        return $languageInformationDataTable->render('language_informations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if(isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if(!empty($personalInformation)) {
                return view('language_informations.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Language Information not found');
        return redirect(route('personalInformations.index'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  @param CreateLanguageInformationRequest $request
     * @return Response
     */
    public function store(CreateLanguageInformationRequest  $request)
    {
        $input = $request->all();

        // $languageInformation = LanguageInformation::where([
        //     'personal_informations_id' => $input['personal_informations_id'],
        //     'languages_id'=> $input['languages_id'],
        //     'language_skills_id'=> $input['language_skills_id'],
        // ])->first();

        $languageInformationModel = $this->languageInformationRepository->model();
        $languageInformation = $languageInformationModel::with(['language', 'languageSkill','level'])
                                ->where([
                                    'personal_informations_id' => $input['personal_informations_id'],
                                    'languages_id'=> $input['languages_id'],
                                    'language_skills_id'=> $input['language_skills_id'],
                                ])->first();

        if (empty($languageInformation)) {
            $languageInformation = $this->languageInformationRepository->create($input);
        }
        else {
            $languageInformation = $this->languageInformationRepository->update($input, $languageInformation->id);
        }
        Flash::success('Language Information saved successfully.');
        return redirect(route('languageInformations.create', ['id' => $languageInformation->personal_informations_id]));
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $languageInformation = $this->languageInformationRepository->find($id);

        if (empty($languageInformation)) {
            Flash::error('Language Information not found');

            return redirect(route('languageInformations.index'));
        }

        return view('language_informations.show')->with('languageInformation', $languageInformation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $languageInformation = $this->languageInformationRepository->find($id);

        if (empty($languageInformation)) {
            Flash::error('Language Information not found');

            return redirect(route('languageInformations.index'));
        }

        return view('language_informations.edit')->with(['languageInformation' => $languageInformation,
                                                        'personalInformation' => $languageInformation->personalInformation]);
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLanguageInformationRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateLanguageInformationRequest $request, $id)
    {
        $languageInformation = $this->languageInformationRepository->find($id);

        if (empty($languageInformation)) {
            Flash::error('Language Information not found');
            return redirect(route('languageInformations.index'));
        }
        $languageInformation = $this->languageInformationRepository->update($request->all(), $id);
        Flash::success('Language Information updated successfully.');
        return redirect(route('languageInformations.create', ['id' => $languageInformation->personal_informations_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
        try{
            
            $this->languageInformationRepository->find($id)->forcedelete();

            Flash::success('Language Information deleted successfully.');
 
             }
         catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::error('The Language Information can not be deleted. Probably it\'s been used by other entity');
            
             }
         finally{
            return redirect(route('languageInformations.create', ['id' => $languageInformation->personal_informations_id]));

             }
      

        
    }

    public function getPersonalInformationLanguage($id)
    {
        $languageInformationModel = $this->languageInformationRepository->model();
        return Datatables::of($languageInformationModel::with(['language', 'languageSkill','level'])->where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'language_informations.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    
    }
}
