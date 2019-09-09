<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistribuidoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistribuidoresTable Test Case
 */
class DistribuidoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DistribuidoresTable
     */
    public $Distribuidores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Distribuidores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Distribuidores') ? [] : ['className' => DistribuidoresTable::class];
        $this->Distribuidores = TableRegistry::getTableLocator()->get('Distribuidores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Distribuidores);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
