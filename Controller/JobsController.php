<?php

class JobsController extends AppController {

    public $uses = ['Category', 'Job'];
      
    public $components = [
        'Paginator' => [
            'limit' => 5,
            'order' => ['id' => 'asc']
        ]
    ];
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        $this->Auth->allow('logout', 'view_front');
    }
    
    public function isAuthorized($user) {
        
        $action = $this->request->params['action'];
        if (in_array($action, ['index', 'view', 'add', 'edit', 'delete'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }
    
    public function index() {
//        $this->Job->recursive = 0;
//        var_dump($this->Paginator->paginate());
//        exit;
        $this->set('jobs', $this->Paginator->paginate());
        
    }
    
    public function index_front() {
        $this->layout = 'front';
        $this->set('jobs', $this->Paginator->paginate());
        
    }
    
    public function view($id = null) {
        if (!$this->Job->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        $job = $this->Job->findById($id);
        $this->set('job_description', nl2br($job['Job']['description']));  // 改行表示
        $this->set('job', $job);
    }
    
    public function view_front($id = null) {
        $this->layout = 'front';
        if (!$this->Job->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        $job = $this->Job->findById($id);
        $this->set('job_description', nl2br($job['Job']['description']));  // 改行表示
        $this->set('job', $job);
    }
    
    public function add() {
            $this->set('category_list', $this->Category->find('list', array( 
                'fields' => array(
                    'id', 'name'
            ))));
            
        if ($this->request->is('post')) {
            $this->Job->create();
            if ($this->Job->save($this->request->data)) {
                $this->Flash->success('登録しました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('失敗しました。もう一度トライしてください。');
            }
        }
        
    }
    
    public function edit($id = null) {
        
        if (!$this->Job->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Job->save($this->request->data)) {
                $this->Flash->success('更新できました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('もう一度お願いします');
            }
        } else {
            $options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
            $this->request->data = $this->Job->find('first', $options);
        }
        
    }
    
    public function delete($id = null) {
        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            throw new NotFoundException('ありません');
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Job->delete()) {
            $this->Flash->success('削除しました');
        } else {
            $this->Flash->error('削除できませんでした、もう一度トライしてください');
        }
        return $this->redirect(array('action' => 'index'));
        
    }
    
    
    
    
    
}