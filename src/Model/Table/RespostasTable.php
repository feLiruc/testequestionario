<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Respostas Model
 *
 * @property \App\Model\Table\DistribuidoresTable&\Cake\ORM\Association\BelongsTo $Distribuidores
 * @property \App\Model\Table\ColunasTable&\Cake\ORM\Association\BelongsTo $Colunas
 * @property \App\Model\Table\LinhasTable&\Cake\ORM\Association\BelongsTo $Linhas
 *
 * @method \App\Model\Entity\Resposta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Resposta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Resposta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resposta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resposta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resposta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Resposta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resposta findOrCreate($search, callable $callback = null, $options = [])
 */
class RespostasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('respostas');
        $this->setDisplayField('valor');
        $this->setPrimaryKey('id');

        $this->belongsTo('Distribuidores', [
            'foreignKey' => 'distribuidor_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Checklists', [
            'foreignKey' => 'checklist_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Colunas', [
            'foreignKey' => 'coluna_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Linhas', [
            'foreignKey' => 'linha_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['distribuidor_id'], 'Distribuidores'));
        $rules->add($rules->existsIn(['checklist_id'], 'Checklists'));
        $rules->add($rules->existsIn(['coluna_id'], 'Colunas'));
        $rules->add($rules->existsIn(['linha_id'], 'Linhas'));

        return $rules;
    }
}
