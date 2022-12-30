<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PollsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PollsTable Test Case
 */
class PollsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PollsTable
     */
    protected $Polls;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Polls',
        'app.PollRespondents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Polls') ? [] : ['className' => PollsTable::class];
        $this->Polls = $this->getTableLocator()->get('Polls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Polls);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PollsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
