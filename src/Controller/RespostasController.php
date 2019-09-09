<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Respostas Controller
 *
 * @property \App\Model\Table\RespostasTable $Respostas
 *
 * @method \App\Model\Entity\Resposta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RespostasController extends AppController
{

    public function distribuidores()
    {
        $distribuidores = $this->paginate(TableRegistry::get('Distribuidores'));

        $this->set(compact('distribuidores'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Distribuidores', 'Colunas', 'Linhas']
        ];
        $respostas = $this->paginate($this->Respostas);

        $this->set(compact('respostas'));
    }

    /**
     * View method
     *
     * @param string|null $id Resposta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $resposta = $this->Respostas->get($id, [
        //     'contain' => ['Distribuidores', 'Colunas', 'Linhas']
        // ]);

        $distribuidor = TableRegistry::get('Distribuidores')->get($id, [
            'contain' => []
        ]);

        $checklists = TableRegistry::get('Checklists')->find('all', [
            'contain' => []
        ]);

        $this->set(compact('distribuidor', 'checklists'));
    }


    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $resposta = $this->Respostas->newEntity();
    //     if ($this->request->is('post')) {
    //         $resposta = $this->Respostas->patchEntity($resposta, $this->request->getData());
    //         if ($this->Respostas->save($resposta)) {
    //             $this->Flash->success(__('The {0} has been saved.', 'Resposta'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Resposta'));
    //     }
    //     $distribuidores = $this->Respostas->Distribuidores->find('list', ['limit' => 200]);
    //     $colunas = $this->Respostas->Colunas->find('list', ['limit' => 200]);
    //     $linhas = $this->Respostas->Linhas->find('list', ['limit' => 200]);
    //     $this->set(compact('resposta', 'distribuidores', 'colunas', 'linhas'));
    // }


    /**
     * Edit method
     *
     * @param string|null $id Resposta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($distid = null, $checklistid = null)
    {

        $distribuidor = TableRegistry::get('Distribuidores')->get($distid, [
            'contain' => []
        ]);

        $checklist = TableRegistry::get('Checklists')->get($checklistid, [
            'contain' => ['Linhas', 'Colunas' => ['Respostas', 'Tiporespostas' => ['Opcoesrespostas']]]
        ]);

        // var_dump($checklist->colunas);
        // exit();


        // $resposta = $this->Respostas->get($id, [
        //     'contain' => []
        // ]);
        $respostas = TableRegistry::get('Respostas')->find('all')->where(["distribuidor_id" => $distid, 'checklist_id' => $checklistid]);

        // var_dump($respostas->toArray());
        // exit();

        if ($this->request->is(['patch', 'post', 'put'])) {

            // var_dump($this->request->getData());
            // exit();

            $entities = $this->Respostas->patchEntities($respostas, $this->request->getData());

            // var_dump($entities);
            // exit();

            // $resposta = $this->Respostas->patchEntity($resposta, $this->request->getData());
            if ($this->Respostas->saveMany($entities)) {
                $this->Flash->success("Questionário salvo!");

                return $this->redirect($this->referer());
            }
            $this->Flash->error("Erro ao salvar questionário!");
        }
        // $distribuidores = $this->Respostas->Distribuidores->find('list', ['limit' => 200]);
        $lines = sizeof($checklist->linhas);
        $collumns = sizeof($checklist->colunas);
        $this->set(compact('distribuidor', 'checklist', 'lines', 'collumns', 'respostas'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Resposta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resposta = $this->Respostas->get($id);
        if ($this->Respostas->delete($resposta)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Resposta'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Resposta'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
