<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PoliticalIntegration;

class PoliticalIntegrationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/political_integrations', $politicalIntegration
        );

        $this->assertApiResponse($politicalIntegration);
    }

    /**
     * @test
     */
    public function test_read_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/political_integrations/'.$politicalIntegration->id
        );

        $this->assertApiResponse($politicalIntegration->toArray());
    }

    /**
     * @test
     */
    public function test_update_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->create();
        $editedPoliticalIntegration = factory(PoliticalIntegration::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/political_integrations/'.$politicalIntegration->id,
            $editedPoliticalIntegration
        );

        $this->assertApiResponse($editedPoliticalIntegration);
    }

    /**
     * @test
     */
    public function test_delete_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/political_integrations/'.$politicalIntegration->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/political_integrations/'.$politicalIntegration->id
        );

        $this->response->assertStatus(404);
    }
}
