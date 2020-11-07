<?php namespace Tests\Repositories;

use App\Models\EyesColor;
use App\Repositories\EyesColorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EyesColorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EyesColorRepository
     */
    protected $eyesColorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->eyesColorRepo = \App::make(EyesColorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->make()->toArray();

        $createdEyesColor = $this->eyesColorRepo->create($eyesColor);

        $createdEyesColor = $createdEyesColor->toArray();
        $this->assertArrayHasKey('id', $createdEyesColor);
        $this->assertNotNull($createdEyesColor['id'], 'Created EyesColor must have id specified');
        $this->assertNotNull(EyesColor::find($createdEyesColor['id']), 'EyesColor with given id must be in DB');
        $this->assertModelData($eyesColor, $createdEyesColor);
    }

    /**
     * @test read
     */
    public function test_read_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->create();

        $dbEyesColor = $this->eyesColorRepo->find($eyesColor->id);

        $dbEyesColor = $dbEyesColor->toArray();
        $this->assertModelData($eyesColor->toArray(), $dbEyesColor);
    }

    /**
     * @test update
     */
    public function test_update_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->create();
        $fakeEyesColor = factory(EyesColor::class)->make()->toArray();

        $updatedEyesColor = $this->eyesColorRepo->update($fakeEyesColor, $eyesColor->id);

        $this->assertModelData($fakeEyesColor, $updatedEyesColor->toArray());
        $dbEyesColor = $this->eyesColorRepo->find($eyesColor->id);
        $this->assertModelData($fakeEyesColor, $dbEyesColor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_eyes_color()
    {
        $eyesColor = factory(EyesColor::class)->create();

        $resp = $this->eyesColorRepo->delete($eyesColor->id);

        $this->assertTrue($resp);
        $this->assertNull(EyesColor::find($eyesColor->id), 'EyesColor should not exist in DB');
    }
}
