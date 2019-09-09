<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Opcoesrespostas Model
 *
 * @property \App\Model\Table\TiporespostasTable&\Cake\ORM\Association\BelongsTo $Tiporespostas
 *
 * @method \App\Model\Entity\Opcoesresposta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Opcoesresposta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Opcoesresposta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Opcoesresposta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Opcoesresposta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Opcoesresposta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Opcoesresposta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Opcoesresposta findOrCreate($search, callable $callback = null, $options = [])
 */
class OpcoesrespostasTable extends Table
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

        $this->setTable('opcoesrespostas');
        $this->setDisplayField('valor');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tiporespostas', [
            'foreignKey' => 'tiporesposta_id',
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

        $validator
            ->scalar('valor')
            ->maxLength('valor', 255)
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

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
        $rules->add($rules->existsIn(['tiporesposta_id'], 'Tiporespostas'));

        return $rules;
    }
}
