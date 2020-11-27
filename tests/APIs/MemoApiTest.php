<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Memo;

class MemoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_memo()
    {
        $memo = factory(Memo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/memos', $memo
        );

        $this->assertApiResponse($memo);
    }

    /**
     * @test
     */
    public function test_read_memo()
    {
        $memo = factory(Memo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/memos/'.$memo->id
        );

        $this->assertApiResponse($memo->toArray());
    }

    /**
     * @test
     */
    public function test_update_memo()
    {
        $memo = factory(Memo::class)->create();
        $editedMemo = factory(Memo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/memos/'.$memo->id,
            $editedMemo
        );

        $this->assertApiResponse($editedMemo);
    }

    /**
     * @test
     */
    public function test_delete_memo()
    {
        $memo = factory(Memo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/memos/'.$memo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/memos/'.$memo->id
        );

        $this->response->assertStatus(404);
    }
}
