<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pasos Controller
 *
 * @property \App\Model\Table\PasosTable $Pasos
 * @method \App\Model\Entity\Paso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PasosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserCorporativos'],
        ];
        $pasos = $this->paginate($this->Pasos);

        $this->set(compact('pasos'));
    }

    /**
     * View method
     *
     * @param string|null $id Paso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paso = $this->Pasos->get($id, [
            'contain' => ['UserCorporativos'],
        ]);

        $this->set(compact('paso'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paso = $this->Pasos->newEmptyEntity();
        if ($this->request->is('post')) {
            $paso = $this->Pasos->patchEntity($paso, $this->request->getData());
            if ($this->Pasos->save($paso)) {
                $this->Flash->success(__('The paso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paso could not be saved. Please, try again.'));
        }
        $userCorporativos = $this->Pasos->UserCorporativos->find('list', ['limit' => 200])->all();
        $this->set(compact('paso', 'userCorporativos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paso id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paso = $this->Pasos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paso = $this->Pasos->patchEntity($paso, $this->request->getData());
            if ($this->Pasos->save($paso)) {
                $this->Flash->success(__('The paso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paso could not be saved. Please, try again.'));
        }
        $userCorporativos = $this->Pasos->UserCorporativos->find('list', ['limit' => 200])->all();
        $this->set(compact('paso', 'userCorporativos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paso id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paso = $this->Pasos->get($id);
        if ($this->Pasos->delete($paso)) {
            $this->Flash->success(__('The paso has been deleted.'));
        } else {
            $this->Flash->error(__('The paso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
