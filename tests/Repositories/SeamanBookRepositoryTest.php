<?php namespace Tests\Repositories;

use App\Models\SeamanBook;
use App\Repositories\SeamanBookRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SeamanBookRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SeamanBookRepository
     */
    protected $seamanBookRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->seamanBookRepo = \App::make(SeamanBookRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->make()->toArray();

        $createdSeamanBook = $this->seamanBookRepo->create($seamanBook);

        $createdSeamanBook = $createdSeamanBook->toArray();
        $this->assertArrayHasKey('id', $createdSeamanBook);
        $this->assertNotNull($createdSeamanBook['id'], 'Created SeamanBook must have id specified');
        $this->assertNotNull(SeamanBook::find($createdSeamanBook['id']), 'SeamanBook with given id must be in DB');
        $this->assertModelData($seamanBook, $createdSeamanBook);
    }

    /**
     * @test read
     */
    public function test_read_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->create();

        $dbSeamanBook = $this->seamanBookRepo->find($seamanBook->id);

        $dbSeamanBook = $dbSeamanBook->toArray();
        $this->assertModelData($seamanBook->toArray(), $dbSeamanBook);
    }

    /**
     * @test update
     */
    public function test_update_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->create();
        $fakeSeamanBook = factory(SeamanBook::class)->make()->toArray();

        $updatedSeamanBook = $this->seamanBookRepo->update($fakeSeamanBook, $seamanBook->id);

        $this->assertModelData($fakeSeamanBook, $updatedSeamanBook->toArray());
        $dbSeamanBook = $this->seamanBookRepo->find($seamanBook->id);
        $this->assertModelData($fakeSeamanBook, $dbSeamanBook->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_seaman_book()
    {
        $seamanBook = factory(SeamanBook::class)->create();

        $resp = $this->seamanBookRepo->delete($seamanBook->id);

        $this->assertTrue($resp);
        $this->assertNull(SeamanBook::find($seamanBook->id), 'SeamanBook should not exist in DB');
    }
}
