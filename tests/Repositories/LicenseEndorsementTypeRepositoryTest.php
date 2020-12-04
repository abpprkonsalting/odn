<?php namespace Tests\Repositories;

use App\Models\LicenseEndorsementType;
use App\Repositories\LicenseEndorsementTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LicenseEndorsementTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LicenseEndorsementTypeRepository
     */
    protected $licenseEndorsementTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->licenseEndorsementTypeRepo = \App::make(LicenseEndorsementTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->make()->toArray();

        $createdLicenseEndorsementType = $this->licenseEndorsementTypeRepo->create($licenseEndorsementType);

        $createdLicenseEndorsementType = $createdLicenseEndorsementType->toArray();
        $this->assertArrayHasKey('id', $createdLicenseEndorsementType);
        $this->assertNotNull($createdLicenseEndorsementType['id'], 'Created LicenseEndorsementType must have id specified');
        $this->assertNotNull(LicenseEndorsementType::find($createdLicenseEndorsementType['id']), 'LicenseEndorsementType with given id must be in DB');
        $this->assertModelData($licenseEndorsementType, $createdLicenseEndorsementType);
    }

    /**
     * @test read
     */
    public function test_read_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->create();

        $dbLicenseEndorsementType = $this->licenseEndorsementTypeRepo->find($licenseEndorsementType->id);

        $dbLicenseEndorsementType = $dbLicenseEndorsementType->toArray();
        $this->assertModelData($licenseEndorsementType->toArray(), $dbLicenseEndorsementType);
    }

    /**
     * @test update
     */
    public function test_update_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->create();
        $fakeLicenseEndorsementType = factory(LicenseEndorsementType::class)->make()->toArray();

        $updatedLicenseEndorsementType = $this->licenseEndorsementTypeRepo->update($fakeLicenseEndorsementType, $licenseEndorsementType->id);

        $this->assertModelData($fakeLicenseEndorsementType, $updatedLicenseEndorsementType->toArray());
        $dbLicenseEndorsementType = $this->licenseEndorsementTypeRepo->find($licenseEndorsementType->id);
        $this->assertModelData($fakeLicenseEndorsementType, $dbLicenseEndorsementType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_license_endorsement_type()
    {
        $licenseEndorsementType = factory(LicenseEndorsementType::class)->create();

        $resp = $this->licenseEndorsementTypeRepo->delete($licenseEndorsementType->id);

        $this->assertTrue($resp);
        $this->assertNull(LicenseEndorsementType::find($licenseEndorsementType->id), 'LicenseEndorsementType should not exist in DB');
    }
}
