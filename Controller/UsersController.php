<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        $this->Auth->allow('logout');
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if (in_array($action, ['index', 'home', 'changePassword'])) {
//        if ($this->action === 'home') {
            return true;
        }

        return parent::isAuthorized($user);
    }

    /**
     * Components
     *
     * @var array
     */
//    public $components = array('Paginator');

    public $components = [
        'Paginator' => [
            'limit' => 5,
            'order' => ['id' => 'asc']
        ]
    ];

    /**
     * index method
     *
     * @return void
     */

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    // login
    public function login() {
        $this->layout = "basic";
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                $this->redirect(['controller' => 'admins', 'action' => 'index']);
            }

            $this->Flash->error('Username or password is incorrect');
        }
    }

    // logout
    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function changePassword() {
            if ($this->request->is(['post', 'put'])) {

                if ($this->User->save($this->request->data)) {
                    $this->Flash->success('パスワードを更新しました');

                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                $this->request->data = ['User' => ['id' => $this->Auth->user('id')]];
            }
    }
    
}
