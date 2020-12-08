<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SeamanBook;

class SeamanBookApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/seaman_books', $seamanBook
        );

        $this->assertApiResponse($seamanBook);
    }

    /**
     * @test
     */
    public function test_read_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/seaman_books/'.$seamanBook->id
        );

        $this->assertApiResponse($seamanBook->toArray());
    }

    /**
     * @test
     */
    public function test_update_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->create();
        $editedSeamanBook = factory(SeamanBook::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/seaman_books/'.$seamanBook->id,
            $editedSeamanBook
        );

        $this->assertApiResponse($editedSeamanBook);
    }

    /**
     * @test
     */
    public function test_delete_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/seaman_books/'.$seamanBook->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/seaman_books/'.$seamanBook->id
        );

        $this->response->assertStatus(404);
    }
}
