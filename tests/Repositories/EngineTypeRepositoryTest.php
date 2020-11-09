<?php namespace Tests\Repositories;

use App\Models\EngineType;
use App\Repositories\EngineTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EngineTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EngineTypeRepository
     */
    protected $engineTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->engineTypeRepo = \App::make(EngineTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_engine_type()
    {
        $engineType = factory(EngineType::class)->make()->toArray();

        $createdEngineType = $this->engineTypeRepo->create($engineType);

        $createdEngineType = $createdEngineType->toArray();
        $this->assertArrayHasKey('id', $createdEngineType);
        $this->assertNotNull($createdEngineType['id'], 'Created EngineType must have id specified');
        $this->assertNotNull(EngineType::find($createdEngineType['id']), 'EngineType with given id must be in DB');
        $this->assertModelData($engineType, $createdEngineType);
    }

    /**
     * @test read
     */
    public function test_read_engine_type()
    {
        $engineType = factory(EngineType::class)->create();

        $dbEngineType = $this->engineTypeRepo->find($engineType->id);

        $dbEngineType = $dbEngineType->toArray();
        $this->assertModelData($engineType->toArray(), $dbEngineType);
    }

    /**
     * @test update
     */
    public function test_update_engine_type()
    {
        $engineType = factory(EngineType::class)->create();
        $fakeEngineType = factory(EngineType::class)->make()->toArray();

        $updatedEngineType = $this->engineTypeRepo->update($fakeEngineType, $engineType->id);

        $this->assertModelData($fakeEngineType, $updatedEngineType->toArray());
        $dbEngineType = $this->engineTypeRepo->find($engineType->id);
        $this->assertModelData($fakeEngineType, $dbEngineType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_engine_type()
    {
        $engineType = factory(EngineType::class)->create();

        $resp = $this->engineTypeRepo->delete($engineType->id);

        $this->assertTrue($resp);
        $this->assertNull(EngineType::find($engineType->id), 'EngineType should not exist in DB');
    }
}
