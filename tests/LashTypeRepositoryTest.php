<?php
namespace Tests;

use App;
use App\Models\LashType;
use App\Repositories\LashTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeLashTypeTrait;

class LashTypeRepositoryTest extends TestCase
{
    use MakeLashTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LashTypeRepository
     */
    protected $lashTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lashTypeRepo = App::make(LashTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLashType()
    {
        $lashType = $this->fakeLashTypeData();
        $createdLashType = $this->lashTypeRepo->create($lashType);
        $createdLashType = $createdLashType->toArray();
        $this->assertArrayHasKey('id', $createdLashType);
        $this->assertNotNull($createdLashType['id'], 'Created LashType must have id specified');
        $this->assertNotNull(LashType::find($createdLashType['id']), 'LashType with given id must be in DB');
        $this->assertModelData($lashType, $createdLashType);
    }

    /**
     * @test read
     */
    public function testReadLashType()
    {
        $lashType = $this->makeLashType();
        $dbLashType = $this->lashTypeRepo->find($lashType->id);
        $dbLashType = $dbLashType->toArray();
        $this->assertModelData($lashType->toArray(), $dbLashType);
    }

    /**
     * @test update
     */
    public function testUpdateLashType()
    {
        $lashType = $this->makeLashType();
        $fakeLashType = $this->fakeLashTypeData();
        $updatedLashType = $this->lashTypeRepo->update($fakeLashType, $lashType->id);
        $this->assertModelData($fakeLashType, $updatedLashType->toArray());
        $dbLashType = $this->lashTypeRepo->find($lashType->id);
        $this->assertModelData($fakeLashType, $dbLashType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLashType()
    {
        $lashType = $this->makeLashType();
        $resp = $this->lashTypeRepo->delete($lashType->id);
        $this->assertTrue($resp);
        $this->assertNull(LashType::find($lashType->id), 'LashType should not exist in DB');
    }
}
