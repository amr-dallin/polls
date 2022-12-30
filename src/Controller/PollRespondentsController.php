<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PollRespondents Controller
 *
 * @property \App\Model\Table\PollRespondentsTable $PollRespondents
 * @method \App\Model\Entity\PollRespondent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PollRespondentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Polls'],
        ];
        $pollRespondents = $this->paginate($this->PollRespondents);

        $this->set(compact('pollRespondents'));
    }

    /**
     * View method
     *
     * @param string|null $id Poll Respondent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pollRespondent = $this->PollRespondents->get($id, [
            'contain' => ['Polls', 'PollQuestions'],
        ]);

        $this->set(compact('pollRespondent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pollRespondent = $this->PollRespondents->newEmptyEntity();
        if ($this->request->is('post')) {
            $pollRespondent = $this->PollRespondents->patchEntity($pollRespondent, $this->request->getData());
            if ($this->PollRespondents->save($pollRespondent)) {
                $this->Flash->success(__('The poll respondent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll respondent could not be saved. Please, try again.'));
        }
        $polls = $this->PollRespondents->Polls->find('list', ['limit' => 200])->all();
        $this->set(compact('pollRespondent', 'polls'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Poll Respondent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pollRespondent = $this->PollRespondents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pollRespondent = $this->PollRespondents->patchEntity($pollRespondent, $this->request->getData());
            if ($this->PollRespondents->save($pollRespondent)) {
                $this->Flash->success(__('The poll respondent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll respondent could not be saved. Please, try again.'));
        }
        $polls = $this->PollRespondents->Polls->find('list', ['limit' => 200])->all();
        $this->set(compact('pollRespondent', 'polls'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Poll Respondent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pollRespondent = $this->PollRespondents->get($id);
        if ($this->PollRespondents->delete($pollRespondent)) {
            $this->Flash->success(__('The poll respondent has been deleted.'));
        } else {
            $this->Flash->error(__('The poll respondent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
