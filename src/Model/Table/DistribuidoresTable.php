<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Distribuidores Model
 *
 * @property &\Cake\ORM\Association\HasMany $Respostas
 *
 * @method \App\Model\Entity\Distribuidor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Distribuidor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Distribuidor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Distribuidor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Distribuidor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Distribuidor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Distribuidor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Distribuidor findOrCreate($search, callable $callback = null, $options = [])
 */
class DistribuidoresTable extends Table
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

        $this->setTable('distribuidores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Respostas', [
            'foreignKey' => 'distribuidor_id'
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
            ->maxLength('descricao', 45)
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
