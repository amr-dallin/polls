<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PollQuestion Entity
 *
 * @property int $id
 * @property int $poll_respondent_id
 * @property int $question_number
 * @property bool $answer
 *
 * @property \App\Model\Entity\PollRespondent $poll_respondent
 */
class PollQuestion extends Entity
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
        'poll_respondent_id' => true,
        'question_number' => true,
        'answer' => true,
        'poll_respondent' => true,
    ];
}
