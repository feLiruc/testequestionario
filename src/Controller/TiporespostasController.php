<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tiporespostas Controller
 *
 * @property \App\Model\Table\TiporespostasTable $Tiporespostas
 *
 * @method \App\Model\Entity\Tiporesposta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TiporespostasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tiporespostas = $this->paginate($this->Tiporespostas);

        $this->set(compact('tiporespostas'));
    }

    /**
     * View method
     *
     * @param string|null $id Tiporesposta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiporesposta = $this->Tiporespostas->get($id, [
            'contain' => ['Colunas', 'Opcoesrespostas']
        ]);

        $this->set('tiporesposta', $tiporesposta);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiporesposta = $this->Tiporespostas->newEntity();
        if ($this->request->is('post')) {

            $everything = $this->request->getData();

            ////////////////////////////////////////////////////
            $everything['opcoesrespostas'] = array_filter($everything['opcoesrespostas'], function($var){
                return($var['valor'] != null);
            });
            
            $tiporesposta = $this->Tiporespostas->patchEntity($tiporesposta, $everything);

            if ($this->Tiporespostas->save($tiporesposta)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tiporesposta'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tiporesposta'));
        }
        $this->set(compact('tiporesposta'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Tiporesposta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiporesposta = $this->Tiporespostas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiporesposta = $this->Tiporespostas->patchEntity($tiporesposta, $this->request->getData());
            if ($this->Tiporespostas->save($tiporesposta)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tiporesposta'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tiporesposta'));
        }
        $this->set(compact('tiporesposta'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Tiporesposta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiporesposta = $this->Tiporespostas->get($id);
        if ($this->Tiporespostas->delete($tiporesposta)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Tiporesposta'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Tiporesposta'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
