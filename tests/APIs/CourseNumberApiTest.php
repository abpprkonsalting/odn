<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CourseNumber;

class CourseNumberApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/course_numbers', $courseNumber
        );

        $this->assertApiResponse($courseNumber);
    }

    /**
     * @test
     */
    public function test_read_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/course_numbers/'.$courseNumber->id
        );

        $this->assertApiResponse($courseNumber->toArray());
    }

    /**
     * @test
     */
    public function test_update_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->create();
        $editedCourseNumber = factory(CourseNumber::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/course_numbers/'.$courseNumber->id,
            $editedCourseNumber
        );

        $this->assertApiResponse($editedCourseNumber);
    }

    /**
     * @test
     */
    public function test_delete_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/course_numbers/'.$courseNumber->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/course_numbers/'.$courseNumber->id
        );

        $this->response->assertStatus(404);
    }
}
