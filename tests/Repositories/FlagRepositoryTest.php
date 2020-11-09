<?php namespace Tests\Repositories;

use App\Models\Flag;
use App\Repositories\FlagRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FlagRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FlagRepository
     */
    protected $flagRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->flagRepo = \App::make(FlagRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_flag()
    {
        $flag = factory(Flag::class)->make()->toArray();

        $createdFlag = $this->flagRepo->create($flag);

        $createdFlag = $createdFlag->toArray();
        $this->assertArrayHasKey('id', $createdFlag);
        $this->assertNotNull($createdFlag['id'], 'Created Flag must have id specified');
        $this->assertNotNull(Flag::find($createdFlag['id']), 'Flag with given id must be in DB');
        $this->assertModelData($flag, $createdFlag);
    }

    /**
     * @test read
     */
    public function test_read_flag()
    {
        $flag = factory(Flag::class)->create();

        $dbFlag = $this->flagRepo->find($flag->id);

        $dbFlag = $dbFlag->toArray();
        $this->assertModelData($flag->toArray(), $dbFlag);
    }

    /**
     * @test update
     */
    public function test_update_flag()
    {
        $flag = factory(Flag::class)->create();
        $fakeFlag = factory(Flag::class)->make()->toArray();

        $updatedFlag = $this->flagRepo->update($fakeFlag, $flag->id);

        $this->assertModelData($fakeFlag, $updatedFlag->toArray());
        $dbFlag = $this->flagRepo->find($flag->id);
        $this->assertModelData($fakeFlag, $dbFlag->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_flag()
    {
        $flag = factory(Flag::class)->create();

        $resp = $this->flagRepo->delete($flag->id);

        $this->assertTrue($resp);
        $this->assertNull(Flag::find($flag->id), 'Flag should not exist in DB');
    }
}
