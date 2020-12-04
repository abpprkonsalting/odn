<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LicenseEndorsement;

class LicenseEndorsementApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/license_endorsements', $licenseEndorsement
        );

        $this->assertApiResponse($licenseEndorsement);
    }

    /**
     * @test
     */
    public function test_read_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/license_endorsements/'.$licenseEndorsement->id
        );

        $this->assertApiResponse($licenseEndorsement->toArray());
    }

    /**
     * @test
     */
    public function test_update_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->create();
        $editedLicenseEndorsement = factory(LicenseEndorsement::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/license_endorsements/'.$licenseEndorsement->id,
            $editedLicenseEndorsement
        );

        $this->assertApiResponse($editedLicenseEndorsement);
    }

    /**
     * @test
     */
    public function test_delete_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/license_endorsements/'.$licenseEndorsement->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/license_endorsements/'.$licenseEndorsement->id
        );

        $this->response->assertStatus(404);
    }
}
