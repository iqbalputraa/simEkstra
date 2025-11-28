<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoachesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoachesTable Test Case
 */
class CoachesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoachesTable
     */
    protected $Coaches;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Coaches',
        'app.Users',
        'app.Extracurriculars',
        'app.Informations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Coaches') ? [] : ['className' => CoachesTable::class];
        $this->Coaches = $this->getTableLocator()->get('Coaches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Coaches);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CoachesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CoachesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
