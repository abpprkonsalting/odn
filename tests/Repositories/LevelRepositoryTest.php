<?php namespace Tests\Repositories;

use App\Models\Level;
use App\Repositories\LevelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LevelRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LevelRepository
     */
    protected $levelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->levelRepo = \App::make(LevelRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_level()
    {
        $level = factory(Level::class)->make()->toArray();

        $createdLevel = $this->levelRepo->create($level);

        $createdLevel = $createdLevel->toArray();
        $this->assertArrayHasKey('id', $createdLevel);
        $this->assertNotNull($createdLevel['id'], 'Created Level must have id specified');
        $this->assertNotNull(Level::find($createdLevel['id']), 'Level with given id must be in DB');
        $this->assertModelData($level, $createdLevel);
    }

    /**
     * @test read
     */
    public function test_read_level()
    {
        $level = factory(Level::class)->create();

        $dbLevel = $this->levelRepo->find($level->id);

        $dbLevel = $dbLevel->toArray();
        $this->assertModelData($level->toArray(), $dbLevel);
    }

    /**
     * @test update
     */
    public function test_update_level()
    {
        $level = factory(Level::class)->create();
        $fakeLevel = factory(Level::class)->make()->toArray();

        $updatedLevel = $this->levelRepo->update($fakeLevel, $level->id);

        $this->assertModelData($fakeLevel, $updatedLevel->toArray());
        $dbLevel = $this->levelRepo->find($level->id);
        $this->assertModelData($fakeLevel, $dbLevel->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_level()
    {
        $level = factory(Level::class)->create();

        $resp = $this->levelRepo->delete($level->id);

        $this->assertTrue($resp);
        $this->assertNull(Level::find($level->id), 'Level should not exist in DB');
    }
}
