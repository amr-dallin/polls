<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PollRespondentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PollRespondentsTable Test Case
 */
class PollRespondentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PollRespondentsTable
     */
    protected $PollRespondents;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PollRespondents',
        'app.Polls',
        'app.PollQuestions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PollRespondents') ? [] : ['className' => PollRespondentsTable::class];
        $this->PollRespondents = $this->getTableLocator()->get('PollRespondents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PollRespondents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PollRespondentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PollRespondentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
