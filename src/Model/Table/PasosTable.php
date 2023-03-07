<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pasos Model
 *
 * @property \App\Model\Table\UserCorporativosTable&\Cake\ORM\Association\BelongsTo $UserCorporativos
 *
 * @method \App\Model\Entity\Paso newEmptyEntity()
 * @method \App\Model\Entity\Paso newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paso findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paso[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paso[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paso[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paso[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paso[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PasosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pasos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserCorporativos', [
            'foreignKey' => 'user_corporativo_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('pasos')
            ->allowEmptyString('pasos');

        $validator
            ->decimal('metros')
            ->allowEmptyString('metros');

        $validator
            ->integer('user_corporativo_id')
            ->notEmptyString('user_corporativo_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_corporativo_id', 'UserCorporativos'), ['errorField' => 'user_corporativo_id']);

        return $rules;
    }
    public function consultaEjemplo()
    {
        $query = $this->find();
        $query->select([
            'pasos' => $query->func()->count('pasos'),
        ])
            ->where([
                'fecha >=' => '2023-01-01',
                'fecha <=' => '2023-03-07',
            ])
            ->orderAsc('pasos');

        return $query;
    }
}
