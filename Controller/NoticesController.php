<?php

class NoticesController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }
    
    public function isAuthorized($user) {
        
        $action = $this->request->params['action'];
        if (in_array($action, ['index', 'view', 'add', 'edit', 'delete'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }
    
    public $components = [
        'Paginator' => [
            'limit' => 5,
            'order' => ['modified' => 'desc']
        ]
    ];
    
    public function index() {
        $this->set('notices', $this->Paginator->paginate());
        
    }
    
    public function index_front() {
        $this->layout = 'front';
        $this->set('notices', $this->Paginator->paginate());
        
    }
    
    public function view($id = null) {
        if (!$this->Notice->exists($id)) {
            throw new NotFoundException('お知らせは見つかりません');
        }
        $notice = $this->Notice->findById($id);
//        echo var_dump($notice); 
//        echo nl2br($notice['Notice']['body']);
//        exit;
        $this->set('notice_body', nl2br($notice['Notice']['body']));  // 改行表示
        $this->set('notice', $notice);
        
    }
    
    public function add() {
        if ($this->request->is('post')) {
//            $this->request->data['Notice']['body'] = nl2br($this->request->data['Notice']['body']);
        
            $this->Notice->create();
            
            if ($this->Notice->save($this->request->data)) {
                $this->Flash->success('登録しました');
                return $this->redirect(['action' => 'index']);
            }
        }
        
    }
    
    public function edit($id =null) {
        if (!$this->Notice->exists($id)) {
            throw new NotFoundException('お知らせは見つかりません');
            
        }
        
        if ($this->request->is(['post', 'put'])) {
            if ($this->Notice->save($this->request->data)) {
                $this->Flash->success('お知らせを更新しました');
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->request->data = $this->Notice->findById($id);
        }
        
    }
    
    public function delete($id = null) {
        if (!$this->Notice->exists($id)) {
            throw new NotFoundException('お知らせが見つかりません');
            
        }
        
        $this->request->allowMethod('post','delete');
        
        if ($this->Notice->delete($id)) {
            $this->Flash->success('お知らせを削除しました');
            
        } else {
            $this->Flash->error('お知らせを削除できませんでした');
            
        }
        
        return $this->redirect(['action' => 'index']);
        
    }
}