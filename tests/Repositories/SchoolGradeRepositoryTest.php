<?php namespace Tests\Repositories;

use App\Models\SchoolGrade;
use App\Repositories\SchoolGradeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SchoolGradeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SchoolGradeRepository
     */
    protected $schoolGradeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->schoolGradeRepo = \App::make(SchoolGradeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->make()->toArray();

        $createdSchoolGrade = $this->schoolGradeRepo->create($schoolGrade);

        $createdSchoolGrade = $createdSchoolGrade->toArray();
        $this->assertArrayHasKey('id', $createdSchoolGrade);
        $this->assertNotNull($createdSchoolGrade['id'], 'Created SchoolGrade must have id specified');
        $this->assertNotNull(SchoolGrade::find($createdSchoolGrade['id']), 'SchoolGrade with given id must be in DB');
        $this->assertModelData($schoolGrade, $createdSchoolGrade);
    }

    /**
     * @test read
     */
    public function test_read_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->create();

        $dbSchoolGrade = $this->schoolGradeRepo->find($schoolGrade->id);

        $dbSchoolGrade = $dbSchoolGrade->toArray();
        $this->assertModelData($schoolGrade->toArray(), $dbSchoolGrade);
    }

    /**
     * @test update
     */
    public function test_update_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->create();
        $fakeSchoolGrade = factory(SchoolGrade::class)->make()->toArray();

        $updatedSchoolGrade = $this->schoolGradeRepo->update($fakeSchoolGrade, $schoolGrade->id);

        $this->assertModelData($fakeSchoolGrade, $updatedSchoolGrade->toArray());
        $dbSchoolGrade = $this->schoolGradeRepo->find($schoolGrade->id);
        $this->assertModelData($fakeSchoolGrade, $dbSchoolGrade->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_school_grade()
    {
        $schoolGrade = factory(SchoolGrade::class)->create();

        $resp = $this->schoolGradeRepo->delete($schoolGrade->id);

        $this->assertTrue($resp);
        $this->assertNull(SchoolGrade::find($schoolGrade->id), 'SchoolGrade should not exist in DB');
    }
}
