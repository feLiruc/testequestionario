<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Colunas Model
 *
 * @property \App\Model\Table\ChecklistsTable&\Cake\ORM\Association\BelongsTo $Checklists
 * @property \App\Model\Table\TiporespostasTable&\Cake\ORM\Association\BelongsTo $Tiporespostas
 * @property \App\Model\Table\RespostasTable&\Cake\ORM\Association\HasMany $Respostas
 *
 * @method \App\Model\Entity\Coluna get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coluna newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coluna[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coluna|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coluna saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coluna patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coluna[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coluna findOrCreate($search, callable $callback = null, $options = [])
 */
class ColunasTable extends Table
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

        $this->setTable('colunas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Checklists', [
            'foreignKey' => 'checklist_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tiporespostas', [
            'foreignKey' => 'tiporesposta_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Respostas', [
            'foreignKey' => 'coluna_id'
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
        $rules->add($rules->existsIn(['tiporesposta_id'], 'Tiporespostas'));

        return $rules;
    }
}
