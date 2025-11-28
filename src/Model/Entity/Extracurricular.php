<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Extracurricular Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $desc
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $user_id
 * @property int $coach_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Coach $coach
 * @property \App\Model\Entity\Activity[] $activities
 * @property \App\Model\Entity\Schedule[] $schedules
 */
class Extracurricular extends Entity
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
        'name' => true,
        'desc' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'coach_id' => true,
        'user' => true,
        'coach' => true,
        'activities' => true,
        'schedules' => true,
    ];
}
