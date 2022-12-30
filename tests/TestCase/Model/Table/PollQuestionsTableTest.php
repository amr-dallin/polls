<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PollQuestionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PollQuestionsTable Test Case
 */
class PollQuestionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PollQuestionsTable
     */
    protected $PollQuestions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PollQuestions',
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
        $config = $this->getTableLocator()->exists('PollQuestions') ? [] : ['className' => PollQuestionsTable::class];
        $this->PollQuestions = $this->getTableLocator()->get('PollQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PollQuestions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PollQuestionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PollQuestionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
