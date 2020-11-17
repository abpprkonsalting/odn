<?php namespace Tests\Repositories;

use App\Models\Memo;
use App\Repositories\MemoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MemoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MemoRepository
     */
    protected $memoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->memoRepo = \App::make(MemoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_memo()
    {
        $memo = factory(Memo::class)->make()->toArray();

        $createdMemo = $this->memoRepo->create($memo);

        $createdMemo = $createdMemo->toArray();
        $this->assertArrayHasKey('id', $createdMemo);
        $this->assertNotNull($createdMemo['id'], 'Created Memo must have id specified');
        $this->assertNotNull(Memo::find($createdMemo['id']), 'Memo with given id must be in DB');
        $this->assertModelData($memo, $createdMemo);
    }

    /**
     * @test read
     */
    public function test_read_memo()
    {
        $memo = factory(Memo::class)->create();

        $dbMemo = $this->memoRepo->find($memo->id);

        $dbMemo = $dbMemo->toArray();
        $this->assertModelData($memo->toArray(), $dbMemo);
    }

    /**
     * @test update
     */
    public function test_update_memo()
    {
        $memo = factory(Memo::class)->create();
        $fakeMemo = factory(Memo::class)->make()->toArray();

        $updatedMemo = $this->memoRepo->update($fakeMemo, $memo->id);

        $this->assertModelData($fakeMemo, $updatedMemo->toArray());
        $dbMemo = $this->memoRepo->find($memo->id);
        $this->assertModelData($fakeMemo, $dbMemo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_memo()
    {
        $memo = factory(Memo::class)->create();

        $resp = $this->memoRepo->delete($memo->id);

        $this->assertTrue($resp);
        $this->assertNull(Memo::find($memo->id), 'Memo should not exist in DB');
    }
}
