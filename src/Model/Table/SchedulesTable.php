<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \App\Model\Table\ExtracurricularsTable&\Cake\ORM\Association\BelongsTo $Extracurriculars
 * @property \App\Model\Table\AttendancesTable&\Cake\ORM\Association\HasMany $Attendances
 *
 * @method \App\Model\Entity\Schedule newEmptyEntity()
 * @method \App\Model\Entity\Schedule newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Schedule> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Schedule findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Schedule> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Schedule saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Schedule>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Schedule>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Schedule>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Schedule> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Schedule>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Schedule>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Schedule>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Schedule> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchedulesTable extends Table
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

        $this->setTable('schedules');
        $this->setDisplayField('day');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Extracurriculars', [
            'foreignKey' => 'extracurricular_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Attendances', [
            'foreignKey' => 'schedule_id',
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
            ->time('time')
            ->requirePresence('time', 'create')
            ->notEmptyTime('time');

        $validator
            ->scalar('day')
            ->notEmptyString('day');

        $validator
            ->integer('extracurricular_id')
            ->notEmptyString('extracurricular_id');

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
        $rules->add($rules->existsIn(['extracurricular_id'], 'Extracurriculars'), ['errorField' => 'extracurricular_id']);

        return $rules;
    }
}
