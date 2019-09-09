<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Linha Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int $checklist_id
 *
 * @property \App\Model\Entity\Checklist $checklist
 * @property \App\Model\Entity\Resposta[] $respostas
 */
class Linha extends Entity
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
        'descricao' => true,
        'checklist_id' => true,
        'checklist' => true,
        'respostas' => true
    ];
}
