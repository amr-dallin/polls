<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PollRespondent Entity
 *
 * @property int $id
 * @property int $poll_id
 * @property string $full_name
 * @property string $gender
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $year_of_admission
 * @property string $faculty
 * @property string $language
 * @property string $group_symbol
 *
 * @property \App\Model\Entity\Poll $poll
 * @property \App\Model\Entity\PollQuestion[] $poll_questions
 */
class PollRespondent extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'poll_id' => true,
        'full_name' => true,
        'gender' => true,
        'date_of_birth' => true,
        'year_of_admission' => true,
        'faculty' => true,
        'language' => true,
        'group_symbol' => true,
        'poll' => true,
        'poll_questions' => true,
    ];
}
