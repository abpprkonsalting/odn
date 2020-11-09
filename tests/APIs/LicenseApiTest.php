<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\License;

class LicenseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_license()
    {
        $license = factory(License::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/licenses', $license
        );

        $this->assertApiResponse($license);
    }

    /**
     * @test
     */
    public function test_read_license()
    {
        $license = factory(License::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/licenses/'.$license->id
        );

        $this->assertApiResponse($license->toArray());
    }

    /**
     * @test
     */
    public function test_update_license()
    {
        $license = factory(License::class)->create();
        $editedLicense = factory(License::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/licenses/'.$license->id,
            $editedLicense
        );

        $this->assertApiResponse($editedLicense);
    }

    /**
     * @test
     */
    public function test_delete_license()
    {
        $license = factory(License::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/licenses/'.$license->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/licenses/'.$license->id
        );

        $this->response->assertStatus(404);
    }
}
