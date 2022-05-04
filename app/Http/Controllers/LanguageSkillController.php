<?php

namespace App\Http\Controllers;

use App\DataTables\LanguageSkillDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLanguageSkillRequest;
use App\Http\Requests\UpdateLanguageSkillRequest;
use App\Repositories\LanguageSkillRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LanguageSkillController extends Controller
{
    /** @var  LanguageSkillRepository */
    private $languageSkillRepository;

    public function __construct(LanguageSkillRepository $languageSkillRepo)
    {
        $this->languageSkillRepository = $languageSkillRepo;
    }

    /**
     * Display a listing of the HairColor.
     *
     * @param LanguageSkillDataTable $languageSkillDataTable
     * @return Response
     */


    public function index(LanguageSkillDataTable  $languageSkillDataTable)
    {
        return $languageSkillDataTable->render('language_skills.index');
    }

    /**
     * Show the form for creating a new LanguageSkill
     *
     * @return Response
     */
    public function create()
    {
        return view('language_skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  @param CreateLanguegeSkillRequest $request
     * @return Response
     */
    public function store(CreateLanguageSkillRequest $request)
    {
        $input = $request->all();

        $LanguageSkill = $this->languageSkillRepository->create($input);

        Flash::success('Language Skill saved successfully.');

        return redirect(route('languageSkills.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $languageSkill = $this->languageSkillRepository->find($id);

        if (empty($languageSkill)) {
            Flash::error('Language Skill not found');

            return redirect(route('languageSkills.index'));
        }

        return view('language_skills.show')->with('languageSkill', $languageSkill);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $languageSkill = $this->languageSkillRepository->find($id);

        if (empty($languageSkill)) {
            Flash::error('Language Skill not found');

            return redirect(route('languageSkills.index'));
        }

        return view('language_skills.edit')->with('languageSkill', $languageSkill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLanguageSkillRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateLanguageSkillRequest $request, $id)
    {
        $languageSkill = $this->languageSkillRepository->find($id);

        if (empty($languageSkill)) {
            Flash::error('Language Skill not found');

            return redirect(route('languageSkills.index'));
        }

        $languageSkill = $this->languageSkillRepository->update($request->all(), $id);

        Flash::success('Language Skill updated successfully.');

        return redirect(route('languageSkills.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $languageSkill = $this->languageSkillRepository->find($id);

        if (empty($languageSkill)) {
            Flash::error('Language Skill not found');

            return redirect(route('languageSkills.index'));
        }

        $this->languageSkillRepository->delete($id);

        Flash::success('Language Skill deleted successfully.');

        return redirect(route('languageSkills.index'));
    }
}
