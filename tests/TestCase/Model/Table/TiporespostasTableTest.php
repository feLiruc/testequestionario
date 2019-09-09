<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiporespostasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiporespostasTable Test Case
 */
class TiporespostasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TiporespostasTable
     */
    public $Tiporespostas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tiporespostas',
        'app.Colunas',
        'app.Opcoesrespostas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tiporespostas') ? [] : ['className' => TiporespostasTable::class];
        $this->Tiporespostas = TableRegistry::getTableLocator()->get('Tiporespostas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tiporespostas);

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
