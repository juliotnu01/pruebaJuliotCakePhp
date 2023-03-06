<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserCorporativo Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property int $corporativo_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenDate|null $fecha_inicio
 * @property \Cake\I18n\FrozenDate|null $fecha_fin
 *
 * @property \App\Model\Entity\Corporativo $corporativo
 * @property \App\Model\Entity\Paso[] $pasos
 */
class UserCorporativo extends Entity
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
        'nombre' => true,
        'corporativo_id' => true,
        'created' => true,
        'modified' => true,
        'fecha_inicio' => true,
        'fecha_fin' => true,
        'corporativo' => true,
        'pasos' => true,
    ];
}
