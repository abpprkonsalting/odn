<?php namespace Tests\Repositories;

use App\Models\Municipality;
use App\Repositories\MunicipalityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MunicipalityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MunicipalityRepository
     */
    protected $municipalityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->municipalityRepo = \App::make(MunicipalityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_municipality()
    {
        $municipality = factory(Municipality::class)->make()->toArray();

        $createdMunicipality = $this->municipalityRepo->create($municipality);

        $createdMunicipality = $createdMunicipality->toArray();
        $this->assertArrayHasKey('id', $createdMunicipality);
        $this->assertNotNull($createdMunicipality['id'], 'Created Municipality must have id specified');
        $this->assertNotNull(Municipality::find($createdMunicipality['id']), 'Municipality with given id must be in DB');
        $this->assertModelData($municipality, $createdMunicipality);
    }

    /**
     * @test read
     */
    public function test_read_municipality()
    {
        $municipality = factory(Municipality::class)->create();

        $dbMunicipality = $this->municipalityRepo->find($municipality->id);

        $dbMunicipality = $dbMunicipality->toArray();
        $this->assertModelData($municipality->toArray(), $dbMunicipality);
    }

    /**
     * @test update
     */
    public function test_update_municipality()
    {
        $municipality = factory(Municipality::class)->create();
        $fakeMunicipality = factory(Municipality::class)->make()->toArray();

        $updatedMunicipality = $this->municipalityRepo->update($fakeMunicipality, $municipality->id);

        $this->assertModelData($fakeMunicipality, $updatedMunicipality->toArray());
        $dbMunicipality = $this->municipalityRepo->find($municipality->id);
        $this->assertModelData($fakeMunicipality, $dbMunicipality->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_municipality()
    {
        $municipality = factory(Municipality::class)->create();

        $resp = $this->municipalityRepo->delete($municipality->id);

        $this->assertTrue($resp);
        $this->assertNull(Municipality::find($municipality->id), 'Municipality should not exist in DB');
    }
}
