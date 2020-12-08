<?php namespace Tests\Repositories;

use App\Models\FamilyStatus;
use App\Repositories\FamilyStatusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FamilyStatusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FamilyStatusRepository
     */
    protected $familyStatusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->familyStatusRepo = \App::make(FamilyStatusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->make()->toArray();

        $createdFamilyStatus = $this->familyStatusRepo->create($familyStatus);

        $createdFamilyStatus = $createdFamilyStatus->toArray();
        $this->assertArrayHasKey('id', $createdFamilyStatus);
        $this->assertNotNull($createdFamilyStatus['id'], 'Created FamilyStatus must have id specified');
        $this->assertNotNull(FamilyStatus::find($createdFamilyStatus['id']), 'FamilyStatus with given id must be in DB');
        $this->assertModelData($familyStatus, $createdFamilyStatus);
    }

    /**
     * @test read
     */
    public function test_read_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->create();

        $dbFamilyStatus = $this->familyStatusRepo->find($familyStatus->id);

        $dbFamilyStatus = $dbFamilyStatus->toArray();
        $this->assertModelData($familyStatus->toArray(), $dbFamilyStatus);
    }

    /**
     * @test update
     */
    public function test_update_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->create();
        $fakeFamilyStatus = factory(FamilyStatus::class)->make()->toArray();

        $updatedFamilyStatus = $this->familyStatusRepo->update($fakeFamilyStatus, $familyStatus->id);

        $this->assertModelData($fakeFamilyStatus, $updatedFamilyStatus->toArray());
        $dbFamilyStatus = $this->familyStatusRepo->find($familyStatus->id);
        $this->assertModelData($fakeFamilyStatus, $dbFamilyStatus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_family_status()
    {
        $familyStatus = factory(FamilyStatus::class)->create();

        $resp = $this->familyStatusRepo->delete($familyStatus->id);

        $this->assertTrue($resp);
        $this->assertNull(FamilyStatus::find($familyStatus->id), 'FamilyStatus should not exist in DB');
    }
}
