<?php
namespace Tests;

use App;
use App\Models\ServiceInformation;
use App\Repositories\ServiceInformationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeServiceInformationTrait;

class ServiceInformationRepositoryTest extends TestCase
{
    use MakeServiceInformationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ServiceInformationRepository
     */
    protected $serviceInformationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->serviceInformationRepo = App::make(ServiceInformationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateServiceInformation()
    {
        $serviceInformation = $this->fakeServiceInformationData();
        $createdServiceInformation = $this->serviceInformationRepo->create($serviceInformation);
        $createdServiceInformation = $createdServiceInformation->toArray();
        $this->assertArrayHasKey('id', $createdServiceInformation);
        $this->assertNotNull($createdServiceInformation['id'], 'Created ServiceInformation must have id specified');
        $this->assertNotNull(ServiceInformation::find($createdServiceInformation['id']), 'ServiceInformation with given id must be in DB');
        $this->assertModelData($serviceInformation, $createdServiceInformation);
    }

    /**
     * @test read
     */
    public function testReadServiceInformation()
    {
        $serviceInformation = $this->makeServiceInformation();
        $dbServiceInformation = $this->serviceInformationRepo->find($serviceInformation->id);
        $dbServiceInformation = $dbServiceInformation->toArray();
        $this->assertModelData($serviceInformation->toArray(), $dbServiceInformation);
    }

    /**
     * @test update
     */
    public function testUpdateServiceInformation()
    {
        $serviceInformation = $this->makeServiceInformation();
        $fakeServiceInformation = $this->fakeServiceInformationData();
        $updatedServiceInformation = $this->serviceInformationRepo->update($fakeServiceInformation, $serviceInformation->id);
        $this->assertModelData($fakeServiceInformation, $updatedServiceInformation->toArray());
        $dbServiceInformation = $this->serviceInformationRepo->find($serviceInformation->id);
        $this->assertModelData($fakeServiceInformation, $dbServiceInformation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteServiceInformation()
    {
        $serviceInformation = $this->makeServiceInformation();
        $resp = $this->serviceInformationRepo->delete($serviceInformation->id);
        $this->assertTrue($resp);
        $this->assertNull(ServiceInformation::find($serviceInformation->id), 'ServiceInformation should not exist in DB');
    }
}
