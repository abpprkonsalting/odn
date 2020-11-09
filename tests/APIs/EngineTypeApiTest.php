<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EngineType;

class EngineTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_engine_type()
    {
        $engineType = factory(EngineType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/engine_types', $engineType
        );

        $this->assertApiResponse($engineType);
    }

    /**
     * @test
     */
    public function test_read_engine_type()
    {
        $engineType = factory(EngineType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/engine_types/'.$engineType->id
        );

        $this->assertApiResponse($engineType->toArray());
    }

    /**
     * @test
     */
    public function test_update_engine_type()
    {
        $engineType = factory(EngineType::class)->create();
        $editedEngineType = factory(EngineType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/engine_types/'.$engineType->id,
            $editedEngineType
        );

        $this->assertApiResponse($editedEngineType);
    }

    /**
     * @test
     */
    public function test_delete_engine_type()
    {
        $engineType = factory(EngineType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/engine_types/'.$engineType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/engine_types/'.$engineType->id
        );

        $this->response->assertStatus(404);
    }
}
