<?php

namespace App\Http\Controllers;

use App\DataTables\CourseNumberDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCourseNumberRequest;
use App\Http\Requests\UpdateCourseNumberRequest;
use App\Repositories\CourseNumberRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CourseNumberController extends AppBaseController
{
    /** @var  CourseNumberRepository */
    private $courseNumberRepository;

    public function __construct(CourseNumberRepository $courseNumberRepo)
    {
        $this->courseNumberRepository = $courseNumberRepo;
    }

    /**
     * Display a listing of the CourseNumber.
     *
     * @param CourseNumberDataTable $courseNumberDataTable
     * @return Response
     */
    public function index(CourseNumberDataTable $courseNumberDataTable)
    {
        return $courseNumberDataTable->render('course_numbers.index');
    }

    /**
     * Show the form for creating a new CourseNumber.
     *
     * @return Response
     */
    public function create()
    {
        return view('course_numbers.create');
    }

    /**
     * Store a newly created CourseNumber in storage.
     *
     * @param CreateCourseNumberRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseNumberRequest $request)
    {
        $input = $request->all();

        $courseNumber = $this->courseNumberRepository->create($input);

        Flash::success('Course Number saved successfully.');

        return redirect(route('courseNumbers.index'));
    }

    /**
     * Display the specified CourseNumber.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courseNumber = $this->courseNumberRepository->find($id);

        if (empty($courseNumber)) {
            Flash::error('Course Number not found');

            return redirect(route('courseNumbers.index'));
        }

        return view('course_numbers.show')->with('courseNumber', $courseNumber);
    }

    /**
     * Show the form for editing the specified CourseNumber.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courseNumber = $this->courseNumberRepository->find($id);

        if (empty($courseNumber)) {
            Flash::error('Course Number not found');

            return redirect(route('courseNumbers.index'));
        }

        return view('course_numbers.edit')->with('courseNumber', $courseNumber);
    }

    /**
     * Update the specified CourseNumber in storage.
     *
     * @param  int              $id
     * @param UpdateCourseNumberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseNumberRequest $request)
    {
        $courseNumber = $this->courseNumberRepository->find($id);

        if (empty($courseNumber)) {
            Flash::error('Course Number not found');

            return redirect(route('courseNumbers.index'));
        }

        $courseNumber = $this->courseNumberRepository->update($request->all(), $id);

        Flash::success('Course Number updated successfully.');

        return redirect(route('courseNumbers.index'));
    }

    /**
     * Remove the specified CourseNumber from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courseNumber = $this->courseNumberRepository->find($id);

        if (empty($courseNumber)) {
            Flash::error('Course Number not found');

            return redirect(route('courseNumbers.index'));
        }

        $this->courseNumberRepository->find($id)->forcedelete();

        Flash::success('Course Number deleted successfully.');

        return redirect(route('courseNumbers.index'));
    }
}
