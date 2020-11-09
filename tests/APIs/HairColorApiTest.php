<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\HairColor;

class HairColorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_hair_color()
    {
        $hairColor = factory(HairColor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/hair_colors', $hairColor
        );

        $this->assertApiResponse($hairColor);
    }

    /**
     * @test
     */
    public function test_read_hair_color()
    {
        $hairColor = factory(HairColor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/hair_colors/'.$hairColor->id
        );

        $this->assertApiResponse($hairColor->toArray());
    }

    /**
     * @test
     */
    public function test_update_hair_color()
    {
        $hairColor = factory(HairColor::class)->create();
        $editedHairColor = factory(HairColor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/hair_colors/'.$hairColor->id,
            $editedHairColor
        );

        $this->assertApiResponse($editedHairColor);
    }

    /**
     * @test
     */
    public function test_delete_hair_color()
    {
        $hairColor = factory(HairColor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/hair_colors/'.$hairColor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/hair_colors/'.$hairColor->id
        );

        $this->response->assertStatus(404);
    }
}
