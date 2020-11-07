<?php namespace Tests\Repositories;

use App\Models\License;
use App\Repositories\LicenseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LicenseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LicenseRepository
     */
    protected $licenseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->licenseRepo = \App::make(LicenseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_license()
    {
        $license = factory(License::class)->make()->toArray();

        $createdLicense = $this->licenseRepo->create($license);

        $createdLicense = $createdLicense->toArray();
        $this->assertArrayHasKey('id', $createdLicense);
        $this->assertNotNull($createdLicense['id'], 'Created License must have id specified');
        $this->assertNotNull(License::find($createdLicense['id']), 'License with given id must be in DB');
        $this->assertModelData($license, $createdLicense);
    }

    /**
     * @test read
     */
    public function test_read_license()
    {
        $license = factory(License::class)->create();

        $dbLicense = $this->licenseRepo->find($license->id);

        $dbLicense = $dbLicense->toArray();
        $this->assertModelData($license->toArray(), $dbLicense);
    }

    /**
     * @test update
     */
    public function test_update_license()
    {
        $license = factory(License::class)->create();
        $fakeLicense = factory(License::class)->make()->toArray();

        $updatedLicense = $this->licenseRepo->update($fakeLicense, $license->id);

        $this->assertModelData($fakeLicense, $updatedLicense->toArray());
        $dbLicense = $this->licenseRepo->find($license->id);
        $this->assertModelData($fakeLicense, $dbLicense->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_license()
    {
        $license = factory(License::class)->create();

        $resp = $this->licenseRepo->delete($license->id);

        $this->assertTrue($resp);
        $this->assertNull(License::find($license->id), 'License should not exist in DB');
    }
}
