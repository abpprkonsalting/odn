<?php namespace Tests\Repositories;

use App\Models\PersonalMedicalInformation;
use App\Repositories\PersonalMedicalInformationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PersonalMedicalInformationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PersonalMedicalInformationRepository
     */
    protected $personalMedicalInformationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->personalMedicalInformationRepo = \App::make(PersonalMedicalInformationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->make()->toArray();

        $createdPersonalMedicalInformation = $this->personalMedicalInformationRepo->create($personalMedicalInformation);

        $createdPersonalMedicalInformation = $createdPersonalMedicalInformation->toArray();
        $this->assertArrayHasKey('id', $createdPersonalMedicalInformation);
        $this->assertNotNull($createdPersonalMedicalInformation['id'], 'Created PersonalMedicalInformation must have id specified');
        $this->assertNotNull(PersonalMedicalInformation::find($createdPersonalMedicalInformation['id']), 'PersonalMedicalInformation with given id must be in DB');
        $this->assertModelData($personalMedicalInformation, $createdPersonalMedicalInformation);
    }

    /**
     * @test read
     */
    public function test_read_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->create();

        $dbPersonalMedicalInformation = $this->personalMedicalInformationRepo->find($personalMedicalInformation->id);

        $dbPersonalMedicalInformation = $dbPersonalMedicalInformation->toArray();
        $this->assertModelData($personalMedicalInformation->toArray(), $dbPersonalMedicalInformation);
    }

    /**
     * @test update
     */
    public function test_update_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->create();
        $fakePersonalMedicalInformation = factory(PersonalMedicalInformation::class)->make()->toArray();

        $updatedPersonalMedicalInformation = $this->personalMedicalInformationRepo->update($fakePersonalMedicalInformation, $personalMedicalInformation->id);

        $this->assertModelData($fakePersonalMedicalInformation, $updatedPersonalMedicalInformation->toArray());
        $dbPersonalMedicalInformation = $this->personalMedicalInformationRepo->find($personalMedicalInformation->id);
        $this->assertModelData($fakePersonalMedicalInformation, $dbPersonalMedicalInformation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_personal_medical_information()
    {
        $personalMedicalInformation = factory(PersonalMedicalInformation::class)->create();

        $resp = $this->personalMedicalInformationRepo->delete($personalMedicalInformation->id);

        $this->assertTrue($resp);
        $this->assertNull(PersonalMedicalInformation::find($personalMedicalInformation->id), 'PersonalMedicalInformation should not exist in DB');
    }
}
