<?php

namespace App\Http\Controllers;

use App\DataTables\OtherSkillDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOtherSkillRequest;
use App\Http\Requests\UpdateOtherSkillRequest;
use App\Repositories\OtherSkillRepository;
use App\Repositories\PersonalInformationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Response;

class OtherSkillController extends AppBaseController
{
    /** @var  OtherSkillRepository */
    private $otherSkillRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepository;

    public function __construct(OtherSkillRepository $otherSkillRepo, PersonalInformationRepository $personalInformationRepository)
    {
        $this->otherSkillRepository = $otherSkillRepo;
        $this->personalInformationRepository = $personalInformationRepository;
    }

    /**
     * Display a listing of the OtherSkill.
     *
     * @param OtherSkillDataTable $otherSkillDataTable
     * @return Response
     */
    public function index(OtherSkillDataTable $otherSkillDataTable)
    {
        return $otherSkillDataTable->render('other_skills.index');
    }

    /**
     * Show the form for creating a new OtherSkill.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if(isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepository->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if(!empty($personalInformation)) {
               
                return view('other_skills.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Personal Information not found');
        return redirect(route('personalInformations.index'));
    }

    /**
     * Store a newly created OtherSkill in storage.
     *
     * @param CreateOtherSkillRequest $request
     *
     * @return Response
     */
    public function store(CreateOtherSkillRequest $request)
    {
        $input = $request->all();

        $otherSkill = $this->otherSkillRepository->create($input);

        Flash::success('Other Skill saved successfully.');

        
        return redirect(route('otherSkills.create', ['id' => $otherSkill->personal_informations_id]));
    }

    /**
     * Display the specified OtherSkill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $otherSkill = $this->otherSkillRepository->find($id);

        if (empty($otherSkill)) {
            Flash::error('Other Skill not found');

            return redirect(route('otherSkills.index'));
        }

        return view('other_skills.show')->with('otherSkill', $otherSkill);
    }

    /**
     * Show the form for editing the specified OtherSkill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $otherSkill = $this->otherSkillRepository->find($id);

        if (empty($otherSkill)) {
            Flash::error('Other Skill not found');

            return redirect(route('otherSkills.index'));
        }

        
        return view('other_skills.edit')->with(['otherSkill' => $otherSkill, 'personalInformation' => $otherSkill->personalInformation]);
    }

    /**
     * Update the specified OtherSkill in storage.
     *
     * @param  int              $id
     * @param UpdateOtherSkillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtherSkillRequest $request)
    {
        $otherSkill = $this->otherSkillRepository->find($id);

        if (empty($otherSkill)) {
            Flash::error('Other Skill not found');

            return redirect(route('otherSkills.index'));
        }

        $otherSkill = $this->otherSkillRepository->update($request->all(), $id);

        Flash::success('Other Skill updated successfully.');

        
        return redirect(route('otherSkills.create', ['id' => $otherSkill->personal_informations_id]));
    }

    /**
     * Remove the specified OtherSkill from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $otherSkill = $this->otherSkillRepository->find($id);

        if (empty($otherSkill)) {
            Flash::error('Other Skill not found');

            return redirect(route('otherSkills.index'));
        }

        $this->otherSkillRepository->delete($id);

        Flash::success('Other Skill deleted successfully.');

       
        return redirect(route('otherSkills.create', ['id' => $otherSkill->personal_informations_id]));
    }
    public function getPersonalInformationSkill($id)
    {
        $otherSkillModel = $this->otherSkillRepository->model();
        return Datatables::of($otherSkillModel::where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'other_skills.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    
    }
}
