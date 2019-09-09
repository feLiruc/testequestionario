<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Distribuidores Controller
 *
 * @property \App\Model\Table\DistribuidoresTable $Distribuidores
 *
 * @method \App\Model\Entity\Distribuidor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DistribuidoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $distribuidores = $this->paginate($this->Distribuidores);

        $this->set(compact('distribuidores'));
    }

    /**
     * View method
     *
     * @param string|null $id Distribuidor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distribuidor = $this->Distribuidores->get($id, [
            'contain' => []
        ]);

        $this->set('distribuidor', $distribuidor);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distribuidor = $this->Distribuidores->newEntity();
        if ($this->request->is('post')) {
            $distribuidor = $this->Distribuidores->patchEntity($distribuidor, $this->request->getData());
            if ($this->Distribuidores->save($distribuidor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Distribuidor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Distribuidor'));
        }
        $this->set(compact('distribuidor'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Distribuidor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distribuidor = $this->Distribuidores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distribuidor = $this->Distribuidores->patchEntity($distribuidor, $this->request->getData());
            if ($this->Distribuidores->save($distribuidor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Distribuidor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Distribuidor'));
        }
        $this->set(compact('distribuidor'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Distribuidor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distribuidor = $this->Distribuidores->get($id);
        if ($this->Distribuidores->delete($distribuidor)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Distribuidor'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Distribuidor'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
