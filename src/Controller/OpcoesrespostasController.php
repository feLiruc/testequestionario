<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Opcoesrespostas Controller
 *
 * @property \App\Model\Table\OpcoesrespostasTable $Opcoesrespostas
 *
 * @method \App\Model\Entity\Opcoesresposta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OpcoesrespostasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tiporespostas']
        ];
        $opcoesrespostas = $this->paginate($this->Opcoesrespostas);

        $this->set(compact('opcoesrespostas'));
    }

    /**
     * View method
     *
     * @param string|null $id Opcoesresposta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opcoesresposta = $this->Opcoesrespostas->get($id, [
            'contain' => ['Tiporespostas']
        ]);

        $this->set('opcoesresposta', $opcoesresposta);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opcoesresposta = $this->Opcoesrespostas->newEntity();
        if ($this->request->is('post')) {
            $opcoesresposta = $this->Opcoesrespostas->patchEntity($opcoesresposta, $this->request->getData());
            if ($this->Opcoesrespostas->save($opcoesresposta)) {
                $this->Flash->success(__('The {0} has been saved.', 'Opcoesresposta'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Opcoesresposta'));
        }
        $tiporespostas = $this->Opcoesrespostas->Tiporespostas->find('list', ['limit' => 200]);
        $this->set(compact('opcoesresposta', 'tiporespostas'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Opcoesresposta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opcoesresposta = $this->Opcoesrespostas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opcoesresposta = $this->Opcoesrespostas->patchEntity($opcoesresposta, $this->request->getData());
            if ($this->Opcoesrespostas->save($opcoesresposta)) {
                $this->Flash->success(__('The {0} has been saved.', 'Opcoesresposta'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Opcoesresposta'));
        }
        $tiporespostas = $this->Opcoesrespostas->Tiporespostas->find('list', ['limit' => 200]);
        $this->set(compact('opcoesresposta', 'tiporespostas'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Opcoesresposta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opcoesresposta = $this->Opcoesrespostas->get($id);
        if ($this->Opcoesrespostas->delete($opcoesresposta)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Opcoesresposta'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Opcoesresposta'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
