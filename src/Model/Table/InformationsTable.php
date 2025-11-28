<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Informations Model
 *
 * @property \App\Model\Table\CoachesTable&\Cake\ORM\Association\BelongsTo $Coaches
 * @property \App\Model\Table\AdminsTable&\Cake\ORM\Association\BelongsTo $Admins
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Information newEmptyEntity()
 * @method \App\Model\Entity\Information newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Information> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Information get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Information findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Information patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Information> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Information|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Information saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Information>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Information>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Information>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Information> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Information>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Information>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Information>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Information> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InformationsTable extends Table
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

        $this->setTable('informations');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Coaches', [
            'foreignKey' => 'coach_id',
        ]);
        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('coach_id')
            ->allowEmptyString('coach_id');

        $validator
            ->integer('admin_id')
            ->allowEmptyString('admin_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('information')
            ->allowEmptyString('information');

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
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn(['coach_id'], 'Coaches'), ['errorField' => 'coach_id']);
        $rules->add($rules->existsIn(['admin_id'], 'Admins'), ['errorField' => 'admin_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
