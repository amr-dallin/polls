<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PollRespondents Model
 *
 * @property \App\Model\Table\PollsTable&\Cake\ORM\Association\BelongsTo $Polls
 * @property \App\Model\Table\PollQuestionsTable&\Cake\ORM\Association\HasMany $PollQuestions
 *
 * @method \App\Model\Entity\PollRespondent newEmptyEntity()
 * @method \App\Model\Entity\PollRespondent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PollRespondent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PollRespondent get($primaryKey, $options = [])
 * @method \App\Model\Entity\PollRespondent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PollRespondent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PollRespondent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PollRespondent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PollRespondent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PollRespondent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PollRespondent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PollRespondent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PollRespondent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PollRespondentsTable extends Table
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

        $this->setTable('poll_respondents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Polls', [
            'foreignKey' => 'poll_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PollQuestions', [
            'foreignKey' => 'poll_respondent_id',
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
            ->nonNegativeInteger('poll_id')
            ->notEmptyString('poll_id');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmptyDate('date_of_birth');

        $validator
            ->scalar('year_of_admission')
            ->requirePresence('year_of_admission', 'create')
            ->notEmptyString('year_of_admission');

        $validator
            ->scalar('faculty')
            ->maxLength('faculty', 2)
            ->requirePresence('faculty', 'create')
            ->notEmptyString('faculty');

        $validator
            ->scalar('language')
            ->maxLength('language', 2)
            ->requirePresence('language', 'create')
            ->notEmptyString('language');

        $validator
            ->scalar('group_symbol')
            ->maxLength('group_symbol', 1)
            ->requirePresence('group_symbol', 'create')
            ->notEmptyString('group_symbol');

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
        $rules->add($rules->existsIn('poll_id', 'Polls'), ['errorField' => 'poll_id']);

        return $rules;
    }
}
