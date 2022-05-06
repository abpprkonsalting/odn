<?php

namespace App\Http\Controllers;

use App\DataTables\SkillOrKnowledgeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSkillOrKnowledgeRequest;
use App\Http\Requests\UpdateSkillOrKnowledgeRequest;
use App\Repositories\SkillOrKnowledgeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SkillOrKnowledgeController extends AppBaseController
{
    /** @var  SkillOrKnowledgeRepository */
    private $skillOrKnowledgeRepository;

    public function __construct(SkillOrKnowledgeRepository $skillOrKnowledgeRepo)
    {
        $this->skillOrKnowledgeRepository = $skillOrKnowledgeRepo;
    }

    /**
     * Display a listing of the SkillOrKnowledge.
     *
     * @param SkillOrKnowledgeDataTable $skillOrKnowledgeDataTable
     * @return Response
     */
    public function index(SkillOrKnowledgeDataTable $skillOrKnowledgeDataTable)
    {
        return $skillOrKnowledgeDataTable->render('skill_or_knowledges.index');
    }

    /**
     * Show the form for creating a new SkillOrKnowledge.
     *
     * @return Response
     */
    public function create()
    {
        return view('skill_or_knowledges.create');
    }

    /**
     * Store a newly created SkillOrKnowledge in storage.
     *
     * @param CreateSkillOrKnowledgeRequest $request
     *
     * @return Response
     */
    public function store(CreateSkillOrKnowledgeRequest $request)
    {
        $input = $request->all();

        $skillOrKnowledge = $this->skillOrKnowledgeRepository->create($input);

        Flash::success('Skill Or Knowledge saved successfully.');

        return redirect(route('skillOrKnowledges.index'));
    }

    /**
     * Display the specified SkillOrKnowledge.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $skillOrKnowledge = $this->skillOrKnowledgeRepository->find($id);

        if (empty($skillOrKnowledge)) {
            Flash::error('Skill Or Knowledge not found');

            return redirect(route('skillOrKnowledges.index'));
        }

        return view('skill_or_knowledges.show')->with('skillOrKnowledge', $skillOrKnowledge);
    }

    /**
     * Show the form for editing the specified SkillOrKnowledge.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $skillOrKnowledge = $this->skillOrKnowledgeRepository->find($id);

        if (empty($skillOrKnowledge)) {
            Flash::error('Skill Or Knowledge not found');

            return redirect(route('skillOrKnowledges.index'));
        }

        return view('skill_or_knowledges.edit')->with('skillOrKnowledge', $skillOrKnowledge);
    }

    /**
     * Update the specified SkillOrKnowledge in storage.
     *
     * @param  int              $id
     * @param UpdateSkillOrKnowledgeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkillOrKnowledgeRequest $request)
    {
        $skillOrKnowledge = $this->skillOrKnowledgeRepository->find($id);

        if (empty($skillOrKnowledge)) {
            Flash::error('Skill Or Knowledge not found');

            return redirect(route('skillOrKnowledges.index'));
        }

        $skillOrKnowledge = $this->skillOrKnowledgeRepository->update($request->all(), $id);

        Flash::success('Skill Or Knowledge updated successfully.');

        return redirect(route('skillOrKnowledges.index'));
    }

    /**
     * Remove the specified SkillOrKnowledge from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $skillOrKnowledge = $this->skillOrKnowledgeRepository->find($id);

        if (empty($skillOrKnowledge)) {
            Flash::error('Skill Or Knowledge not found');

            return redirect(route('skillOrKnowledges.index'));
        }

        try{
            
            $this->skillOrKnowledgeRepository->find($id)->forcedelete();

        Flash::success('Skill Or Knowledge deleted successfully.');

    
 
             }
         catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::success('Skill Or Knowledge  Cannot Delete. It has been used for other entity');
            
             }

       
        return redirect(route('skillOrKnowledges.index'));
    }
}
