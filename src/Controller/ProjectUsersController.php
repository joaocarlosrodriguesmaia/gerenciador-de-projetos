<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

/**
 * ProjectUsers Controller
 *
 * @property \App\Model\Table\ProjectUsersTable $ProjectUsers
 *
 * @method \App\Model\Entity\ProjectUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectUsersController extends AppController
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
            'contain' => ['Projects', 'Users']
        ];
        $projectUsers = $this->paginate($this->ProjectUsers);

        // $this->set(compact('projectUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Project User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectUser = $this->ProjectUsers->get($id, [
            'contain' => ['Projects', 'Users']
        ]);

        // $this->set('projectUser', $projectUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectUser = $this->ProjectUsers->newEntity();
        if ($this->request->is('post')) {
            $projectUser = $this->ProjectUsers->patchEntity($projectUser, $this->request->getData());
            if ($this->ProjectUsers->save($projectUser)) {
                $this->Flash->success(__('The project user has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The project user could not be saved. Please, try again.'));
        }
        return $this->redirect($this->referer());
        $projects = $this->ProjectUsers->Projects->find('list', ['limit' => 200]);
        $users = $this->ProjectUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('projectUser', 'projects', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectUser = $this->ProjectUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectUser = $this->ProjectUsers->patchEntity($projectUser, $this->request->getData());
            if ($this->ProjectUsers->save($projectUser)) {
                $this->Flash->success(__('The project user has been saved.'));

                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project user could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectUsers->Projects->find('list', ['limit' => 200]);
        $users = $this->ProjectUsers->Users->find('list', ['limit' => 200]);
        // $this->set(compact('projectUser', 'projects', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectUser = $this->ProjectUsers->get($id);
        if ($this->ProjectUsers->delete($projectUser)) {
            $this->Flash->success(__('The project user has been deleted.'));
        } else {
            $this->Flash->error(__('The project user could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
    }
}
