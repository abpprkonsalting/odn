<?php namespace Tests\Repositories;

use App\Models\FamilyInformation;
use App\Repositories\FamilyInformationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FamilyInformationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FamilyInformationRepository
     */
    protected $familyInformationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->familyInformationRepo = \App::make(FamilyInformationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->make()->toArray();

        $createdFamilyInformation = $this->familyInformationRepo->create($familyInformation);

        $createdFamilyInformation = $createdFamilyInformation->toArray();
        $this->assertArrayHasKey('id', $createdFamilyInformation);
        $this->assertNotNull($createdFamilyInformation['id'], 'Created FamilyInformation must have id specified');
        $this->assertNotNull(FamilyInformation::find($createdFamilyInformation['id']), 'FamilyInformation with given id must be in DB');
        $this->assertModelData($familyInformation, $createdFamilyInformation);
    }

    /**
     * @test read
     */
    public function test_read_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->create();

        $dbFamilyInformation = $this->familyInformationRepo->find($familyInformation->id);

        $dbFamilyInformation = $dbFamilyInformation->toArray();
        $this->assertModelData($familyInformation->toArray(), $dbFamilyInformation);
    }

    /**
     * @test update
     */
    public function test_update_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->create();
        $fakeFamilyInformation = factory(FamilyInformation::class)->make()->toArray();

        $updatedFamilyInformation = $this->familyInformationRepo->update($fakeFamilyInformation, $familyInformation->id);

        $this->assertModelData($fakeFamilyInformation, $updatedFamilyInformation->toArray());
        $dbFamilyInformation = $this->familyInformationRepo->find($familyInformation->id);
        $this->assertModelData($fakeFamilyInformation, $dbFamilyInformation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_family_information()
    {
        $familyInformation = factory(FamilyInformation::class)->create();

        $resp = $this->familyInformationRepo->delete($familyInformation->id);

        $this->assertTrue($resp);
        $this->assertNull(FamilyInformation::find($familyInformation->id), 'FamilyInformation should not exist in DB');
    }
}
