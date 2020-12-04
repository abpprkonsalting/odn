<?php namespace Tests\Repositories;

use App\Models\LicenseEndorsementName;
use App\Repositories\LicenseEndorsementNameRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LicenseEndorsementNameRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LicenseEndorsementNameRepository
     */
    protected $licenseEndorsementNameRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->licenseEndorsementNameRepo = \App::make(LicenseEndorsementNameRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->make()->toArray();

        $createdLicenseEndorsementName = $this->licenseEndorsementNameRepo->create($licenseEndorsementName);

        $createdLicenseEndorsementName = $createdLicenseEndorsementName->toArray();
        $this->assertArrayHasKey('id', $createdLicenseEndorsementName);
        $this->assertNotNull($createdLicenseEndorsementName['id'], 'Created LicenseEndorsementName must have id specified');
        $this->assertNotNull(LicenseEndorsementName::find($createdLicenseEndorsementName['id']), 'LicenseEndorsementName with given id must be in DB');
        $this->assertModelData($licenseEndorsementName, $createdLicenseEndorsementName);
    }

    /**
     * @test read
     */
    public function test_read_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->create();

        $dbLicenseEndorsementName = $this->licenseEndorsementNameRepo->find($licenseEndorsementName->id);

        $dbLicenseEndorsementName = $dbLicenseEndorsementName->toArray();
        $this->assertModelData($licenseEndorsementName->toArray(), $dbLicenseEndorsementName);
    }

    /**
     * @test update
     */
    public function test_update_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->create();
        $fakeLicenseEndorsementName = factory(LicenseEndorsementName::class)->make()->toArray();

        $updatedLicenseEndorsementName = $this->licenseEndorsementNameRepo->update($fakeLicenseEndorsementName, $licenseEndorsementName->id);

        $this->assertModelData($fakeLicenseEndorsementName, $updatedLicenseEndorsementName->toArray());
        $dbLicenseEndorsementName = $this->licenseEndorsementNameRepo->find($licenseEndorsementName->id);
        $this->assertModelData($fakeLicenseEndorsementName, $dbLicenseEndorsementName->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_license_endorsement_name()
    {
        $licenseEndorsementName = factory(LicenseEndorsementName::class)->create();

        $resp = $this->licenseEndorsementNameRepo->delete($licenseEndorsementName->id);

        $this->assertTrue($resp);
        $this->assertNull(LicenseEndorsementName::find($licenseEndorsementName->id), 'LicenseEndorsementName should not exist in DB');
    }
}
