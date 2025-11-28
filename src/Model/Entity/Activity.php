<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity
 *
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $extracurricular_id
 *
 * @property \App\Model\Entity\Extracurricular $extracurricular
 * @property \App\Model\Entity\Image[] $images
 */
class Activity extends Entity
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
        'extracurricular_id' => true,
        'extracurricular' => true,
        'images' => true,
    ];
}
