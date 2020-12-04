<?php namespace Tests\Repositories;

use App\Models\LicenseEndorsement;
use App\Repositories\LicenseEndorsementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LicenseEndorsementRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LicenseEndorsementRepository
     */
    protected $licenseEndorsementRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->licenseEndorsementRepo = \App::make(LicenseEndorsementRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->make()->toArray();

        $createdLicenseEndorsement = $this->licenseEndorsementRepo->create($licenseEndorsement);

        $createdLicenseEndorsement = $createdLicenseEndorsement->toArray();
        $this->assertArrayHasKey('id', $createdLicenseEndorsement);
        $this->assertNotNull($createdLicenseEndorsement['id'], 'Created LicenseEndorsement must have id specified');
        $this->assertNotNull(LicenseEndorsement::find($createdLicenseEndorsement['id']), 'LicenseEndorsement with given id must be in DB');
        $this->assertModelData($licenseEndorsement, $createdLicenseEndorsement);
    }

    /**
     * @test read
     */
    public function test_read_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->create();

        $dbLicenseEndorsement = $this->licenseEndorsementRepo->find($licenseEndorsement->id);

        $dbLicenseEndorsement = $dbLicenseEndorsement->toArray();
        $this->assertModelData($licenseEndorsement->toArray(), $dbLicenseEndorsement);
    }

    /**
     * @test update
     */
    public function test_update_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->create();
        $fakeLicenseEndorsement = factory(LicenseEndorsement::class)->make()->toArray();

        $updatedLicenseEndorsement = $this->licenseEndorsementRepo->update($fakeLicenseEndorsement, $licenseEndorsement->id);

        $this->assertModelData($fakeLicenseEndorsement, $updatedLicenseEndorsement->toArray());
        $dbLicenseEndorsement = $this->licenseEndorsementRepo->find($licenseEndorsement->id);
        $this->assertModelData($fakeLicenseEndorsement, $dbLicenseEndorsement->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_license_endorsement()
    {
        $licenseEndorsement = factory(LicenseEndorsement::class)->create();

        $resp = $this->licenseEndorsementRepo->delete($licenseEndorsement->id);

        $this->assertTrue($resp);
        $this->assertNull(LicenseEndorsement::find($licenseEndorsement->id), 'LicenseEndorsement should not exist in DB');
    }
}
