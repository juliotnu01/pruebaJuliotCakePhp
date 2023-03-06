<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paso Entity
 *
 * @property int $id
 * @property int|null $pasos
 * @property string|null $metros
 * @property int $user_corporativo_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserCorporativo $user_corporativo
 */
class Paso extends Entity
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
        'pasos' => true,
        'metros' => true,
        'user_corporativo_id' => true,
        'created' => true,
        'modified' => true,
        'user_corporativo' => true,
    ];
}
