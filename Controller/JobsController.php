<?php
App::uses('AppController', 'Controller');
// CakeEmail の場所を指定
App::uses('CakeEmail', 'Network/Email');

class JobsController extends AppController {
    

    public $uses = ['Job', 'Category'];
      
    public $components = [
        'Session',
        'Paginator' => [
            'limit' => 5,
            'order' => ['id' => 'asc']
        ]
    ];
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        $this->Auth->allow('logout', 'view_front', 'entry', 'entry_confirm', 'entry_complete');
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
    
    private function getCategoryList() {
        return $this->Category->find('list', array( 
            'fields' => array(
                'id', 'name'
        )));        
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
    
    // エントリー
    public function entry($id = null) {
        // 仕事情報を読み込み
        $this->layout = 'front';
                if (!$this->Job->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        $job = $this->Job->findById($id);
//        $this->set('job_description', nl2br($job['Job']['description']));  // 改行表示
        $this->set('job', $job);
        // ここまで
        
        if ($this->request->is('post')) {
            $this->Job->set($this->request->data);

//            if (!$this->Job->validates()) {
//                return;
//            }
            // TODO: フォームの内容をセッションに保存
            $this->Session->write('data', $this->request->data);
            // リダイレクト
            $this->redirect(array('action' => 'entry_confirm'));
        }
        // もしセッションに値がセットされていたら読み込む。修正用。
        $this->request->data = $this->Session->read('data');
        // 『フォームに入力後確認ページから戻る→別ページへ移動→入力ページを再表示』を行うと、
        // 入力された内容がフォームに残ってしまうため、ここでセッションを破棄する
        $this->Session->delete('data');
        
    }
    
    public function entry_confirm($id = null) {
        $this->layout = 'front';

        
        // セッションが空ならリダイレクト
        if (!$this->Session->read('data')) {
            $this->redirect(array('action' => 'entry'));
        }
        // セッションからフォームの内容を読み込み
        $data = $this->Session->read('data');
        $this->set('data', $this->Session->read('data'));

        if ($this->request->is('post')) {
            //セッションの情報を取得
            $content = ['id' => $data['Job_entry']['id'],
                'title' => $data['Job_entry']['title'],
                'name' => $data['Job_entry']['name'],
                'email' => $data['Job_entry']['email']];
            
            // ここでメール送信
            $Email = new CakeEmail('gmail');
            // 管理者用
            $Email->Config('to_job_admin')
                    ->viewVars($content)
                    ->send();
            // 利用者用
            $Email->Config('to_job_customer')
                    ->to($content['email'])
                    ->send();
            // フラッシュメッセージを出すならここで
            // $this->Flash->success('送信できました');
            // リダイレクト
            return $this->redirect(array('action' => 'entry_complete'));
        }
        
    }
    
    public function entry_complete() {
        $this->layout = 'front';
        // セッションが空ならリダイレクト
        if (!$this->Session->read('data')) {
            $this->redirect(array('action' => 'entry'));
        }
        // セッションのクリアはここで
        $this->Session->delete('data');
    }
}
