<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCourseNumberAPIRequest;
use App\Http\Requests\API\UpdateCourseNumberAPIRequest;
use App\Models\CourseNumber;
use App\Repositories\CourseNumberRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CourseNumberController
 * @package App\Http\Controllers\API
 */

class CourseNumberAPIController extends AppBaseController
{
    /** @var  CourseNumberRepository */
    private $courseNumberRepository;

    public function __construct(CourseNumberRepository $courseNumberRepo)
    {
        $this->courseNumberRepository = $courseNumberRepo;
    }

    /**
     * Display a listing of the CourseNumber.
     * GET|HEAD /courseNumbers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $courseNumbers = $this->courseNumberRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($courseNumbers->toArray(), 'Course Numbers retrieved successfully');
    }

    /**
     * Store a newly created CourseNumber in storage.
     * POST /courseNumbers
     *
     * @param CreateCourseNumberAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseNumberAPIRequest $request)
    {
        $input = $request->all();

        $courseNumber = $this->courseNumberRepository->create($input);

        return $this->sendResponse($courseNumber->toArray(), 'Course Number saved successfully');
    }

    /**
     * Display the specified CourseNumber.
     * GET|HEAD /courseNumbers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CourseNumber $courseNumber */
        $courseNumber = $this->courseNumberRepository->find($id);

        if (empty($courseNumber)) {
            return $this->sendError('Course Number not found');
        }

        return $this->sendResponse($courseNumber->toArray(), 'Course Number retrieved successfully');
    }

    /**
     * Update the specified CourseNumber in storage.
     * PUT/PATCH /courseNumbers/{id}
     *
     * @param int $id
     * @param UpdateCourseNumberAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseNumberAPIRequest $request)
    {
        $input = $request->all();

        /** @var CourseNumber $courseNumber */
        $courseNumber = $this->courseNumberRepository->find($id);

        if (empty($courseNumber)) {
            return $this->sendError('Course Number not found');
        }

        $courseNumber = $this->courseNumberRepository->update($input, $id);

        return $this->sendResponse($courseNumber->toArray(), 'CourseNumber updated successfully');
    }

    /**
     * Remove the specified CourseNumber from storage.
     * DELETE /courseNumbers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CourseNumber $courseNumber */
        $courseNumber = $this->courseNumberRepository->find($id);

        if (empty($courseNumber)) {
            return $this->sendError('Course Number not found');
        }

        $courseNumber->delete();

        return $this->sendSuccess('Course Number deleted successfully');
    }
}
