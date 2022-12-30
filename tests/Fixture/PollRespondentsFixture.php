<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PollRespondentsFixture
 */
class PollRespondentsFixture extends TestFixture
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
                'poll_id' => 1,
                'full_name' => 'Lorem ipsum dolor sit amet',
                'gender' => 1,
                'date_of_birth' => '2022-10-23',
                'year_of_admission' => 'Lorem ipsum dolor sit amet',
                'faculty' => 'Lo',
                'language' => 'Lo',
                'group_symbol' => 'L',
            ],
        ];
        parent::init();
    }
}
