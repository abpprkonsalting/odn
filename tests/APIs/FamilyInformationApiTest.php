<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FamilyInformation;

class FamilyInformationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/family_informations', $familyInformation
        );

        $this->assertApiResponse($familyInformation);
    }

    /**
     * @test
     */
    public function test_read_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/family_informations/'.$familyInformation->id
        );

        $this->assertApiResponse($familyInformation->toArray());
    }

    /**
     * @test
     */
    public function test_update_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->create();
        $editedFamilyInformation = factory(FamilyInformation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/family_informations/'.$familyInformation->id,
            $editedFamilyInformation
        );

        $this->assertApiResponse($editedFamilyInformation);
    }

    /**
     * @test
     */
    public function test_delete_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/family_informations/'.$familyInformation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/family_informations/'.$familyInformation->id
        );

        $this->response->assertStatus(404);
    }
}
