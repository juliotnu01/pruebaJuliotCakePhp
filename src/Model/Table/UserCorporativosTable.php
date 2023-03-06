<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserCorporativos Model
 *
 * @property \App\Model\Table\CorporativosTable&\Cake\ORM\Association\BelongsTo $Corporativos
 * @property \App\Model\Table\PasosTable&\Cake\ORM\Association\HasMany $Pasos
 *
 * @method \App\Model\Entity\UserCorporativo newEmptyEntity()
 * @method \App\Model\Entity\UserCorporativo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserCorporativo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserCorporativo get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserCorporativo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserCorporativo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserCorporativo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserCorporativo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserCorporativo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserCorporativo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserCorporativo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserCorporativo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserCorporativo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserCorporativosTable extends Table
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

        $this->setTable('user_corporativos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Corporativos', [
            'foreignKey' => 'corporativo_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Pasos', [
            'foreignKey' => 'user_corporativo_id',
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
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->allowEmptyString('nombre');

        $validator
            ->integer('corporativo_id')
            ->notEmptyString('corporativo_id');

        $validator
            ->date('fecha_inicio')
            ->allowEmptyDate('fecha_inicio');

        $validator
            ->date('fecha_fin')
            ->allowEmptyDate('fecha_fin');

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
        $rules->add($rules->existsIn('corporativo_id', 'Corporativos'), ['errorField' => 'corporativo_id']);

        return $rules;
    }
}
