<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FamilyStatus;

class FamilyStatusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/family_statuses', $familyStatus
        );

        $this->assertApiResponse($familyStatus);
    }

    /**
     * @test
     */
    public function test_read_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/family_statuses/'.$familyStatus->id
        );

        $this->assertApiResponse($familyStatus->toArray());
    }

    /**
     * @test
     */
    public function test_update_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->create();
        $editedFamilyStatus = factory(FamilyStatus::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/family_statuses/'.$familyStatus->id,
            $editedFamilyStatus
        );

        $this->assertApiResponse($editedFamilyStatus);
    }

    /**
     * @test
     */
    public function test_delete_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/family_statuses/'.$familyStatus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/family_statuses/'.$familyStatus->id
        );

        $this->response->assertStatus(404);
    }
}
