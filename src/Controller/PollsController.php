<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Polls Controller
 *
 * @property \App\Model\Table\PollsTable $Polls
 * @method \App\Model\Entity\Poll[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PollsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $polls = $this->paginate($this->Polls);

        $this->set(compact('polls'));
    }

    /**
     * View method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poll = $this->Polls->get($id, [
            'contain' => ['PollRespondents'],
        ]);

        $this->set(compact('poll'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poll = $this->Polls->newEmptyEntity();
        if ($this->request->is('post')) {
            $getData = $this->request->getData();
            if (($handle = fopen($this->request->getData()['file']['tmp_name'], 'r')) !== FALSE) {
                $data = fgetcsv($handle);
                while (($data = fgetcsv($handle)) !== FALSE) {
                    switch ($data[5]) {
                        case 'Дошкольное образование (дневное)':
                            $faculty = '1';
                            break;
                        case 'Дошкольное образование (вечернее)':
                            $faculty = '2';
                            break;
                        case 'Корейский язык и менеджмент':
                            $faculty = '3';
                            break;
                        case 'Архитектура':
                            $faculty = '4';
                            break;
                        case 'Диетология и нутрициология':
                            $faculty = '5';
                            break;
                        case 'Информационные технологии':
                            $faculty = '6';
                            break;
                        case 'Электронный бизнес':
                            $faculty = '7';
                            break;
                        case 'Мультимедия и игровой контент':
                            $faculty = '8';
                            break;
                    }

                    $language = '1';
                    if ($data[6] === 'Русский') {
                        $language = '2';
                    }

                    $gender = '1';
                    if ($data[2] === 'Мужской') {
                        $gender = '2';
                    }

                    $i = 8;
                    $pollQuestions = [];
                    while(isset($data[$i])) {
                        $pollQuestions[] = [
                            'question_number' => $i - 7,
                            'answer' => (($data[$i] === 'Да') ? 1 : 0)
                        ];
                        $i++;
                    }

                    $getData['poll_respondents'][] = [
                        'full_name' => $data[1],
                        'gender' => $gender,
                        'date_of_birth' => $data[3],
                        'year_of_admission' => (int)$data[4],
                        'faculty' => $faculty,
                        'language' => $language,
                        'group_symbol' => $data[7],
                        'poll_questions' => $pollQuestions
                    ];
                }
                fclose($handle);
            }
            $poll = $this->Polls->patchEntity($poll, $getData, [
                'associated' => [
                    'PollRespondents' => [
                        'associated' => 'PollQuestions'
                    ]
                ]
            ]);

            if ($this->Polls->save($poll)) {
                $this->Flash->success(__('The poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll could not be saved. Please, try again.'));
        }
        $this->set(compact('poll'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poll = $this->Polls->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poll = $this->Polls->patchEntity($poll, $this->request->getData());
            if ($this->Polls->save($poll)) {
                $this->Flash->success(__('The poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll could not be saved. Please, try again.'));
        }
        $this->set(compact('poll'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $poll = $this->Polls->get($id);
        if ($this->Polls->delete($poll)) {
            $this->Flash->success(__('The poll has been deleted.'));
        } else {
            $this->Flash->error(__('The poll could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
