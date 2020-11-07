<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MedicalInformation;

class MedicalInformationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/medical_informations', $medicalInformation
        );

        $this->assertApiResponse($medicalInformation);
    }

    /**
     * @test
     */
    public function test_read_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/medical_informations/'.$medicalInformation->id
        );

        $this->assertApiResponse($medicalInformation->toArray());
    }

    /**
     * @test
     */
    public function test_update_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->create();
        $editedMedicalInformation = factory(MedicalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/medical_informations/'.$medicalInformation->id,
            $editedMedicalInformation
        );

        $this->assertApiResponse($editedMedicalInformation);
    }

    /**
     * @test
     */
    public function test_delete_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/medical_informations/'.$medicalInformation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/medical_informations/'.$medicalInformation->id
        );

        $this->response->assertStatus(404);
    }
}
