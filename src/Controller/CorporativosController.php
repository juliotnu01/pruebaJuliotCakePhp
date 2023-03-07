<?php

declare(strict_types=1);

namespace App\Controller;

use \App\Model\Table\UserCorporativosTable;


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
    public function estadistica()
    {
        $data = $this->request->getData();
        if ($this->request->is('post')) {
            if ($data['tipo'] == 1) {

                $query1 = $this->Corporativos->UserCorporativos->find()
                    ->contain(['Pasos' => function ($q) {
                        return $q->select([
                            'pasos' => $q->count('pasos'),
                            'metros' => $q->count('metros'),
                            'user_corporativo_id',
                        ])->orderAsc('pasos')
                            ->group('user_corporativo_id');
                    }])
                    ->where([
                        'created >=' => $data['fecha_inicio'] ?? date('yy-mm-dd'),
                        'created <=' => $data['fecha_fin'] ?? date('yy-mm-dd'),
                    ]);
                $pasos1 = $query1->toArray();
                $this->set(compact('pasos1'));
            } elseif ($data['tipo'] == 2) {
                $query1 = $this->Corporativos->UserCorporativos->find()
                    ->contain(['Pasos' => function ($q) {
                        return $q->select([
                            'pasos' => $q->count('pasos'),
                            'metros' => $q->count('metros'),
                            'user_corporativo_id',
                        ])->orderAsc('pasos')
                            ->group('user_corporativo_id');
                    }])
                    ->where([
                        'created =' => $data['fecha_inicio'] ?? date('yy-mm-dd'),
                    ]);
                $pasos2 = $query1->toArray();
                $this->set(compact('pasos2'));
            } elseif ($data['tipo'] == 3) {
                $weekStart = $data['fecha_inicio'];
                $weekEnd = $data['fecha_fin'];

                $activities = $this->Corporativos->UserCorporativos->Pasos->find()
                    ->select(['user_corporativo_id'])
                    ->where(function ($exp, $q) use ($weekStart, $weekEnd) {
                        return $exp->between('created', $weekStart, $weekEnd);
                    })
                    ->group(['user_corporativo_id'])
                    ->having(function ($exp) {
                        return $exp->gte('COUNT(*)', 3);
                    })
                    ->order(['user_corporativo_id']);

                $pasos3 = $activities->toArray();
                $this->set(compact('pasos3'));
            }
        } else {
            $query1 = $this->Corporativos->UserCorporativos->find()
                ->contain(['Pasos' => function ($q) {
                    return $q->select([
                        'pasos' => $q->count('pasos'),
                        'metros' => $q->count('metros'),
                        'user_corporativo_id',
                    ])->orderAsc('pasos')
                        ->group('user_corporativo_id');
                }])
                ->where([
                    'created >=' => $data['fecha_inicio'] ?? date('yy-mm-dd'),
                    'created <=' => $data['fecha_fin'] ?? date('yy-mm-dd'),
                ]);


            $pasos1 = $query1->toArray();
            $this->set(compact('pasos1'));
        }
    }
}
