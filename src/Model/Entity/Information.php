<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Information Entity
 *
 * @property int $id
 * @property int|null $coach_id
 * @property int|null $admin_id
 * @property string $title
 * @property \Cake\I18n\Date $date
 * @property string|null $information
 * @property \Cake\I18n\DateTime $created
 * @property int $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Coach $coach
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\User $user
 */
class Information extends Entity
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
        'coach_id' => true,
        'admin_id' => true,
        'title' => true,
        'date' => true,
        'information' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'coach' => true,
        'admin' => true,
        'user' => true,
    ];
}
