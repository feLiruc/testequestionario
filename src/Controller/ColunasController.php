<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Colunas Controller
 *
 * @property \App\Model\Table\ColunasTable $Colunas
 *
 * @method \App\Model\Entity\Coluna[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ColunasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Checklists', 'Tiporespostas']
        ];
        $colunas = $this->paginate($this->Colunas);

        $this->set(compact('colunas'));
    }

    /**
     * View method
     *
     * @param string|null $id Coluna id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coluna = $this->Colunas->get($id, [
            'contain' => ['Checklists', 'Tiporespostas', 'Respostas']
        ]);

        $this->set('coluna', $coluna);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coluna = $this->Colunas->newEntity();
        if ($this->request->is('post')) {
            $coluna = $this->Colunas->patchEntity($coluna, $this->request->getData());
            if ($this->Colunas->save($coluna)) {
                $this->Flash->success(__('The {0} has been saved.', 'Coluna'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Coluna'));
        }
        $checklists = $this->Colunas->Checklists->find('list', ['limit' => 200]);
        $tiporespostas = $this->Colunas->Tiporespostas->find('list', ['limit' => 200]);
        $this->set(compact('coluna', 'checklists', 'tiporespostas'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Coluna id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coluna = $this->Colunas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coluna = $this->Colunas->patchEntity($coluna, $this->request->getData());
            if ($this->Colunas->save($coluna)) {
                $this->Flash->success(__('The {0} has been saved.', 'Coluna'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Coluna'));
        }
        $checklists = $this->Colunas->Checklists->find('list', ['limit' => 200]);
        $tiporespostas = $this->Colunas->Tiporespostas->find('list', ['limit' => 200]);
        $this->set(compact('coluna', 'checklists', 'tiporespostas'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Coluna id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coluna = $this->Colunas->get($id);
        if ($this->Colunas->delete($coluna)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Coluna'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Coluna'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
