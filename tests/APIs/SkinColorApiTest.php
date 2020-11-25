<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SkinColor;

class SkinColorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_skin_color()
    {
        $skinColor = factory(SkinColor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/skin_colors', $skinColor
        );

        $this->assertApiResponse($skinColor);
    }

    /**
     * @test
     */
    public function test_read_skin_color()
    {
        $skinColor = factory(SkinColor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/skin_colors/'.$skinColor->id
        );

        $this->assertApiResponse($skinColor->toArray());
    }

    /**
     * @test
     */
    public function test_update_skin_color()
    {
        $skinColor = factory(SkinColor::class)->create();
        $editedSkinColor = factory(SkinColor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/skin_colors/'.$skinColor->id,
            $editedSkinColor
        );

        $this->assertApiResponse($editedSkinColor);
    }

    /**
     * @test
     */
    public function test_delete_skin_color()
    {
        $skinColor = factory(SkinColor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/skin_colors/'.$skinColor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/skin_colors/'.$skinColor->id
        );

        $this->response->assertStatus(404);
    }
}
