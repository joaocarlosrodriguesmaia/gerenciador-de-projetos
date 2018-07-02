<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SprintsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SprintsTable Test Case
 */
class SprintsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SprintsTable
     */
    public $Sprints;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sprints',
        'app.projects',
        'app.activities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sprints') ? [] : ['className' => SprintsTable::class];
        $this->Sprints = TableRegistry::getTableLocator()->get('Sprints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sprints);

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
