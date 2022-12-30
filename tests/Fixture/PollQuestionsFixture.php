<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PollQuestionsFixture
 */
class PollQuestionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'poll_respondent_id' => 1,
                'question_number' => 1,
                'answer' => 1,
            ],
        ];
        parent::init();
    }
}
