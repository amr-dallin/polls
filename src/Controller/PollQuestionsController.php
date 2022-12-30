<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PollQuestions Controller
 *
 * @property \App\Model\Table\PollQuestionsTable $PollQuestions
 * @method \App\Model\Entity\PollQuestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PollQuestionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PollRespondents'],
        ];
        $pollQuestions = $this->paginate($this->PollQuestions);

        $this->set(compact('pollQuestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Poll Question id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pollQuestion = $this->PollQuestions->get($id, [
            'contain' => ['PollRespondents'],
        ]);

        $this->set(compact('pollQuestion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pollQuestion = $this->PollQuestions->newEmptyEntity();
        if ($this->request->is('post')) {
            $pollQuestion = $this->PollQuestions->patchEntity($pollQuestion, $this->request->getData());
            if ($this->PollQuestions->save($pollQuestion)) {
                $this->Flash->success(__('The poll question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll question could not be saved. Please, try again.'));
        }
        $pollRespondents = $this->PollQuestions->PollRespondents->find('list', ['limit' => 200])->all();
        $this->set(compact('pollQuestion', 'pollRespondents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Poll Question id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pollQuestion = $this->PollQuestions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pollQuestion = $this->PollQuestions->patchEntity($pollQuestion, $this->request->getData());
            if ($this->PollQuestions->save($pollQuestion)) {
                $this->Flash->success(__('The poll question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll question could not be saved. Please, try again.'));
        }
        $pollRespondents = $this->PollQuestions->PollRespondents->find('list', ['limit' => 200])->all();
        $this->set(compact('pollQuestion', 'pollRespondents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Poll Question id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pollQuestion = $this->PollQuestions->get($id);
        if ($this->PollQuestions->delete($pollQuestion)) {
            $this->Flash->success(__('The poll question has been deleted.'));
        } else {
            $this->Flash->error(__('The poll question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
