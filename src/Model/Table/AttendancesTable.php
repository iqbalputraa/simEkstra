<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attendances Model
 *
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\BelongsTo $Schedules
 *
 * @method \App\Model\Entity\Attendance newEmptyEntity()
 * @method \App\Model\Entity\Attendance newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Attendance> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Attendance get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Attendance findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Attendance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Attendance> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Attendance|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Attendance saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttendancesTable extends Table
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

        $this->setTable('attendances');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id',
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
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('note')
            ->requirePresence('note', 'create')
            ->notEmptyString('note');

        $validator
            ->integer('schedule_id')
            ->notEmptyString('schedule_id');

        $validator
            ->integer('users_d')
            ->requirePresence('users_d', 'create')
            ->notEmptyString('users_d');

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
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'), ['errorField' => 'schedule_id']);

        return $rules;
    }
}
