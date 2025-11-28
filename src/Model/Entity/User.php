<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $role
 * @property string $password
 * @property int $verification
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Admin[] $admins
 * @property \App\Model\Entity\Coach[] $coaches
 * @property \App\Model\Entity\Extracurricular[] $extracurriculars
 * @property \App\Model\Entity\Information[] $informations
 * @property \App\Model\Entity\Student[] $students
 */
class User extends Entity
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
        'email' => true,
        'role' => true,
        'password' => true,
        'verification' => true,
        'created' => true,
        'modified' => true,
        'admins' => true,
        'coaches' => true,
        'extracurriculars' => true,
        'informations' => true,
        'students' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
