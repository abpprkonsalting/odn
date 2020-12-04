<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LicenseEndorsementType;

class LicenseEndorsementTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/license_endorsement_types', $licenseEndorsementType
        );

        $this->assertApiResponse($licenseEndorsementType);
    }

    /**
     * @test
     */
    public function test_read_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/license_endorsement_types/'.$licenseEndorsementType->id
        );

        $this->assertApiResponse($licenseEndorsementType->toArray());
    }

    /**
     * @test
     */
    public function test_update_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->create();
        $editedLicenseEndorsementType = factory(LicenseEndorsementType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/license_endorsement_types/'.$licenseEndorsementType->id,
            $editedLicenseEndorsementType
        );

        $this->assertApiResponse($editedLicenseEndorsementType);
    }

    /**
     * @test
     */
    public function test_delete_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/license_endorsement_types/'.$licenseEndorsementType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/license_endorsement_types/'.$licenseEndorsementType->id
        );

        $this->response->assertStatus(404);
    }
}
