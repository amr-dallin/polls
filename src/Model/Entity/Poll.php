<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Poll Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date_poll
 * @property string|null $notes
 *
 * @property \App\Model\Entity\PollRespondent[] $poll_respondents
 */
class Poll extends Entity
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
        'file' => true,
        'date_poll' => true,
        'notes' => true,
        'poll_respondents' => true,
    ];
}
