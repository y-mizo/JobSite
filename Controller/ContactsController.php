<?php
App::uses('AppController', 'Controller');
// CakeEmail の場所を指定
App::uses('CakeEmail', 'Network/Email');

class ContactsController extends AppController {

    public $components = ['Session'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'default';
        $this->Auth->allow('contact', 'confirm', 'complete');
    }

    public function contact() {
        if ($this->request->is('post')) {
            $this->Contact->set($this->request->data);

            if (!$this->Contact->validates()) {               
                return;
            }
            // TODO: フォームの内容をセッションに保存
            $this->Session->write('data', $this->request->data);
            // リダイレクト
            $this->redirect(array('action' => 'confirm'));
        }
        // もしセッションに値がセットされていたら読み込む。修正用。
        $this->request->data = $this->Session->read('data');
        // 『フォームに入力後確認ページから戻る→別ページへ移動→入力ページを再表示』を行うと、
        // 入力された内容がフォームに残ってしまうため、ここでセッションを破棄する
        $this->Session->delete('data');
    }

    public function confirm() {
        // セッションが空ならリダイレクト
        if (!$this->Session->read('data')) {
            $this->redirect(array('action' => 'contact'));
        }
        // セッションからフォームの内容を読み込み
        $data = $this->Session->read('data');
        $this->set('data', $this->Session->read('data'));

        if ($this->request->is('post')) {
            //セッションの情報を取得
            $content = ['name' => $data['Contact']['name'],
                'email' => $data['Contact']['email'],
                'body' => $data['Contact']['body']];
            // ここでメール送信
            $Email = new CakeEmail('gmail');
            // 管理者用
            $Email->Config('to_admin')
                    ->viewVars($content)
                    ->send();
            // 利用者用
            $Email->Config('to_customer')
                    ->to($content['email'])
                    ->send();
            // フラッシュメッセージを出すならここで
            // $this->Flash->success('送信できました');
            // リダイレクト
            return $this->redirect(array('action' => 'complete'));
        }
    }

    public function complete() {
        // セッションが空ならリダイレクト
        if (!$this->Session->read('data')) {
            $this->redirect(array('action' => 'contact'));
        }
        // セッションのクリアはここで
        $this->Session->delete('data');
    }

}
