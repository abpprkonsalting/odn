<?php namespace Tests\Repositories;

use App\Models\HairColor;
use App\Repositories\HairColorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HairColorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HairColorRepository
     */
    protected $hairColorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->hairColorRepo = \App::make(HairColorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_hair_color()
    {
        $hairColor = factory(HairColor::class)->make()->toArray();

        $createdHairColor = $this->hairColorRepo->create($hairColor);

        $createdHairColor = $createdHairColor->toArray();
        $this->assertArrayHasKey('id', $createdHairColor);
        $this->assertNotNull($createdHairColor['id'], 'Created HairColor must have id specified');
        $this->assertNotNull(HairColor::find($createdHairColor['id']), 'HairColor with given id must be in DB');
        $this->assertModelData($hairColor, $createdHairColor);
    }

    /**
     * @test read
     */
    public function test_read_hair_color()
    {
        $hairColor = factory(HairColor::class)->create();

        $dbHairColor = $this->hairColorRepo->find($hairColor->id);

        $dbHairColor = $dbHairColor->toArray();
        $this->assertModelData($hairColor->toArray(), $dbHairColor);
    }

    /**
     * @test update
     */
    public function test_update_hair_color()
    {
        $hairColor = factory(HairColor::class)->create();
        $fakeHairColor = factory(HairColor::class)->make()->toArray();

        $updatedHairColor = $this->hairColorRepo->update($fakeHairColor, $hairColor->id);

        $this->assertModelData($fakeHairColor, $updatedHairColor->toArray());
        $dbHairColor = $this->hairColorRepo->find($hairColor->id);
        $this->assertModelData($fakeHairColor, $dbHairColor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_hair_color()
    {
        $hairColor = factory(HairColor::class)->create();

        $resp = $this->hairColorRepo->delete($hairColor->id);

        $this->assertTrue($resp);
        $this->assertNull(HairColor::find($hairColor->id), 'HairColor should not exist in DB');
    }
}
