<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Checklists Model
 *
 * @property \App\Model\Table\ColunasTable&\Cake\ORM\Association\HasMany $Colunas
 * @property \App\Model\Table\LinhasTable&\Cake\ORM\Association\HasMany $Linhas
 *
 * @method \App\Model\Entity\Checklist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Checklist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Checklist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Checklist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Checklist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Checklist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Checklist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Checklist findOrCreate($search, callable $callback = null, $options = [])
 */
class ChecklistsTable extends Table
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

        $this->setTable('checklists');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Colunas', [
            'foreignKey' => 'checklist_id'
        ]);
        $this->hasMany('Linhas', [
            'foreignKey' => 'checklist_id'
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

        return $rules;
    }
}
