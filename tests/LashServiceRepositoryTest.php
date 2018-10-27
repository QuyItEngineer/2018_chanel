<?php
namespace Tests;

use App;
use App\Models\LashService;
use App\Repositories\LashServiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeLashServiceTrait;

class LashServiceRepositoryTest extends TestCase
{
    use MakeLashServiceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LashServiceRepository
     */
    protected $lashServiceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lashServiceRepo = App::make(LashServiceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLashService()
    {
        $lashService = $this->fakeLashServiceData();
        $createdLashService = $this->lashServiceRepo->create($lashService);
        $createdLashService = $createdLashService->toArray();
        $this->assertArrayHasKey('id', $createdLashService);
        $this->assertNotNull($createdLashService['id'], 'Created LashService must have id specified');
        $this->assertNotNull(LashService::find($createdLashService['id']), 'LashService with given id must be in DB');
        $this->assertModelData($lashService, $createdLashService);
    }

    /**
     * @test read
     */
    public function testReadLashService()
    {
        $lashService = $this->makeLashService();
        $dbLashService = $this->lashServiceRepo->find($lashService->id);
        $dbLashService = $dbLashService->toArray();
        $this->assertModelData($lashService->toArray(), $dbLashService);
    }

    /**
     * @test update
     */
    public function testUpdateLashService()
    {
        $lashService = $this->makeLashService();
        $fakeLashService = $this->fakeLashServiceData();
        $updatedLashService = $this->lashServiceRepo->update($fakeLashService, $lashService->id);
        $this->assertModelData($fakeLashService, $updatedLashService->toArray());
        $dbLashService = $this->lashServiceRepo->find($lashService->id);
        $this->assertModelData($fakeLashService, $dbLashService->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLashService()
    {
        $lashService = $this->makeLashService();
        $resp = $this->lashServiceRepo->delete($lashService->id);
        $this->assertTrue($resp);
        $this->assertNull(LashService::find($lashService->id), 'LashService should not exist in DB');
    }
}
