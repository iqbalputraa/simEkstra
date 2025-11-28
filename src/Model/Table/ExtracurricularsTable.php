<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Extracurriculars Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CoachesTable&\Cake\ORM\Association\BelongsTo $Coaches
 * @property \App\Model\Table\ActivitiesTable&\Cake\ORM\Association\HasMany $Activities
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\Extracurricular newEmptyEntity()
 * @method \App\Model\Entity\Extracurricular newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Extracurricular> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Extracurricular get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Extracurricular findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Extracurricular patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Extracurricular> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Extracurricular|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Extracurricular saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Extracurricular>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Extracurricular>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Extracurricular>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Extracurricular> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Extracurricular>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Extracurricular>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Extracurricular>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Extracurricular> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExtracurricularsTable extends Table
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

        $this->setTable('extracurriculars');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Coaches', [
            'foreignKey' => 'coach_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Activities', [
            'foreignKey' => 'extracurricular_id',
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'extracurricular_id',
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
            ->maxLength('name', 80)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('desc')
            ->allowEmptyString('desc');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('coach_id')
            ->notEmptyString('coach_id');

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
        $rules->add($rules->existsIn(['coach_id'], 'Coaches'), ['errorField' => 'coach_id']);

        return $rules;
    }
}
