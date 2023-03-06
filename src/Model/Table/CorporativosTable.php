<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Corporativos Model
 *
 * @property \App\Model\Table\UserCorporativosTable&\Cake\ORM\Association\HasMany $UserCorporativos
 *
 * @method \App\Model\Entity\Corporativo newEmptyEntity()
 * @method \App\Model\Entity\Corporativo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Corporativo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Corporativo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Corporativo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Corporativo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Corporativo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Corporativo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Corporativo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Corporativo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Corporativo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Corporativo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Corporativo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CorporativosTable extends Table
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

        $this->setTable('corporativos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserCorporativos', [
            'foreignKey' => 'corporativo_id',
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
            ->scalar('nombre_corporativo')
            ->maxLength('nombre_corporativo', 255)
            ->allowEmptyString('nombre_corporativo');

        return $validator;
    }
}
