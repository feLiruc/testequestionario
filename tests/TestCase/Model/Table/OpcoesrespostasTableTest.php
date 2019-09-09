<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpcoesrespostasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpcoesrespostasTable Test Case
 */
class OpcoesrespostasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OpcoesrespostasTable
     */
    public $Opcoesrespostas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Opcoesrespostas',
        'app.Tiporespostas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Opcoesrespostas') ? [] : ['className' => OpcoesrespostasTable::class];
        $this->Opcoesrespostas = TableRegistry::getTableLocator()->get('Opcoesrespostas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Opcoesrespostas);

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
