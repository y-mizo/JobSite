<?php
App::uses('AppController', 'Controller');
// CakeEmail の場所を指定
App::uses('CakeEmail', 'Network/Email');

class JobsController extends AppController {
    
    public $uses = ['Job', 'Category', 'JobEntry'];
      
    public $components = [
        'Session',
        'Paginator' => [
            'limit' => 3,
            'order' => ['modified' => 'desc']
        ]
    ];
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        $this->Auth->allow('index_front', 'view_front', 'search');
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
        $this->set('jobs', $this->Paginator->paginate('Job'));
              
    }
    
    public function index_front($keyword = null) {
        $this->layout = 'default';
        
        $keyword = isset($this->request->query['keyword']) ? trim($this->request->query['keyword']) : '';
        $conditions = [];
        
        if (!empty($keyword)){
            $conditions = [
                'OR' => [
                    'Job.title LIKE' => '%'. $keyword. '%',
                    'Job.description LIKE' => '%'. $keyword. '%',
                    'Category.name LIKE' => '%'. $keyword. '%',               
                ],
            ];
        }
        // pagenate を call
        $data = $this->Paginator->paginate('Job', $conditions);
        
        $this->set('keyword', $keyword);  // 「◯◯の検索結果です」の表示制御の為ビューに渡す
        $this->set('jobs', $data);
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
        $this->layout = 'default';
        if (!$this->Job->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        $job = $this->Job->findById($id);
        $this->set('job_description', nl2br(h($job['Job']['description'])));  // 改行表示
        $this->set('job', $job);
    }
    
    public function add() {
        

        if ($this->request->is('post')) {
            $this->Job->create();
                    
            if ($this->Job->save($this->request->data)) {
//                var_dump($this->request->data);
//        exit;
                $this->Flash->success('登録しました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('失敗しました。もう一度トライしてください。');
            }
        }
        $this->set('category_list', $this->getCategoryList());
        
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
        $this->set('category_list', $this->getCategoryList());
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
    
//    public function search() {
//        $this->layout = 'default';
//        
//    }

    // ---------- private --------------
    
    private function getCategoryList() {
        return $this->Category->find('list', array( 
            'fields' => array(
                'id', 'name'
        )));        
    }
    
}
