<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SkillOrKnowledge;

class SkillOrKnowledgeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/skill_or_knowledges', $skillOrKnowledge
        );

        $this->assertApiResponse($skillOrKnowledge);
    }

    /**
     * @test
     */
    public function test_read_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/skill_or_knowledges/'.$skillOrKnowledge->id
        );

        $this->assertApiResponse($skillOrKnowledge->toArray());
    }

    /**
     * @test
     */
    public function test_update_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->create();
        $editedSkillOrKnowledge = factory(SkillOrKnowledge::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/skill_or_knowledges/'.$skillOrKnowledge->id,
            $editedSkillOrKnowledge
        );

        $this->assertApiResponse($editedSkillOrKnowledge);
    }

    /**
     * @test
     */
    public function test_delete_skill_or_knowledge()
    {
        $skillOrKnowledge = factory(SkillOrKnowledge::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/skill_or_knowledges/'.$skillOrKnowledge->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/skill_or_knowledges/'.$skillOrKnowledge->id
        );

        $this->response->assertStatus(404);
    }
}
