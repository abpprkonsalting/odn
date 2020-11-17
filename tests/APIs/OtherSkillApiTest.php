<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OtherSkill;

class OtherSkillApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/other_skills', $otherSkill
        );

        $this->assertApiResponse($otherSkill);
    }

    /**
     * @test
     */
    public function test_read_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/other_skills/'.$otherSkill->id
        );

        $this->assertApiResponse($otherSkill->toArray());
    }

    /**
     * @test
     */
    public function test_update_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->create();
        $editedOtherSkill = factory(OtherSkill::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/other_skills/'.$otherSkill->id,
            $editedOtherSkill
        );

        $this->assertApiResponse($editedOtherSkill);
    }

    /**
     * @test
     */
    public function test_delete_other_skill()
    {
        $otherSkill = factory(OtherSkill::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/other_skills/'.$otherSkill->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/other_skills/'.$otherSkill->id
        );

        $this->response->assertStatus(404);
    }
}
