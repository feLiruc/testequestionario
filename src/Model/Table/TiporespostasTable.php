<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tiporespostas Model
 *
 * @property \App\Model\Table\ColunasTable&\Cake\ORM\Association\HasMany $Colunas
 * @property \App\Model\Table\OpcoesrespostasTable&\Cake\ORM\Association\HasMany $Opcoesrespostas
 *
 * @method \App\Model\Entity\Tiporesposta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tiporesposta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tiporesposta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tiporesposta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiporesposta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiporesposta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tiporesposta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tiporesposta findOrCreate($search, callable $callback = null, $options = [])
 */
class TiporespostasTable extends Table
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

        $this->setTable('tiporespostas');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->hasMany('Colunas', [
            'foreignKey' => 'tiporesposta_id'
        ]);
        $this->hasMany('Opcoesrespostas', [
            'foreignKey' => 'tiporesposta_id'
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
