<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coaches Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ExtracurricularsTable&\Cake\ORM\Association\HasMany $Extracurriculars
 * @property \App\Model\Table\InformationsTable&\Cake\ORM\Association\HasMany $Informations
 *
 * @method \App\Model\Entity\Coach newEmptyEntity()
 * @method \App\Model\Entity\Coach newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Coach> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coach get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Coach findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Coach patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Coach> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coach|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Coach saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Coach>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coach>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Coach>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coach> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Coach>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coach>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Coach>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coach> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoachesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('coaches');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Extracurriculars', [
            'foreignKey' => 'coach_id',
        ]);
        $this->hasMany('Informations', [
            'foreignKey' => 'coach_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
