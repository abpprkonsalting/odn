<?php namespace Tests\Repositories;

use App\Models\Languages;
use App\Repositories\LanguagesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LanguagesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LanguagesRepository
     */
    protected $languagesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->languagesRepo = \App::make(LanguagesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_languages()
    {
        $languages = factory(Languages::class)->make()->toArray();

        $createdLanguages = $this->languagesRepo->create($languages);

        $createdLanguages = $createdLanguages->toArray();
        $this->assertArrayHasKey('id', $createdLanguages);
        $this->assertNotNull($createdLanguages['id'], 'Created Languages must have id specified');
        $this->assertNotNull(Languages::find($createdLanguages['id']), 'Languages with given id must be in DB');
        $this->assertModelData($languages, $createdLanguages);
    }

    /**
     * @test read
     */
    public function test_read_languages()
    {
        $languages = factory(Languages::class)->create();

        $dbLanguages = $this->languagesRepo->find($languages->id);

        $dbLanguages = $dbLanguages->toArray();
        $this->assertModelData($languages->toArray(), $dbLanguages);
    }

    /**
     * @test update
     */
    public function test_update_languages()
    {
        $languages = factory(Languages::class)->create();
        $fakeLanguages = factory(Languages::class)->make()->toArray();

        $updatedLanguages = $this->languagesRepo->update($fakeLanguages, $languages->id);

        $this->assertModelData($fakeLanguages, $updatedLanguages->toArray());
        $dbLanguages = $this->languagesRepo->find($languages->id);
        $this->assertModelData($fakeLanguages, $dbLanguages->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_languages()
    {
        $languages = factory(Languages::class)->create();

        $resp = $this->languagesRepo->delete($languages->id);

        $this->assertTrue($resp);
        $this->assertNull(Languages::find($languages->id), 'Languages should not exist in DB');
    }
}
