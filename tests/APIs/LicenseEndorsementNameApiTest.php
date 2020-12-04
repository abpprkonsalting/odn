<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LicenseEndorsementName;

class LicenseEndorsementNameApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/license_endorsement_names', $licenseEndorsementName
        );

        $this->assertApiResponse($licenseEndorsementName);
    }

    /**
     * @test
     */
    public function test_read_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/license_endorsement_names/'.$licenseEndorsementName->id
        );

        $this->assertApiResponse($licenseEndorsementName->toArray());
    }

    /**
     * @test
     */
    public function test_update_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->create();
        $editedLicenseEndorsementName = factory(LicenseEndorsementName::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/license_endorsement_names/'.$licenseEndorsementName->id,
            $editedLicenseEndorsementName
        );

        $this->assertApiResponse($editedLicenseEndorsementName);
    }

    /**
     * @test
     */
    public function test_delete_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/license_endorsement_names/'.$licenseEndorsementName->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/license_endorsement_names/'.$licenseEndorsementName->id
        );

        $this->response->assertStatus(404);
    }
}
