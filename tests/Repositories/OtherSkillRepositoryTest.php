<?php namespace Tests\Repositories;

use App\Models\OtherSkill;
use App\Repositories\OtherSkillRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OtherSkillRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OtherSkillRepository
     */
    protected $otherSkillRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->otherSkillRepo = \App::make(OtherSkillRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->make()->toArray();

        $createdOtherSkill = $this->otherSkillRepo->create($otherSkill);

        $createdOtherSkill = $createdOtherSkill->toArray();
        $this->assertArrayHasKey('id', $createdOtherSkill);
        $this->assertNotNull($createdOtherSkill['id'], 'Created OtherSkill must have id specified');
        $this->assertNotNull(OtherSkill::find($createdOtherSkill['id']), 'OtherSkill with given id must be in DB');
        $this->assertModelData($otherSkill, $createdOtherSkill);
    }

    /**
     * @test read
     */
    public function test_read_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->create();

        $dbOtherSkill = $this->otherSkillRepo->find($otherSkill->id);

        $dbOtherSkill = $dbOtherSkill->toArray();
        $this->assertModelData($otherSkill->toArray(), $dbOtherSkill);
    }

    /**
     * @test update
     */
    public function test_update_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->create();
        $fakeOtherSkill = factory(OtherSkill::class)->make()->toArray();

        $updatedOtherSkill = $this->otherSkillRepo->update($fakeOtherSkill, $otherSkill->id);

        $this->assertModelData($fakeOtherSkill, $updatedOtherSkill->toArray());
        $dbOtherSkill = $this->otherSkillRepo->find($otherSkill->id);
        $this->assertModelData($fakeOtherSkill, $dbOtherSkill->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->create();

        $resp = $this->otherSkillRepo->delete($otherSkill->id);

        $this->assertTrue($resp);
        $this->assertNull(OtherSkill::find($otherSkill->id), 'OtherSkill should not exist in DB');
    }
}
