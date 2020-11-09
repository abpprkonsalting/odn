<?php namespace Tests\Repositories;

use App\Models\PoliticalIntegration;
use App\Repositories\PoliticalIntegrationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PoliticalIntegrationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PoliticalIntegrationRepository
     */
    protected $politicalIntegrationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->politicalIntegrationRepo = \App::make(PoliticalIntegrationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->make()->toArray();

        $createdPoliticalIntegration = $this->politicalIntegrationRepo->create($politicalIntegration);

        $createdPoliticalIntegration = $createdPoliticalIntegration->toArray();
        $this->assertArrayHasKey('id', $createdPoliticalIntegration);
        $this->assertNotNull($createdPoliticalIntegration['id'], 'Created PoliticalIntegration must have id specified');
        $this->assertNotNull(PoliticalIntegration::find($createdPoliticalIntegration['id']), 'PoliticalIntegration with given id must be in DB');
        $this->assertModelData($politicalIntegration, $createdPoliticalIntegration);
    }

    /**
     * @test read
     */
    public function test_read_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->create();

        $dbPoliticalIntegration = $this->politicalIntegrationRepo->find($politicalIntegration->id);

        $dbPoliticalIntegration = $dbPoliticalIntegration->toArray();
        $this->assertModelData($politicalIntegration->toArray(), $dbPoliticalIntegration);
    }

    /**
     * @test update
     */
    public function test_update_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->create();
        $fakePoliticalIntegration = factory(PoliticalIntegration::class)->make()->toArray();

        $updatedPoliticalIntegration = $this->politicalIntegrationRepo->update($fakePoliticalIntegration, $politicalIntegration->id);

        $this->assertModelData($fakePoliticalIntegration, $updatedPoliticalIntegration->toArray());
        $dbPoliticalIntegration = $this->politicalIntegrationRepo->find($politicalIntegration->id);
        $this->assertModelData($fakePoliticalIntegration, $dbPoliticalIntegration->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_political_integration()
    {
        $politicalIntegration = factory(PoliticalIntegration::class)->create();

        $resp = $this->politicalIntegrationRepo->delete($politicalIntegration->id);

        $this->assertTrue($resp);
        $this->assertNull(PoliticalIntegration::find($politicalIntegration->id), 'PoliticalIntegration should not exist in DB');
    }
}
