<?php

namespace App\Http\Controllers;

use App\DataTables\SchoolGradeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSchoolGradeRequest;
use App\Http\Requests\UpdateSchoolGradeRequest;
use App\Repositories\SchoolGradeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SchoolGradeController extends AppBaseController
{
    /** @var  SchoolGradeRepository */
    private $schoolGradeRepository;

    public function __construct(SchoolGradeRepository $schoolGradeRepo)
    {
        $this->schoolGradeRepository = $schoolGradeRepo;
    }

    /**
     * Display a listing of the SchoolGrade.
     *
     * @param SchoolGradeDataTable $schoolGradeDataTable
     * @return Response
     */
    public function index(SchoolGradeDataTable $schoolGradeDataTable)
    {
        return $schoolGradeDataTable->render('school_grades.index');
    }

    /**
     * Show the form for creating a new SchoolGrade.
     *
     * @return Response
     */
    public function create()
    {
        return view('school_grades.create');
    }

    /**
     * Store a newly created SchoolGrade in storage.
     *
     * @param CreateSchoolGradeRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolGradeRequest $request)
    {
        $input = $request->all();

        $schoolGrade = $this->schoolGradeRepository->create($input);

        Flash::success('School Grade saved successfully.');

        return redirect(route('schoolGrades.index'));
    }

    /**
     * Display the specified SchoolGrade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $schoolGrade = $this->schoolGradeRepository->find($id);

        if (empty($schoolGrade)) {
            Flash::error('School Grade not found');

            return redirect(route('schoolGrades.index'));
        }

        return view('school_grades.show')->with('schoolGrade', $schoolGrade);
    }

    /**
     * Show the form for editing the specified SchoolGrade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $schoolGrade = $this->schoolGradeRepository->find($id);

        if (empty($schoolGrade)) {
            Flash::error('School Grade not found');

            return redirect(route('schoolGrades.index'));
        }

        return view('school_grades.edit')->with('schoolGrade', $schoolGrade);
    }

    /**
     * Update the specified SchoolGrade in storage.
     *
     * @param  int              $id
     * @param UpdateSchoolGradeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolGradeRequest $request)
    {
        $schoolGrade = $this->schoolGradeRepository->find($id);

        if (empty($schoolGrade)) {
            Flash::error('School Grade not found');

            return redirect(route('schoolGrades.index'));
        }

        $schoolGrade = $this->schoolGradeRepository->update($request->all(), $id);

        Flash::success('School Grade updated successfully.');

        return redirect(route('schoolGrades.index'));
    }

    /**
     * Remove the specified SchoolGrade from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $schoolGrade = $this->schoolGradeRepository->find($id);

        if (empty($schoolGrade)) {
            Flash::error('School Grade not found');

            return redirect(route('schoolGrades.index'));
        }

        $this->schoolGradeRepository->delete($id);

        Flash::success('School Grade deleted successfully.');

        return redirect(route('schoolGrades.index'));
    }
}
