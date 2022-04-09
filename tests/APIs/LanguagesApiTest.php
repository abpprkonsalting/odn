<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Language;

class LanguagesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_languages()
    {
        $languages = factory(Language::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/languages', $languages
        );

        $this->assertApiResponse($languages);
    }

    /**
     * @test
     */
    public function test_read_languages()
    {
        $languages = factory(Language::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/languages/'.$languages->id
        );

        $this->assertApiResponse($languages->toArray());
    }

    /**
     * @test
     */
    public function test_update_languages()
    {
        $languages = factory(Language::class)->create();
        $editedLanguages = factory(Language::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/languages/'.$languages->id,
            $editedLanguages
        );

        $this->assertApiResponse($editedLanguages);
    }

    /**
     * @test
     */
    public function test_delete_languages()
    {
        $languages = factory(Language::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/languages/'.$languages->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/languages/'.$languages->id
        );

        $this->response->assertStatus(404);
    }
}
