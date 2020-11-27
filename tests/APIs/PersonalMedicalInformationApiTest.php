<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PersonalMedicalInformation;

class PersonalMedicalInformationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/personal_medical_informations', $personalMedicalInformation
        );

        $this->assertApiResponse($personalMedicalInformation);
    }

    /**
     * @test
     */
    public function test_read_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/personal_medical_informations/'.$personalMedicalInformation->id
        );

        $this->assertApiResponse($personalMedicalInformation->toArray());
    }

    /**
     * @test
     */
    public function test_update_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->create();
        $editedPersonalMedicalInformation = factory(PersonalMedicalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/personal_medical_informations/'.$personalMedicalInformation->id,
            $editedPersonalMedicalInformation
        );

        $this->assertApiResponse($editedPersonalMedicalInformation);
    }

    /**
     * @test
     */
    public function test_delete_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/personal_medical_informations/'.$personalMedicalInformation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/personal_medical_informations/'.$personalMedicalInformation->id
        );

        $this->response->assertStatus(404);
    }
}
