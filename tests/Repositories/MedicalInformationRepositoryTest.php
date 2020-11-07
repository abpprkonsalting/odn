<?php namespace Tests\Repositories;

use App\Models\MedicalInformation;
use App\Repositories\MedicalInformationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MedicalInformationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MedicalInformationRepository
     */
    protected $medicalInformationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->medicalInformationRepo = \App::make(MedicalInformationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->make()->toArray();

        $createdMedicalInformation = $this->medicalInformationRepo->create($medicalInformation);

        $createdMedicalInformation = $createdMedicalInformation->toArray();
        $this->assertArrayHasKey('id', $createdMedicalInformation);
        $this->assertNotNull($createdMedicalInformation['id'], 'Created MedicalInformation must have id specified');
        $this->assertNotNull(MedicalInformation::find($createdMedicalInformation['id']), 'MedicalInformation with given id must be in DB');
        $this->assertModelData($medicalInformation, $createdMedicalInformation);
    }

    /**
     * @test read
     */
    public function test_read_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->create();

        $dbMedicalInformation = $this->medicalInformationRepo->find($medicalInformation->id);

        $dbMedicalInformation = $dbMedicalInformation->toArray();
        $this->assertModelData($medicalInformation->toArray(), $dbMedicalInformation);
    }

    /**
     * @test update
     */
    public function test_update_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->create();
        $fakeMedicalInformation = factory(MedicalInformation::class)->make()->toArray();

        $updatedMedicalInformation = $this->medicalInformationRepo->update($fakeMedicalInformation, $medicalInformation->id);

        $this->assertModelData($fakeMedicalInformation, $updatedMedicalInformation->toArray());
        $dbMedicalInformation = $this->medicalInformationRepo->find($medicalInformation->id);
        $this->assertModelData($fakeMedicalInformation, $dbMedicalInformation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_medical_information()
    {
        $medicalInformation = factory(MedicalInformation::class)->create();

        $resp = $this->medicalInformationRepo->delete($medicalInformation->id);

        $this->assertTrue($resp);
        $this->assertNull(MedicalInformation::find($medicalInformation->id), 'MedicalInformation should not exist in DB');
    }
}
