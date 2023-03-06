<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserCorporativos Controller
 *
 * @property \App\Model\Table\UserCorporativosTable $UserCorporativos
 * @method \App\Model\Entity\UserCorporativo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserCorporativosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Corporativos'],
        ];
        $userCorporativos = $this->paginate($this->UserCorporativos);

        $this->set(compact('userCorporativos'));
    }

    /**
     * View method
     *
     * @param string|null $id User Corporativo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userCorporativo = $this->UserCorporativos->get($id, [
            'contain' => ['Corporativos', 'Pasos'],
        ]);

        $this->set(compact('userCorporativo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userCorporativo = $this->UserCorporativos->newEmptyEntity();
        if ($this->request->is('post')) {
            $userCorporativo = $this->UserCorporativos->patchEntity($userCorporativo, $this->request->getData());
            if ($this->UserCorporativos->save($userCorporativo)) {
                $this->Flash->success(__('The user corporativo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user corporativo could not be saved. Please, try again.'));
        }
        $corporativos = $this->UserCorporativos->Corporativos->find('list', ['limit' => 200])->all();
        $this->set(compact('userCorporativo', 'corporativos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Corporativo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userCorporativo = $this->UserCorporativos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userCorporativo = $this->UserCorporativos->patchEntity($userCorporativo, $this->request->getData());
            if ($this->UserCorporativos->save($userCorporativo)) {
                $this->Flash->success(__('The user corporativo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user corporativo could not be saved. Please, try again.'));
        }
        $corporativos = $this->UserCorporativos->Corporativos->find('list', ['limit' => 200])->all();
        $this->set(compact('userCorporativo', 'corporativos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Corporativo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userCorporativo = $this->UserCorporativos->get($id);
        if ($this->UserCorporativos->delete($userCorporativo)) {
            $this->Flash->success(__('The user corporativo has been deleted.'));
        } else {
            $this->Flash->error(__('The user corporativo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
