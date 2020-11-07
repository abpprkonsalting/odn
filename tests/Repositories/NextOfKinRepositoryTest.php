<?php namespace Tests\Repositories;

use App\Models\NextOfKin;
use App\Repositories\NextOfKinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NextOfKinRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NextOfKinRepository
     */
    protected $nextOfKinRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nextOfKinRepo = \App::make(NextOfKinRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->make()->toArray();

        $createdNextOfKin = $this->nextOfKinRepo->create($nextOfKin);

        $createdNextOfKin = $createdNextOfKin->toArray();
        $this->assertArrayHasKey('id', $createdNextOfKin);
        $this->assertNotNull($createdNextOfKin['id'], 'Created NextOfKin must have id specified');
        $this->assertNotNull(NextOfKin::find($createdNextOfKin['id']), 'NextOfKin with given id must be in DB');
        $this->assertModelData($nextOfKin, $createdNextOfKin);
    }

    /**
     * @test read
     */
    public function test_read_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->create();

        $dbNextOfKin = $this->nextOfKinRepo->find($nextOfKin->id);

        $dbNextOfKin = $dbNextOfKin->toArray();
        $this->assertModelData($nextOfKin->toArray(), $dbNextOfKin);
    }

    /**
     * @test update
     */
    public function test_update_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->create();
        $fakeNextOfKin = factory(NextOfKin::class)->make()->toArray();

        $updatedNextOfKin = $this->nextOfKinRepo->update($fakeNextOfKin, $nextOfKin->id);

        $this->assertModelData($fakeNextOfKin, $updatedNextOfKin->toArray());
        $dbNextOfKin = $this->nextOfKinRepo->find($nextOfKin->id);
        $this->assertModelData($fakeNextOfKin, $dbNextOfKin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_next_of_kin()
    {
        $nextOfKin = factory(NextOfKin::class)->create();

        $resp = $this->nextOfKinRepo->delete($nextOfKin->id);

        $this->assertTrue($resp);
        $this->assertNull(NextOfKin::find($nextOfKin->id), 'NextOfKin should not exist in DB');
    }
}
