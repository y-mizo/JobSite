<?php
App::uses('AppController', 'Controller');
// CakeEmail の場所を指定
App::uses('CakeEmail', 'Network/Email');

class JobEntriesController extends AppController {
    
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
        $this->Auth->allow('entry', 'entry_confirm', 'entry_complete');
    }
    
    // エントリー
    public function entry($id = null) {
        $this->layout = 'front';
        
        // 仕事情報を読み込み
        if (!$this->Job->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        $job = $this->Job->findById($id);
//        $this->set('job_description', nl2br($job['Job']['description']));  // 改行表示
        $this->set('job', $job);
        // ここまで
//        echo "000<br>";
        // バリデーション後に戻ってきた時、情報はpostではなくputになるため、両方定義する
        if ($this->request->is(['post', 'put'])) {
//            echo "123<br>";
            $this->JobEntry->set($this->request->data);

            if (!$this->JobEntry->validates()) {
//            echo "456<br>";
                return;
                
            } else {
                // TODO: フォームの内容をセッションに保存
                $this->Session->write('data', $this->request->data);
                // リダイレクト
                $this->redirect(array('action' => 'entry_confirm'));
            }
            
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
            $content = ['id' => $data['JobEntry']['id'],
                'title' => $data['JobEntry']['title'],
                'name' => $data['JobEntry']['name'],
                'email' => $data['JobEntry']['email']];
            
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