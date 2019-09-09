<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LinhasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LinhasTable Test Case
 */
class LinhasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LinhasTable
     */
    public $Linhas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Linhas',
        'app.Checklists',
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
        $config = TableRegistry::getTableLocator()->exists('Linhas') ? [] : ['className' => LinhasTable::class];
        $this->Linhas = TableRegistry::getTableLocator()->get('Linhas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Linhas);

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
