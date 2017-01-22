<?php

class CategoriesController extends AppController {
    
    public $uses = ['Category', 'Job'];
    

    
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }
    
//    public function isAuthorized($user) {
//        
//        $action = $this->request->params['action'];
//        if (in_array($action, ['index', 'view', 'add', 'edit', 'delete'])) {
//            return true;
//        }
//
//        return parent::isAuthorized($user);
//    }
    
    public $components = [
        'Paginator' => [
            'limit' => 5,
            'order' => ['modified' => 'desc']
        ]
    ];
    
    public function index() {
        $this->set('categories', $this->Paginator->paginate());

        
    }
//    
//    public function view($id = null) {
//        if (!$this->Category->exists($id)) {
//            throw new NotFoundException('お知らせは見つかりません');
//        }
//        $category = $this->Category->findById($id);
////        echo var_dump($category); 
////        echo nl2br($category['Category']['body']);
////        exit;
//        $this->set('category_body', nl2br($category['Category']['body']));  // 改行表示
//        $this->set('category', $category);
//        
//    }
//    
    public function add() {
        if ($this->request->is('post')) {
//            $this->request->data['Category']['body'] = nl2br($this->request->data['Category']['body']);
        
            $this->Category->create();
            
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success('登録しました');
                return $this->redirect(['action' => 'index']);
            }
        }

        
    }
    
    public function edit($id =null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException('見つかりません');
            
        }
        
        if ($this->request->is(['post', 'put'])) {
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success('更新しました');
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->request->data = $this->Category->findById($id);
        }
        
    }
    
    public function delete($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException('見つかりません');
            
        }
        
        $this->request->allowMethod('post','delete');
        
        if ($this->Category->delete($id)) {
            $this->Flash->success('削除しました');
            
        } else {
            $this->Flash->error('削除できませんでした');
            
        }
        
        return $this->redirect(['action' => 'index']);
        
    }
}