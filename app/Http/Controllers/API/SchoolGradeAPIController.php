<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSchoolGradeAPIRequest;
use App\Http\Requests\API\UpdateSchoolGradeAPIRequest;
use App\Models\SchoolGrade;
use App\Repositories\SchoolGradeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SchoolGradeController
 * @package App\Http\Controllers\API
 */

class SchoolGradeAPIController extends AppBaseController
{
    /** @var  SchoolGradeRepository */
    private $schoolGradeRepository;

    public function __construct(SchoolGradeRepository $schoolGradeRepo)
    {
        $this->schoolGradeRepository = $schoolGradeRepo;
    }

    /**
     * Display a listing of the SchoolGrade.
     * GET|HEAD /schoolGrades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $schoolGrades = $this->schoolGradeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($schoolGrades->toArray(), 'School Grades retrieved successfully');
    }

    /**
     * Store a newly created SchoolGrade in storage.
     * POST /schoolGrades
     *
     * @param CreateSchoolGradeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolGradeAPIRequest $request)
    {
        $input = $request->all();

        $schoolGrade = $this->schoolGradeRepository->create($input);

        return $this->sendResponse($schoolGrade->toArray(), 'School Grade saved successfully');
    }

    /**
     * Display the specified SchoolGrade.
     * GET|HEAD /schoolGrades/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SchoolGrade $schoolGrade */
        $schoolGrade = $this->schoolGradeRepository->find($id);

        if (empty($schoolGrade)) {
            return $this->sendError('School Grade not found');
        }

        return $this->sendResponse($schoolGrade->toArray(), 'School Grade retrieved successfully');
    }

    /**
     * Update the specified SchoolGrade in storage.
     * PUT/PATCH /schoolGrades/{id}
     *
     * @param int $id
     * @param UpdateSchoolGradeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolGradeAPIRequest $request)
    {
        $input = $request->all();

        /** @var SchoolGrade $schoolGrade */
        $schoolGrade = $this->schoolGradeRepository->find($id);

        if (empty($schoolGrade)) {
            return $this->sendError('School Grade not found');
        }

        $schoolGrade = $this->schoolGradeRepository->update($input, $id);

        return $this->sendResponse($schoolGrade->toArray(), 'SchoolGrade updated successfully');
    }

    /**
     * Remove the specified SchoolGrade from storage.
     * DELETE /schoolGrades/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SchoolGrade $schoolGrade */
        $schoolGrade = $this->schoolGradeRepository->find($id);

        if (empty($schoolGrade)) {
            return $this->sendError('School Grade not found');
        }

        $schoolGrade->delete();

        return $this->sendSuccess('School Grade deleted successfully');
    }
}
