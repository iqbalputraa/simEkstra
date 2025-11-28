<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 */
class InformationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Informations->find()
            ->contain(['Coaches', 'Admins', 'Users']);
        $informations = $this->paginate($query);

        $this->set(compact('informations'));
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Informations->get($id, contain: ['Coaches', 'Admins', 'Users']);
        $this->set(compact('information'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $information = $this->Informations->newEmptyEntity();
        if ($this->request->is('post')) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $coaches = $this->Informations->Coaches->find('list', limit: 200)->all();
        $admins = $this->Informations->Admins->find('list', limit: 200)->all();
        $users = $this->Informations->Users->find('list', limit: 200)->all();
        $this->set(compact('information', 'coaches', 'admins', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $information = $this->Informations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $coaches = $this->Informations->Coaches->find('list', limit: 200)->all();
        $admins = $this->Informations->Admins->find('list', limit: 200)->all();
        $users = $this->Informations->Users->find('list', limit: 200)->all();
        $this->set(compact('information', 'coaches', 'admins', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $information = $this->Informations->get($id);
        if ($this->Informations->delete($information)) {
            $this->Flash->success(__('The information has been deleted.'));
        } else {
            $this->Flash->error(__('The information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
