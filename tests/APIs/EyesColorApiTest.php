<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EyesColor;

class EyesColorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/eyes_colors', $eyesColor
        );

        $this->assertApiResponse($eyesColor);
    }

    /**
     * @test
     */
    public function test_read_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/eyes_colors/'.$eyesColor->id
        );

        $this->assertApiResponse($eyesColor->toArray());
    }

    /**
     * @test
     */
    public function test_update_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->create();
        $editedEyesColor = factory(EyesColor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/eyes_colors/'.$eyesColor->id,
            $editedEyesColor
        );

        $this->assertApiResponse($editedEyesColor);
    }

    /**
     * @test
     */
    public function test_delete_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/eyes_colors/'.$eyesColor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/eyes_colors/'.$eyesColor->id
        );

        $this->response->assertStatus(404);
    }
}
