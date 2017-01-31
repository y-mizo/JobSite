<?php
App::uses('AppController', 'Controller');
// CakeEmail の場所を指定
App::uses('CakeEmail', 'Network/Email');

class JobsController extends AppController {
    
    public $uses = ['Job', 'Category', 'JobEntry'];
      
    public $components = [
        'Session',
        'Paginator' => [
            'limit' => 5,
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
    
    public function index_front() {
        $this->layout = 'default';
        $this->set('jobs', $this->Paginator->paginate('Job'));
        
        
        
        
        
//        
//        if ($this->request->is(['post'])){
////        if (!empty($this->data)) {
//            $search = $this->data['Search']['keyword'];
//        } else {
//            $search = '';
//        }
//         
//        if ($search) {
//            $conditions = array('OR' => array(
//                    'Job.title LIKE' => "%{$search}%",
//                    'Job.description LIKE' => "%{$search}%"
//            ));
//        } else {
//            $conditions = array();
//        }
//
//        $data = $this->paginate($conditions);
//        $this->set('data', $data);
        
        
        
        
        
        
        
//        検索用の設定
        if ($this->request->is(['post'])){
//            Formのkeywordの値を取得
            $keyword = $this->request->data['Search']['keyword'];
            
            // ---------------
//            $keywords = preg_split('/[\s]+/', $keyword, -1, PREG_SPLIT_NO_EMPTY);
//            foreach($keywords as $key){
//                $conditions[] = "title like '%$key%'";
//                
//            };
//            $data = $this->Paginator->paginate($conditions);
//     $this->set('jobs',$data);
            // ---------------
            // ページネータを使う(タイトル検索のみ)
//            $this->Paginator->settings = array(
//                'conditions' => array(
//                    'title like' => '%' . $keyword . '%'
//                ));
//            $data = $this->Paginator->paginate('Job');
            
            
            
            
            
            $this->Paginator->settings = [
                'limit' => 10,
                'conditions' => [
                    'OR' => [
                        'Job.title LIKE' => '%'. $keyword. '%',
                        'Job.description LIKE' => '%'. $keyword. '%',
                    ],
                ]];
//                
//            $this->request->params['named']['page'] = 1;
//            
//            
//            
//            
//            
//            $data = $this->Paginator->paginate('Job');
//                      echo $this->Session->write('keyword', $keyword); exit;
                      
//            $this->set('keyword', $keyword);
//            $this->request->params['named']['page'] = 1;  
            
            // findで2カラム中から検索      
//            $data = $this->Job->find('all', [
//                'conditions' => [
//                    'OR' => [
//                        'Job.title LIKE' => '%'. $keyword. '%',
//                        'Job.description LIKE' => '%'. $keyword. '%',
//                    ],
//                ]
//            ]);
//              $data = $this->Session->read('keyword');
//              
//              
//              
            // 上でsetしたのと同じように jobs にsetすることで一覧で表示できる。
            $this->set('jobs', $this->Paginator->paginate('Job'));
            
            
            
            
//            if ($this->request->is('post')) {
//            $keyword = $this->request->data['Search']['keyword'];
//            $this->Session->write('keyword', $keyword);
//            $this->set('keyword', $keyword);
//            $this->request->params['named']['page'] = 1;
//
//            if ($keyword == '0') {
//                $this->set('jobs', $this->Paginator->paginate('Job'));
//            } else {
//                $this->set('jobs', $this->Paginator->paginate('Job'));
//            }
//        } else { //post処理以外(フィルターを使ったとき以外)
//            if($this->Session->check('keyword')) {
//                $keyword = $this->Session->read('keyword');
//                if ($keyword == '0') {
//                    $this->set('jobs', $this->Paginator->paginate('Job'));
//                } else { 
//                    $this->set('jobs', $this->Paginator->paginate('Job'));
//                }
//            } else {
//                $this->set('jobs', $this->Paginator->paginate('Job'));
//            }
//        }
//        }
    }
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
        $this->set('job_description', nl2br($job['Job']['description']));  // 改行表示
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
