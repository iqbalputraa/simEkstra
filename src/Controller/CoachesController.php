<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Coaches Controller
 *
 * @property \App\Model\Table\CoachesTable $Coaches
 */
class CoachesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Coaches->find()
            ->contain(['Users']);
        $coaches = $this->paginate($query);

        $this->set(compact('coaches'));
    }

    /**
     * View method
     *
     * @param string|null $id Coach id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coach = $this->Coaches->get($id, contain: ['Users', 'Extracurriculars', 'Informations']);
        $this->set(compact('coach'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coach = $this->Coaches->newEmptyEntity();
        if ($this->request->is('post')) {
            $coach = $this->Coaches->patchEntity($coach, $this->request->getData());
            if ($this->Coaches->save($coach)) {
                $this->Flash->success(__('The coach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coach could not be saved. Please, try again.'));
        }
        $users = $this->Coaches->Users->find('list', limit: 200)->all();
        $this->set(compact('coach', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coach id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coach = $this->Coaches->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coach = $this->Coaches->patchEntity($coach, $this->request->getData());
            if ($this->Coaches->save($coach)) {
                $this->Flash->success(__('The coach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coach could not be saved. Please, try again.'));
        }
        $users = $this->Coaches->Users->find('list', limit: 200)->all();
        $this->set(compact('coach', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coach id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coach = $this->Coaches->get($id);
        if ($this->Coaches->delete($coach)) {
            $this->Flash->success(__('The coach has been deleted.'));
        } else {
            $this->Flash->error(__('The coach could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
