<?php namespace Tests\Repositories;

use App\Models\VisaType;
use App\Repositories\VisaTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VisaTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VisaTypeRepository
     */
    protected $visaTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->visaTypeRepo = \App::make(VisaTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_visa_type()
    {
        $visaType = factory(VisaType::class)->make()->toArray();

        $createdVisaType = $this->visaTypeRepo->create($visaType);

        $createdVisaType = $createdVisaType->toArray();
        $this->assertArrayHasKey('id', $createdVisaType);
        $this->assertNotNull($createdVisaType['id'], 'Created VisaType must have id specified');
        $this->assertNotNull(VisaType::find($createdVisaType['id']), 'VisaType with given id must be in DB');
        $this->assertModelData($visaType, $createdVisaType);
    }

    /**
     * @test read
     */
    public function test_read_visa_type()
    {
        $visaType = factory(VisaType::class)->create();

        $dbVisaType = $this->visaTypeRepo->find($visaType->id);

        $dbVisaType = $dbVisaType->toArray();
        $this->assertModelData($visaType->toArray(), $dbVisaType);
    }

    /**
     * @test update
     */
    public function test_update_visa_type()
    {
        $visaType = factory(VisaType::class)->create();
        $fakeVisaType = factory(VisaType::class)->make()->toArray();

        $updatedVisaType = $this->visaTypeRepo->update($fakeVisaType, $visaType->id);

        $this->assertModelData($fakeVisaType, $updatedVisaType->toArray());
        $dbVisaType = $this->visaTypeRepo->find($visaType->id);
        $this->assertModelData($fakeVisaType, $dbVisaType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_visa_type()
    {
        $visaType = factory(VisaType::class)->create();

        $resp = $this->visaTypeRepo->delete($visaType->id);

        $this->assertTrue($resp);
        $this->assertNull(VisaType::find($visaType->id), 'VisaType should not exist in DB');
    }
}
