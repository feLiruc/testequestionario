<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Checklists Controller
 *
 * @property \App\Model\Table\ChecklistsTable $Checklists
 *
 * @method \App\Model\Entity\Checklist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChecklistsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $checklists = $this->paginate($this->Checklists);

        $this->set(compact('checklists'));
    }

    /**
     * View method
     *
     * @param string|null $id Checklist id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $checklist = $this->Checklists->get($id, [
            'contain' => ['Colunas', 'Linhas']
        ]);

        $this->set('checklist', $checklist);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($lines = 10, $collumns = 3)
    {
        $checklist = $this->Checklists->newEntity();
        if ($this->request->is('post')) {
            $checklist = $this->Checklists->patchEntity($checklist, $this->request->getData());
            if ($this->Checklists->save($checklist)) {
                $this->Flash->success(__('The {0} has been saved.', 'Checklist'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Checklist'));
        }
        $tiporespostas = TableRegistry::get('tiporespostas')->find('list');
        
        $this->set(compact('checklist', 'tiporespostas', 'lines', 'collumns'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Checklist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $lines = 10, $collumns = 3)
    {
        $checklist = $this->Checklists->get($id, [
            'contain' => ['Linhas', 'Colunas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checklist = $this->Checklists->patchEntity($checklist, $this->request->getData());
            if ($this->Checklists->save($checklist)) {
                $this->Flash->success(__('The {0} has been saved.', 'Checklist'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Checklist'));
        }
        $lines = sizeof($checklist->linhas);
        $collumns = sizeof($checklist->colunas);
        $tiporespostas = TableRegistry::get('tiporespostas')->find('list');
        
        $this->set(compact('checklist', 'tiporespostas', 'lines', 'collumns'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Checklist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $checklist = $this->Checklists->get($id);
        if ($this->Checklists->delete($checklist)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Checklist'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Checklist'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
