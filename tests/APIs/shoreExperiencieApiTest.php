<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ShoreExperiencie;

class ShoreExperiencieApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shore_experiencies', $shoreExperiencie
        );

        $this->assertApiResponse($shoreExperiencie);
    }

    /**
     * @test
     */
    public function test_read_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/shore_experiencies/'.$shoreExperiencie->id
        );

        $this->assertApiResponse($shoreExperiencie->toArray());
    }

    /**
     * @test
     */
    public function test_update_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->create();
        $editedShoreExperiencie = factory(ShoreExperiencie::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shore_experiencies/'.$shoreExperiencie->id,
            $editedShoreExperiencie
        );

        $this->assertApiResponse($editedShoreExperiencie);
    }

    /**
     * @test
     */
    public function test_delete_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shore_experiencies/'.$shoreExperiencie->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shore_experiencies/'.$shoreExperiencie->id
        );

        $this->response->assertStatus(404);
    }
}
