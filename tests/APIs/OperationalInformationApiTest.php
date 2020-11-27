<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OperationalInformation;

class OperationalInformationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/operational_informations', $operationalInformation
        );

        $this->assertApiResponse($operationalInformation);
    }

    /**
     * @test
     */
    public function test_read_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/operational_informations/'.$operationalInformation->id
        );

        $this->assertApiResponse($operationalInformation->toArray());
    }

    /**
     * @test
     */
    public function test_update_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->create();
        $editedOperationalInformation = factory(OperationalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/operational_informations/'.$operationalInformation->id,
            $editedOperationalInformation
        );

        $this->assertApiResponse($editedOperationalInformation);
    }

    /**
     * @test
     */
    public function test_delete_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/operational_informations/'.$operationalInformation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/operational_informations/'.$operationalInformation->id
        );

        $this->response->assertStatus(404);
    }
}
