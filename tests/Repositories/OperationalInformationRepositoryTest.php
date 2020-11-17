<?php namespace Tests\Repositories;

use App\Models\OperationalInformation;
use App\Repositories\OperationalInformationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OperationalInformationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OperationalInformationRepository
     */
    protected $operationalInformationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->operationalInformationRepo = \App::make(OperationalInformationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->make()->toArray();

        $createdOperationalInformation = $this->operationalInformationRepo->create($operationalInformation);

        $createdOperationalInformation = $createdOperationalInformation->toArray();
        $this->assertArrayHasKey('id', $createdOperationalInformation);
        $this->assertNotNull($createdOperationalInformation['id'], 'Created OperationalInformation must have id specified');
        $this->assertNotNull(OperationalInformation::find($createdOperationalInformation['id']), 'OperationalInformation with given id must be in DB');
        $this->assertModelData($operationalInformation, $createdOperationalInformation);
    }

    /**
     * @test read
     */
    public function test_read_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->create();

        $dbOperationalInformation = $this->operationalInformationRepo->find($operationalInformation->id);

        $dbOperationalInformation = $dbOperationalInformation->toArray();
        $this->assertModelData($operationalInformation->toArray(), $dbOperationalInformation);
    }

    /**
     * @test update
     */
    public function test_update_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->create();
        $fakeOperationalInformation = factory(OperationalInformation::class)->make()->toArray();

        $updatedOperationalInformation = $this->operationalInformationRepo->update($fakeOperationalInformation, $operationalInformation->id);

        $this->assertModelData($fakeOperationalInformation, $updatedOperationalInformation->toArray());
        $dbOperationalInformation = $this->operationalInformationRepo->find($operationalInformation->id);
        $this->assertModelData($fakeOperationalInformation, $dbOperationalInformation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_operational_information()
    {
        $operationalInformation = factory(OperationalInformation::class)->create();

        $resp = $this->operationalInformationRepo->delete($operationalInformation->id);

        $this->assertTrue($resp);
        $this->assertNull(OperationalInformation::find($operationalInformation->id), 'OperationalInformation should not exist in DB');
    }
}
