<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Linhas Controller
 *
 * @property \App\Model\Table\LinhasTable $Linhas
 *
 * @method \App\Model\Entity\Linha[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LinhasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Checklists']
        ];
        $linhas = $this->paginate($this->Linhas);

        $this->set(compact('linhas'));
    }

    /**
     * View method
     *
     * @param string|null $id Linha id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $linha = $this->Linhas->get($id, [
            'contain' => ['Checklists', 'Respostas']
        ]);

        $this->set('linha', $linha);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $linha = $this->Linhas->newEntity();
        if ($this->request->is('post')) {
            $linha = $this->Linhas->patchEntity($linha, $this->request->getData());
            if ($this->Linhas->save($linha)) {
                $this->Flash->success(__('The {0} has been saved.', 'Linha'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Linha'));
        }
        $checklists = $this->Linhas->Checklists->find('list', ['limit' => 200]);
        $this->set(compact('linha', 'checklists'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Linha id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $linha = $this->Linhas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $linha = $this->Linhas->patchEntity($linha, $this->request->getData());
            if ($this->Linhas->save($linha)) {
                $this->Flash->success(__('The {0} has been saved.', 'Linha'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Linha'));
        }
        $checklists = $this->Linhas->Checklists->find('list', ['limit' => 200]);
        $this->set(compact('linha', 'checklists'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Linha id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $linha = $this->Linhas->get($id);
        if ($this->Linhas->delete($linha)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Linha'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Linha'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
