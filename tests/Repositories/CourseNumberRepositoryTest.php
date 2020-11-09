<?php namespace Tests\Repositories;

use App\Models\CourseNumber;
use App\Repositories\CourseNumberRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CourseNumberRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CourseNumberRepository
     */
    protected $courseNumberRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->courseNumberRepo = \App::make(CourseNumberRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->make()->toArray();

        $createdCourseNumber = $this->courseNumberRepo->create($courseNumber);

        $createdCourseNumber = $createdCourseNumber->toArray();
        $this->assertArrayHasKey('id', $createdCourseNumber);
        $this->assertNotNull($createdCourseNumber['id'], 'Created CourseNumber must have id specified');
        $this->assertNotNull(CourseNumber::find($createdCourseNumber['id']), 'CourseNumber with given id must be in DB');
        $this->assertModelData($courseNumber, $createdCourseNumber);
    }

    /**
     * @test read
     */
    public function test_read_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->create();

        $dbCourseNumber = $this->courseNumberRepo->find($courseNumber->id);

        $dbCourseNumber = $dbCourseNumber->toArray();
        $this->assertModelData($courseNumber->toArray(), $dbCourseNumber);
    }

    /**
     * @test update
     */
    public function test_update_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->create();
        $fakeCourseNumber = factory(CourseNumber::class)->make()->toArray();

        $updatedCourseNumber = $this->courseNumberRepo->update($fakeCourseNumber, $courseNumber->id);

        $this->assertModelData($fakeCourseNumber, $updatedCourseNumber->toArray());
        $dbCourseNumber = $this->courseNumberRepo->find($courseNumber->id);
        $this->assertModelData($fakeCourseNumber, $dbCourseNumber->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_course_number()
    {
        $courseNumber = factory(CourseNumber::class)->create();

        $resp = $this->courseNumberRepo->delete($courseNumber->id);

        $this->assertTrue($resp);
        $this->assertNull(CourseNumber::find($courseNumber->id), 'CourseNumber should not exist in DB');
    }
}
