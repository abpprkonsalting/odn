<?php namespace Tests\Repositories;

use App\Models\SkillOrKnowledge;
use App\Repositories\SkillOrKnowledgeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SkillOrKnowledgeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SkillOrKnowledgeRepository
     */
    protected $skillOrKnowledgeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->skillOrKnowledgeRepo = \App::make(SkillOrKnowledgeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->make()->toArray();

        $createdSkillOrKnowledge = $this->skillOrKnowledgeRepo->create($skillOrKnowledge);

        $createdSkillOrKnowledge = $createdSkillOrKnowledge->toArray();
        $this->assertArrayHasKey('id', $createdSkillOrKnowledge);
        $this->assertNotNull($createdSkillOrKnowledge['id'], 'Created SkillOrKnowledge must have id specified');
        $this->assertNotNull(SkillOrKnowledge::find($createdSkillOrKnowledge['id']), 'SkillOrKnowledge with given id must be in DB');
        $this->assertModelData($skillOrKnowledge, $createdSkillOrKnowledge);
    }

    /**
     * @test read
     */
    public function test_read_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->create();

        $dbSkillOrKnowledge = $this->skillOrKnowledgeRepo->find($skillOrKnowledge->id);

        $dbSkillOrKnowledge = $dbSkillOrKnowledge->toArray();
        $this->assertModelData($skillOrKnowledge->toArray(), $dbSkillOrKnowledge);
    }

    /**
     * @test update
     */
    public function test_update_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->create();
        $fakeSkillOrKnowledge = factory(SkillOrKnowledge::class)->make()->toArray();

        $updatedSkillOrKnowledge = $this->skillOrKnowledgeRepo->update($fakeSkillOrKnowledge, $skillOrKnowledge->id);

        $this->assertModelData($fakeSkillOrKnowledge, $updatedSkillOrKnowledge->toArray());
        $dbSkillOrKnowledge = $this->skillOrKnowledgeRepo->find($skillOrKnowledge->id);
        $this->assertModelData($fakeSkillOrKnowledge, $dbSkillOrKnowledge->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->create();

        $resp = $this->skillOrKnowledgeRepo->delete($skillOrKnowledge->id);

        $this->assertTrue($resp);
        $this->assertNull(SkillOrKnowledge::find($skillOrKnowledge->id), 'SkillOrKnowledge should not exist in DB');
    }
}
