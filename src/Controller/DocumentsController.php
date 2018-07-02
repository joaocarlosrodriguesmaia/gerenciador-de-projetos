<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 *
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
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
        $documents = $this->paginate($this->Documents);

        // $this->set(compact('documents'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => ['Projects']
        ]);

        // $this->set('document', $document);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $document = $this->Documents->newEntity();
        if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name']))
            {
                $fileName = $this->request->data['file']['name'];
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                $fileName = date('YmdHis').'.'.$extension;
                $uploadPatch = 'img/uploads/';
                $uploadFile = $uploadPatch.$fileName;
                if(move_uploaded_file($this->request->data['file']['tmp_name'],WWW_ROOT.$uploadFile))
                {
                    $this->request->data['file'] = $fileName;
                }
            }
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('O documento não pôde ser salvo. Por favor, tente novamente.'));
        }
        return $this->redirect($this->referer());
        $projects = $this->Documents->Projects->find('list', ['limit' => 200]);
        $this->set(compact('document', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $projects = $this->Documents->Projects->find('list', ['limit' => 200]);
        $this->set(compact('document', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        $file = new File(WWW_ROOT .'/img/uploads/'. $document->file, false, 0777);
        if($file->delete()) {
          if ($this->Documents->delete($document)) {
              $this->Flash->success(__('The document has been deleted.'));
          } else {
              $this->Flash->error(__('The document could not be deleted. Please, try again.'));
          }
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());
    }
}
