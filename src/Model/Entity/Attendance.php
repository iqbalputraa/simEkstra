<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendance Entity
 *
 * @property int $id
 * @property string $status
 * @property \Cake\I18n\Date $date
 * @property string $note
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $schedule_id
 * @property int $users_d
 *
 * @property \App\Model\Entity\Schedule $schedule
 */
class Attendance extends Entity
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
    protected array $_accessible = [
        'status' => true,
        'date' => true,
        'note' => true,
        'created' => true,
        'modified' => true,
        'schedule_id' => true,
        'users_d' => true,
        'schedule' => true,
    ];
}
