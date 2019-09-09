<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Linhas Model
 *
 * @property \App\Model\Table\ChecklistsTable&\Cake\ORM\Association\BelongsTo $Checklists
 * @property \App\Model\Table\RespostasTable&\Cake\ORM\Association\HasMany $Respostas
 *
 * @method \App\Model\Entity\Linha get($primaryKey, $options = [])
 * @method \App\Model\Entity\Linha newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Linha[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Linha|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Linha saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Linha patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Linha[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Linha findOrCreate($search, callable $callback = null, $options = [])
 */
class LinhasTable extends Table
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

        $this->setTable('linhas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Checklists', [
            'foreignKey' => 'checklist_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Respostas', [
            'foreignKey' => 'linha_id'
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

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 128)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

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
        $rules->add($rules->existsIn(['checklist_id'], 'Checklists'));

        return $rules;
    }
}
