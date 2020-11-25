<?php namespace Tests\Repositories;

use App\Models\SkinColor;
use App\Repositories\SkinColorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SkinColorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SkinColorRepository
     */
    protected $skinColorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->skinColorRepo = \App::make(SkinColorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_skin_color()
    {
        $skinColor = factory(SkinColor::class)->make()->toArray();

        $createdSkinColor = $this->skinColorRepo->create($skinColor);

        $createdSkinColor = $createdSkinColor->toArray();
        $this->assertArrayHasKey('id', $createdSkinColor);
        $this->assertNotNull($createdSkinColor['id'], 'Created SkinColor must have id specified');
        $this->assertNotNull(SkinColor::find($createdSkinColor['id']), 'SkinColor with given id must be in DB');
        $this->assertModelData($skinColor, $createdSkinColor);
    }

    /**
     * @test read
     */
    public function test_read_skin_color()
    {
        $skinColor = factory(SkinColor::class)->create();

        $dbSkinColor = $this->skinColorRepo->find($skinColor->id);

        $dbSkinColor = $dbSkinColor->toArray();
        $this->assertModelData($skinColor->toArray(), $dbSkinColor);
    }

    /**
     * @test update
     */
    public function test_update_skin_color()
    {
        $skinColor = factory(SkinColor::class)->create();
        $fakeSkinColor = factory(SkinColor::class)->make()->toArray();

        $updatedSkinColor = $this->skinColorRepo->update($fakeSkinColor, $skinColor->id);

        $this->assertModelData($fakeSkinColor, $updatedSkinColor->toArray());
        $dbSkinColor = $this->skinColorRepo->find($skinColor->id);
        $this->assertModelData($fakeSkinColor, $dbSkinColor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_skin_color()
    {
        $skinColor = factory(SkinColor::class)->create();

        $resp = $this->skinColorRepo->delete($skinColor->id);

        $this->assertTrue($resp);
        $this->assertNull(SkinColor::find($skinColor->id), 'SkinColor should not exist in DB');
    }
}
