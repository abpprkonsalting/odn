<?php namespace Tests\Repositories;

use App\Models\Passport;
use App\Repositories\PassportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PassportRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PassportRepository
     */
    protected $passportRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->passportRepo = \App::make(PassportRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_passport()
    {
        $passport = factory(Passport::class)->make()->toArray();

        $createdPassport = $this->passportRepo->create($passport);

        $createdPassport = $createdPassport->toArray();
        $this->assertArrayHasKey('id', $createdPassport);
        $this->assertNotNull($createdPassport['id'], 'Created Passport must have id specified');
        $this->assertNotNull(Passport::find($createdPassport['id']), 'Passport with given id must be in DB');
        $this->assertModelData($passport, $createdPassport);
    }

    /**
     * @test read
     */
    public function test_read_passport()
    {
        $passport = factory(Passport::class)->create();

        $dbPassport = $this->passportRepo->find($passport->id);

        $dbPassport = $dbPassport->toArray();
        $this->assertModelData($passport->toArray(), $dbPassport);
    }

    /**
     * @test update
     */
    public function test_update_passport()
    {
        $passport = factory(Passport::class)->create();
        $fakePassport = factory(Passport::class)->make()->toArray();

        $updatedPassport = $this->passportRepo->update($fakePassport, $passport->id);

        $this->assertModelData($fakePassport, $updatedPassport->toArray());
        $dbPassport = $this->passportRepo->find($passport->id);
        $this->assertModelData($fakePassport, $dbPassport->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_passport()
    {
        $passport = factory(Passport::class)->create();

        $resp = $this->passportRepo->delete($passport->id);

        $this->assertTrue($resp);
        $this->assertNull(Passport::find($passport->id), 'Passport should not exist in DB');
    }
}
