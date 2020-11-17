<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOtherSkillAPIRequest;
use App\Http\Requests\API\UpdateOtherSkillAPIRequest;
use App\Models\OtherSkill;
use App\Repositories\OtherSkillRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OtherSkillController
 * @package App\Http\Controllers\API
 */

class OtherSkillAPIController extends AppBaseController
{
    /** @var  OtherSkillRepository */
    private $otherSkillRepository;

    public function __construct(OtherSkillRepository $otherSkillRepo)
    {
        $this->otherSkillRepository = $otherSkillRepo;
    }

    /**
     * Display a listing of the OtherSkill.
     * GET|HEAD /otherSkills
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $otherSkills = $this->otherSkillRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($otherSkills->toArray(), 'Other Skills retrieved successfully');
    }

    /**
     * Store a newly created OtherSkill in storage.
     * POST /otherSkills
     *
     * @param CreateOtherSkillAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOtherSkillAPIRequest $request)
    {
        $input = $request->all();

        $otherSkill = $this->otherSkillRepository->create($input);

        return $this->sendResponse($otherSkill->toArray(), 'Other Skill saved successfully');
    }

    /**
     * Display the specified OtherSkill.
     * GET|HEAD /otherSkills/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OtherSkill $otherSkill */
        $otherSkill = $this->otherSkillRepository->find($id);

        if (empty($otherSkill)) {
            return $this->sendError('Other Skill not found');
        }

        return $this->sendResponse($otherSkill->toArray(), 'Other Skill retrieved successfully');
    }

    /**
     * Update the specified OtherSkill in storage.
     * PUT/PATCH /otherSkills/{id}
     *
     * @param int $id
     * @param UpdateOtherSkillAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtherSkillAPIRequest $request)
    {
        $input = $request->all();

        /** @var OtherSkill $otherSkill */
        $otherSkill = $this->otherSkillRepository->find($id);

        if (empty($otherSkill)) {
            return $this->sendError('Other Skill not found');
        }

        $otherSkill = $this->otherSkillRepository->update($input, $id);

        return $this->sendResponse($otherSkill->toArray(), 'OtherSkill updated successfully');
    }

    /**
     * Remove the specified OtherSkill from storage.
     * DELETE /otherSkills/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OtherSkill $otherSkill */
        $otherSkill = $this->otherSkillRepository->find($id);

        if (empty($otherSkill)) {
            return $this->sendError('Other Skill not found');
        }

        $otherSkill->delete();

        return $this->sendSuccess('Other Skill deleted successfully');
    }
}
