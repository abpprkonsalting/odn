<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Passport;

class PassportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_passport()
    {
        $passport = factory(Passport::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/passports', $passport
        );

        $this->assertApiResponse($passport);
    }

    /**
     * @test
     */
    public function test_read_passport()
    {
        $passport = factory(Passport::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/passports/'.$passport->id
        );

        $this->assertApiResponse($passport->toArray());
    }

    /**
     * @test
     */
    public function test_update_passport()
    {
        $passport = factory(Passport::class)->create();
        $editedPassport = factory(Passport::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/passports/'.$passport->id,
            $editedPassport
        );

        $this->assertApiResponse($editedPassport);
    }

    /**
     * @test
     */
    public function test_delete_passport()
    {
        $passport = factory(Passport::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/passports/'.$passport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/passports/'.$passport->id
        );

        $this->response->assertStatus(404);
    }
}
