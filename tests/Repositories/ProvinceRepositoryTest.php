<?php namespace Tests\Repositories;

use App\Models\Province;
use App\Repositories\ProvinceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProvinceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProvinceRepository
     */
    protected $provinceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->provinceRepo = \App::make(ProvinceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_province()
    {
        $province = factory(Province::class)->make()->toArray();

        $createdProvince = $this->provinceRepo->create($province);

        $createdProvince = $createdProvince->toArray();
        $this->assertArrayHasKey('id', $createdProvince);
        $this->assertNotNull($createdProvince['id'], 'Created Province must have id specified');
        $this->assertNotNull(Province::find($createdProvince['id']), 'Province with given id must be in DB');
        $this->assertModelData($province, $createdProvince);
    }

    /**
     * @test read
     */
    public function test_read_province()
    {
        $province = factory(Province::class)->create();

        $dbProvince = $this->provinceRepo->find($province->id);

        $dbProvince = $dbProvince->toArray();
        $this->assertModelData($province->toArray(), $dbProvince);
    }

    /**
     * @test update
     */
    public function test_update_province()
    {
        $province = factory(Province::class)->create();
        $fakeProvince = factory(Province::class)->make()->toArray();

        $updatedProvince = $this->provinceRepo->update($fakeProvince, $province->id);

        $this->assertModelData($fakeProvince, $updatedProvince->toArray());
        $dbProvince = $this->provinceRepo->find($province->id);
        $this->assertModelData($fakeProvince, $dbProvince->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_province()
    {
        $province = factory(Province::class)->create();

        $resp = $this->provinceRepo->delete($province->id);

        $this->assertTrue($resp);
        $this->assertNull(Province::find($province->id), 'Province should not exist in DB');
    }
}
