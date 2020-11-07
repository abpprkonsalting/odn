<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Flag;

class FlagApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_flag()
    {
        $flag = factory(Flag::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/flags', $flag
        );

        $this->assertApiResponse($flag);
    }

    /**
     * @test
     */
    public function test_read_flag()
    {
        $flag = factory(Flag::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/flags/'.$flag->id
        );

        $this->assertApiResponse($flag->toArray());
    }

    /**
     * @test
     */
    public function test_update_flag()
    {
        $flag = factory(Flag::class)->create();
        $editedFlag = factory(Flag::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/flags/'.$flag->id,
            $editedFlag
        );

        $this->assertApiResponse($editedFlag);
    }

    /**
     * @test
     */
    public function test_delete_flag()
    {
        $flag = factory(Flag::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/flags/'.$flag->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/flags/'.$flag->id
        );

        $this->response->assertStatus(404);
    }
}
