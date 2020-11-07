<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SchoolGrade;

class SchoolGradeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/school_grades', $schoolGrade
        );

        $this->assertApiResponse($schoolGrade);
    }

    /**
     * @test
     */
    public function test_read_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/school_grades/'.$schoolGrade->id
        );

        $this->assertApiResponse($schoolGrade->toArray());
    }

    /**
     * @test
     */
    public function test_update_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->create();
        $editedSchoolGrade = factory(SchoolGrade::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/school_grades/'.$schoolGrade->id,
            $editedSchoolGrade
        );

        $this->assertApiResponse($editedSchoolGrade);
    }

    /**
     * @test
     */
    public function test_delete_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/school_grades/'.$schoolGrade->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/school_grades/'.$schoolGrade->id
        );

        $this->response->assertStatus(404);
    }
}
