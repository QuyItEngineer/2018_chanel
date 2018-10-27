<?php
namespace Tests;

use App;
use App\Models\LashStyle;
use App\Repositories\LashStyleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeLashStyleTrait;

class LashStyleRepositoryTest extends TestCase
{
    use MakeLashStyleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LashStyleRepository
     */
    protected $lashStyleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lashStyleRepo = App::make(LashStyleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLashStyle()
    {
        $lashStyle = $this->fakeLashStyleData();
        $createdLashStyle = $this->lashStyleRepo->create($lashStyle);
        $createdLashStyle = $createdLashStyle->toArray();
        $this->assertArrayHasKey('id', $createdLashStyle);
        $this->assertNotNull($createdLashStyle['id'], 'Created LashStyle must have id specified');
        $this->assertNotNull(LashStyle::find($createdLashStyle['id']), 'LashStyle with given id must be in DB');
        $this->assertModelData($lashStyle, $createdLashStyle);
    }

    /**
     * @test read
     */
    public function testReadLashStyle()
    {
        $lashStyle = $this->makeLashStyle();
        $dbLashStyle = $this->lashStyleRepo->find($lashStyle->id);
        $dbLashStyle = $dbLashStyle->toArray();
        $this->assertModelData($lashStyle->toArray(), $dbLashStyle);
    }

    /**
     * @test update
     */
    public function testUpdateLashStyle()
    {
        $lashStyle = $this->makeLashStyle();
        $fakeLashStyle = $this->fakeLashStyleData();
        $updatedLashStyle = $this->lashStyleRepo->update($fakeLashStyle, $lashStyle->id);
        $this->assertModelData($fakeLashStyle, $updatedLashStyle->toArray());
        $dbLashStyle = $this->lashStyleRepo->find($lashStyle->id);
        $this->assertModelData($fakeLashStyle, $dbLashStyle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLashStyle()
    {
        $lashStyle = $this->makeLashStyle();
        $resp = $this->lashStyleRepo->delete($lashStyle->id);
        $this->assertTrue($resp);
        $this->assertNull(LashStyle::find($lashStyle->id), 'LashStyle should not exist in DB');
    }
}
