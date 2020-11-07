<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Municipality;

class MunicipalityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_municipality()
    {
        $municipality = factory(Municipality::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/municipalities', $municipality
        );

        $this->assertApiResponse($municipality);
    }

    /**
     * @test
     */
    public function test_read_municipality()
    {
        $municipality = factory(Municipality::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/municipalities/'.$municipality->id
        );

        $this->assertApiResponse($municipality->toArray());
    }

    /**
     * @test
     */
    public function test_update_municipality()
    {
        $municipality = factory(Municipality::class)->create();
        $editedMunicipality = factory(Municipality::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/municipalities/'.$municipality->id,
            $editedMunicipality
        );

        $this->assertApiResponse($editedMunicipality);
    }

    /**
     * @test
     */
    public function test_delete_municipality()
    {
        $municipality = factory(Municipality::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/municipalities/'.$municipality->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/municipalities/'.$municipality->id
        );

        $this->response->assertStatus(404);
    }
}
