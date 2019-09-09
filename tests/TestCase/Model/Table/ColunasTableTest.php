<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColunasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColunasTable Test Case
 */
class ColunasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ColunasTable
     */
    public $Colunas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Colunas',
        'app.Checklists',
        'app.Tiporespostas',
        'app.Respostas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Colunas') ? [] : ['className' => ColunasTable::class];
        $this->Colunas = TableRegistry::getTableLocator()->get('Colunas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Colunas);

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
