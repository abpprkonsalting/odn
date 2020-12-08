<?php namespace Tests\Repositories;

use App\Models\ShoreExperiencie;
use App\Repositories\ShoreExperiencieRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ShoreExperiencieRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ShoreExperiencieRepository
     */
    protected $shoreExperiencieRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shoreExperiencieRepo = \App::make(ShoreExperiencieRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->make()->toArray();

        $createdShoreExperiencie = $this->shoreExperiencieRepo->create($shoreExperiencie);

        $createdShoreExperiencie = $createdShoreExperiencie->toArray();
        $this->assertArrayHasKey('id', $createdShoreExperiencie);
        $this->assertNotNull($createdShoreExperiencie['id'], 'Created ShoreExperiencie must have id specified');
        $this->assertNotNull(ShoreExperiencie::find($createdShoreExperiencie['id']), 'ShoreExperiencie with given id must be in DB');
        $this->assertModelData($shoreExperiencie, $createdShoreExperiencie);
    }

    /**
     * @test read
     */
    public function test_read_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->create();

        $dbShoreExperiencie = $this->shoreExperiencieRepo->find($shoreExperiencie->id);

        $dbShoreExperiencie = $dbShoreExperiencie->toArray();
        $this->assertModelData($shoreExperiencie->toArray(), $dbShoreExperiencie);
    }

    /**
     * @test update
     */
    public function test_update_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->create();
        $fakeShoreExperiencie = factory(ShoreExperiencie::class)->make()->toArray();

        $updatedShoreExperiencie = $this->shoreExperiencieRepo->update($fakeShoreExperiencie, $shoreExperiencie->id);

        $this->assertModelData($fakeShoreExperiencie, $updatedShoreExperiencie->toArray());
        $dbShoreExperiencie = $this->shoreExperiencieRepo->find($shoreExperiencie->id);
        $this->assertModelData($fakeShoreExperiencie, $dbShoreExperiencie->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shore_experiencie()
    {
        $shoreExperiencie = factory(ShoreExperiencie::class)->create();

        $resp = $this->shoreExperiencieRepo->delete($shoreExperiencie->id);

        $this->assertTrue($resp);
        $this->assertNull(ShoreExperiencie::find($shoreExperiencie->id), 'ShoreExperiencie should not exist in DB');
    }
}
