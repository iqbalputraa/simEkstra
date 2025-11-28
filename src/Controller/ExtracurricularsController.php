<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Extracurriculars Controller
 *
 * @property \App\Model\Table\ExtracurricularsTable $Extracurriculars
 */
class ExtracurricularsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Extracurriculars->find()
            ->contain(['Users', 'Coaches']);
        $extracurriculars = $this->paginate($query);

        $this->set(compact('extracurriculars'));
    }

    /**
     * View method
     *
     * @param string|null $id Extracurricular id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $extracurricular = $this->Extracurriculars->get($id, contain: ['Users', 'Coaches', 'Activities', 'Schedules']);
        $this->set(compact('extracurricular'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $extracurricular = $this->Extracurriculars->newEmptyEntity();
        if ($this->request->is('post')) {
            $extracurricular = $this->Extracurriculars->patchEntity($extracurricular, $this->request->getData());
            if ($this->Extracurriculars->save($extracurricular)) {
                $this->Flash->success(__('The extracurricular has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extracurricular could not be saved. Please, try again.'));
        }
        $users = $this->Extracurriculars->Users->find('list', limit: 200)->all();
        $coaches = $this->Extracurriculars->Coaches->find('list', limit: 200)->all();
        $this->set(compact('extracurricular', 'users', 'coaches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Extracurricular id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $extracurricular = $this->Extracurriculars->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $extracurricular = $this->Extracurriculars->patchEntity($extracurricular, $this->request->getData());
            if ($this->Extracurriculars->save($extracurricular)) {
                $this->Flash->success(__('The extracurricular has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extracurricular could not be saved. Please, try again.'));
        }
        $users = $this->Extracurriculars->Users->find('list', limit: 200)->all();
        $coaches = $this->Extracurriculars->Coaches->find('list', limit: 200)->all();
        $this->set(compact('extracurricular', 'users', 'coaches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Extracurricular id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $extracurricular = $this->Extracurriculars->get($id);
        if ($this->Extracurriculars->delete($extracurricular)) {
            $this->Flash->success(__('The extracurricular has been deleted.'));
        } else {
            $this->Flash->error(__('The extracurricular could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
