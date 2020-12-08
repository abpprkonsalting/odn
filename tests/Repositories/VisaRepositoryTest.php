<?php namespace Tests\Repositories;

use App\Models\Visa;
use App\Repositories\VisaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VisaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VisaRepository
     */
    protected $visaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->visaRepo = \App::make(VisaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_visa()
    {
        $visa = factory(Visa::class)->make()->toArray();

        $createdVisa = $this->visaRepo->create($visa);

        $createdVisa = $createdVisa->toArray();
        $this->assertArrayHasKey('id', $createdVisa);
        $this->assertNotNull($createdVisa['id'], 'Created Visa must have id specified');
        $this->assertNotNull(Visa::find($createdVisa['id']), 'Visa with given id must be in DB');
        $this->assertModelData($visa, $createdVisa);
    }

    /**
     * @test read
     */
    public function test_read_visa()
    {
        $visa = factory(Visa::class)->create();

        $dbVisa = $this->visaRepo->find($visa->id);

        $dbVisa = $dbVisa->toArray();
        $this->assertModelData($visa->toArray(), $dbVisa);
    }

    /**
     * @test update
     */
    public function test_update_visa()
    {
        $visa = factory(Visa::class)->create();
        $fakeVisa = factory(Visa::class)->make()->toArray();

        $updatedVisa = $this->visaRepo->update($fakeVisa, $visa->id);

        $this->assertModelData($fakeVisa, $updatedVisa->toArray());
        $dbVisa = $this->visaRepo->find($visa->id);
        $this->assertModelData($fakeVisa, $dbVisa->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_visa()
    {
        $visa = factory(Visa::class)->create();

        $resp = $this->visaRepo->delete($visa->id);

        $this->assertTrue($resp);
        $this->assertNull(Visa::find($visa->id), 'Visa should not exist in DB');
    }
}
