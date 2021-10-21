<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSkillOrKnowledgeAPIRequest;
use App\Http\Requests\API\UpdateSkillOrKnowledgeAPIRequest;
use App\Models\SkillOrKnowledge;
use App\Repositories\SkillOrKnowledgeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\SkillOrKnowledgeResource;
use Response;

/**
 * Class SkillOrKnowledgeController
 * @package App\Http\Controllers\API
 */

class SkillOrKnowledgeAPIController extends AppBaseController
{
    /** @var  SkillOrKnowledgeRepository */
    private $skillOrKnowledgeRepository;

    public function __construct(SkillOrKnowledgeRepository $skillOrKnowledgeRepo)
    {
        $this->skillOrKnowledgeRepository = $skillOrKnowledgeRepo;
    }

    /**
     * Display a listing of the SkillOrKnowledge.
     * GET|HEAD /skillOrKnowledges
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $skillOrKnowledges = $this->skillOrKnowledgeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(SkillOrKnowledgeResource::collection($skillOrKnowledges), 'Skill Or Knowledges retrieved successfully');
    }

    /**
     * Store a newly created SkillOrKnowledge in storage.
     * POST /skillOrKnowledges
     *
     * @param CreateSkillOrKnowledgeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSkillOrKnowledgeAPIRequest $request)
    {
        $input = $request->all();

        $skillOrKnowledge = $this->skillOrKnowledgeRepository->create($input);

        return $this->sendResponse(new SkillOrKnowledgeResource($skillOrKnowledge), 'Skill Or Knowledge saved successfully');
    }

    /**
     * Display the specified SkillOrKnowledge.
     * GET|HEAD /skillOrKnowledges/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SkillOrKnowledge $skillOrKnowledge */
        $skillOrKnowledge = $this->skillOrKnowledgeRepository->find($id);

        if (empty($skillOrKnowledge)) {
            return $this->sendError('Skill Or Knowledge not found');
        }

        return $this->sendResponse(new SkillOrKnowledgeResource($skillOrKnowledge), 'Skill Or Knowledge retrieved successfully');
    }

    /**
     * Update the specified SkillOrKnowledge in storage.
     * PUT/PATCH /skillOrKnowledges/{id}
     *
     * @param int $id
     * @param UpdateSkillOrKnowledgeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkillOrKnowledgeAPIRequest $request)
    {
        $input = $request->all();

        /** @var SkillOrKnowledge $skillOrKnowledge */
        $skillOrKnowledge = $this->skillOrKnowledgeRepository->find($id);

        if (empty($skillOrKnowledge)) {
            return $this->sendError('Skill Or Knowledge not found');
        }

        $skillOrKnowledge = $this->skillOrKnowledgeRepository->update($input, $id);

        return $this->sendResponse(new SkillOrKnowledgeResource($skillOrKnowledge), 'SkillOrKnowledge updated successfully');
    }

    /**
     * Remove the specified SkillOrKnowledge from storage.
     * DELETE /skillOrKnowledges/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SkillOrKnowledge $skillOrKnowledge */
        $skillOrKnowledge = $this->skillOrKnowledgeRepository->find($id);

        if (empty($skillOrKnowledge)) {
            return $this->sendError('Skill Or Knowledge not found');
        }

        $skillOrKnowledge->delete();

        return $this->sendSuccess('Skill Or Knowledge deleted successfully');
    }
}
