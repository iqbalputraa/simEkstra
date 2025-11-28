<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Activities Model
 *
 * @property \App\Model\Table\ExtracurricularsTable&\Cake\ORM\Association\BelongsTo $Extracurriculars
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\HasMany $Images
 *
 * @method \App\Model\Entity\Activity newEmptyEntity()
 * @method \App\Model\Entity\Activity newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Activity> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Activity get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Activity findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Activity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Activity> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Activity|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Activity saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActivitiesTable extends Table
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

        $this->setTable('activities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Extracurriculars', [
            'foreignKey' => 'extracurricular_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'activity_id',
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('desc')
            ->requirePresence('desc', 'create')
            ->notEmptyString('desc');

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
