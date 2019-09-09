<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resposta Entity
 *
 * @property int $id
 * @property int $distribuidor_id
 * @property int $checklist_id
 * @property int $coluna_id
 * @property int $linha_id
 * @property null|string $valor
 *
 * @property \App\Model\Entity\Distribuidor $distribuidor
 * @property \App\Model\Entity\Checklist $checklist
 * @property \App\Model\Entity\Coluna $coluna
 * @property \App\Model\Entity\Linha $linha
 */
class Resposta extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'distribuidor_id' => true,
        'checklist_id' => true,
        'coluna_id' => true,
        'linha_id' => true,
        'valor' => true,
        'distribuidor' => true,
        'checklist' => true,
        'coluna' => true,
        'linha' => true
    ];
}
