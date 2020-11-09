<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Province;

class ProvinceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_province()
    {
        $province = factory(Province::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/provinces', $province
        );

        $this->assertApiResponse($province);
    }

    /**
     * @test
     */
    public function test_read_province()
    {
        $province = factory(Province::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/provinces/'.$province->id
        );

        $this->assertApiResponse($province->toArray());
    }

    /**
     * @test
     */
    public function test_update_province()
    {
        $province = factory(Province::class)->create();
        $editedProvince = factory(Province::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/provinces/'.$province->id,
            $editedProvince
        );

        $this->assertApiResponse($editedProvince);
    }

    /**
     * @test
     */
    public function test_delete_province()
    {
        $province = factory(Province::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/provinces/'.$province->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/provinces/'.$province->id
        );

        $this->response->assertStatus(404);
    }
}
