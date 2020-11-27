<?php namespace Tests\Repositories;

use App\Models\PersonalInformation;
use App\Repositories\PersonalInformationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PersonalInformationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PersonalInformationRepository
     */
    protected $personalInformationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->personalInformationRepo = \App::make(PersonalInformationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->make()->toArray();

        $createdPersonalInformation = $this->personalInformationRepo->create($personalInformation);

        $createdPersonalInformation = $createdPersonalInformation->toArray();
        $this->assertArrayHasKey('id', $createdPersonalInformation);
        $this->assertNotNull($createdPersonalInformation['id'], 'Created PersonalInformation must have id specified');
        $this->assertNotNull(PersonalInformation::find($createdPersonalInformation['id']), 'PersonalInformation with given id must be in DB');
        $this->assertModelData($personalInformation, $createdPersonalInformation);
    }

    /**
     * @test read
     */
    public function test_read_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->create();

        $dbPersonalInformation = $this->personalInformationRepo->find($personalInformation->id);

        $dbPersonalInformation = $dbPersonalInformation->toArray();
        $this->assertModelData($personalInformation->toArray(), $dbPersonalInformation);
    }

    /**
     * @test update
     */
    public function test_update_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->create();
        $fakePersonalInformation = factory(PersonalInformation::class)->make()->toArray();

        $updatedPersonalInformation = $this->personalInformationRepo->update($fakePersonalInformation, $personalInformation->id);

        $this->assertModelData($fakePersonalInformation, $updatedPersonalInformation->toArray());
        $dbPersonalInformation = $this->personalInformationRepo->find($personalInformation->id);
        $this->assertModelData($fakePersonalInformation, $dbPersonalInformation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_personal_information()
    {
        $personalInformation = factory(PersonalInformation::class)->create();

        $resp = $this->personalInformationRepo->delete($personalInformation->id);

        $this->assertTrue($resp);
        $this->assertNull(PersonalInformation::find($personalInformation->id), 'PersonalInformation should not exist in DB');
    }
}
