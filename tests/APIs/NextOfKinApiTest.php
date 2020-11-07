<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\NextOfKin;

class NextOfKinApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/next_of_kins', $nextOfKin
        );

        $this->assertApiResponse($nextOfKin);
    }

    /**
     * @test
     */
    public function test_read_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/next_of_kins/'.$nextOfKin->id
        );

        $this->assertApiResponse($nextOfKin->toArray());
    }

    /**
     * @test
     */
    public function test_update_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->create();
        $editedNextOfKin = factory(NextOfKin::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/next_of_kins/'.$nextOfKin->id,
            $editedNextOfKin
        );

        $this->assertApiResponse($editedNextOfKin);
    }

    /**
     * @test
     */
    public function test_delete_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/next_of_kins/'.$nextOfKin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/next_of_kins/'.$nextOfKin->id
        );

        $this->response->assertStatus(404);
    }
}
