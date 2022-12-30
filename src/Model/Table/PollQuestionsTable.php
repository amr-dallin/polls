<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PollQuestions Model
 *
 * @property \App\Model\Table\PollRespondentsTable&\Cake\ORM\Association\BelongsTo $PollRespondents
 *
 * @method \App\Model\Entity\PollQuestion newEmptyEntity()
 * @method \App\Model\Entity\PollQuestion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PollQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PollQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\PollQuestion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PollQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PollQuestion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PollQuestion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PollQuestion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PollQuestion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PollQuestion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PollQuestion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PollQuestion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PollQuestionsTable extends Table
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

        $this->setTable('poll_questions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PollRespondents', [
            'foreignKey' => 'poll_respondent_id',
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
            ->nonNegativeInteger('poll_respondent_id')
            ->notEmptyString('poll_respondent_id');

        $validator
            ->nonNegativeInteger('question_number')
            ->requirePresence('question_number', 'create')
            ->notEmptyString('question_number');

        $validator
            ->boolean('answer')
            ->notEmptyString('answer');

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
        $rules->add($rules->existsIn('poll_respondent_id', 'PollRespondents'), ['errorField' => 'poll_respondent_id']);

        return $rules;
    }
}
