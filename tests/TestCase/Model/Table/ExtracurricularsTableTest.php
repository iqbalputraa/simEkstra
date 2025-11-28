<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtracurricularsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtracurricularsTable Test Case
 */
class ExtracurricularsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtracurricularsTable
     */
    protected $Extracurriculars;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Extracurriculars',
        'app.Users',
        'app.Coaches',
        'app.Activities',
        'app.Schedules',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Extracurriculars') ? [] : ['className' => ExtracurricularsTable::class];
        $this->Extracurriculars = $this->getTableLocator()->get('Extracurriculars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Extracurriculars);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ExtracurricularsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ExtracurricularsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
