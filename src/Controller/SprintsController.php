<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

/**
 * Sprints Controller
 *
 * @property \App\Model\Table\SprintsTable $Sprints
 *
 * @method \App\Model\Entity\Sprint[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SprintsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        if(!$this->Auth->user())
          return $this->redirect('/users/login');
        $this->set('loggedIn', $this->Auth->user());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $sprints = $this->paginate($this->Sprints);

        // $this->set(compact('sprints'));
    }

    /**
     * View method
     *
     * @param string|null $id Sprint id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sprint = $this->Sprints->get($id, [
            'contain' => ['Projects', 'Activities']
        ]);

        $this->set('sprint', $sprint);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sprint = $this->Sprints->newEntity();
        if ($this->request->is('post')) {
            $sprint = $this->Sprints->patchEntity($sprint, $this->request->getData());
            if ($this->Sprints->save($sprint)) {
                $this->Flash->success(__('The sprint has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The sprint could not be saved. Please, try again.'));
        }
        return $this->redirect($this->referer());
        $projects = $this->Sprints->Projects->find('list', ['limit' => 200]);
        $this->set(compact('sprint', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sprint id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sprint = $this->Sprints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sprint = $this->Sprints->patchEntity($sprint, $this->request->getData());
            if ($this->Sprints->save($sprint)) {
                $this->Flash->success(__('The sprint has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The sprint could not be saved. Please, try again.'));
        }
        $projects = $this->Sprints->Projects->find('list', ['limit' => 200]);
        $this->set(compact('sprint', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sprint id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sprint = $this->Sprints->get($id);
        if ($this->Sprints->delete($sprint)) {
            $this->Flash->success(__('The sprint has been deleted.'));
        } else {
            $this->Flash->error(__('The sprint could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());
    }
}
