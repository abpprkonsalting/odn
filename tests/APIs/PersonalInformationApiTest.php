<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PersonalInformation;

class PersonalInformationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/personal_informations', $personalInformation
        );

        $this->assertApiResponse($personalInformation);
    }

    /**
     * @test
     */
    public function test_read_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/personal_informations/'.$personalInformation->id
        );

        $this->assertApiResponse($personalInformation->toArray());
    }

    /**
     * @test
     */
    public function test_update_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->create();
        $editedPersonalInformation = factory(PersonalInformation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/personal_informations/'.$personalInformation->id,
            $editedPersonalInformation
        );

        $this->assertApiResponse($editedPersonalInformation);
    }

    /**
     * @test
     */
    public function test_delete_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/personal_informations/'.$personalInformation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/personal_informations/'.$personalInformation->id
        );

        $this->response->assertStatus(404);
    }
}
