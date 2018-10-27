<?php

use App\Models\PostStoryProvider;
use App\Repositories\PostStoryProviderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostStoryProviderRepositoryTest extends TestCase
{
    use MakePostStoryProviderTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PostStoryProviderRepository
     */
    protected $postStoryProviderRepo;

    public function setUp()
    {
        parent::setUp();
        $this->postStoryProviderRepo = App::make(PostStoryProviderRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePostStoryProvider()
    {
        $postStoryProvider = $this->fakePostStoryProviderData();
        $createdPostStoryProvider = $this->postStoryProviderRepo->create($postStoryProvider);
        $createdPostStoryProvider = $createdPostStoryProvider->toArray();
        $this->assertArrayHasKey('id', $createdPostStoryProvider);
        $this->assertNotNull($createdPostStoryProvider['id'], 'Created PostStoryProvider must have id specified');
        $this->assertNotNull(PostStoryProvider::find($createdPostStoryProvider['id']), 'PostStoryProvider with given id must be in DB');
        $this->assertModelData($postStoryProvider, $createdPostStoryProvider);
    }

    /**
     * @test read
     */
    public function testReadPostStoryProvider()
    {
        $postStoryProvider = $this->makePostStoryProvider();
        $dbPostStoryProvider = $this->postStoryProviderRepo->find($postStoryProvider->id);
        $dbPostStoryProvider = $dbPostStoryProvider->toArray();
        $this->assertModelData($postStoryProvider->toArray(), $dbPostStoryProvider);
    }

    /**
     * @test update
     */
    public function testUpdatePostStoryProvider()
    {
        $postStoryProvider = $this->makePostStoryProvider();
        $fakePostStoryProvider = $this->fakePostStoryProviderData();
        $updatedPostStoryProvider = $this->postStoryProviderRepo->update($fakePostStoryProvider, $postStoryProvider->id);
        $this->assertModelData($fakePostStoryProvider, $updatedPostStoryProvider->toArray());
        $dbPostStoryProvider = $this->postStoryProviderRepo->find($postStoryProvider->id);
        $this->assertModelData($fakePostStoryProvider, $dbPostStoryProvider->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePostStoryProvider()
    {
        $postStoryProvider = $this->makePostStoryProvider();
        $resp = $this->postStoryProviderRepo->delete($postStoryProvider->id);
        $this->assertTrue($resp);
        $this->assertNull(PostStoryProvider::find($postStoryProvider->id), 'PostStoryProvider should not exist in DB');
    }
}
