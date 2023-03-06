<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Corporativos Controller
 *
 * @property \App\Model\Table\CorporativosTable $Corporativos
 * @method \App\Model\Entity\Corporativo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CorporativosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $corporativos = $this->paginate($this->Corporativos);

        $this->set(compact('corporativos'));
    }

    /**
     * View method
     *
     * @param string|null $id Corporativo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporativo = $this->Corporativos->get($id, [
            'contain' => ['UserCorporativos'],
        ]);

        $this->set(compact('corporativo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corporativo = $this->Corporativos->newEmptyEntity();
        if ($this->request->is('post')) {
            $corporativo = $this->Corporativos->patchEntity($corporativo, $this->request->getData());
            if ($this->Corporativos->save($corporativo)) {
                $this->Flash->success(__('The corporativo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporativo could not be saved. Please, try again.'));
        }
        $this->set(compact('corporativo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Corporativo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corporativo = $this->Corporativos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporativo = $this->Corporativos->patchEntity($corporativo, $this->request->getData());
            if ($this->Corporativos->save($corporativo)) {
                $this->Flash->success(__('The corporativo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporativo could not be saved. Please, try again.'));
        }
        $this->set(compact('corporativo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Corporativo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corporativo = $this->Corporativos->get($id);
        if ($this->Corporativos->delete($corporativo)) {
            $this->Flash->success(__('The corporativo has been deleted.'));
        } else {
            $this->Flash->error(__('The corporativo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
