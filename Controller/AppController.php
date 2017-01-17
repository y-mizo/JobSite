<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public function beforeFilter() {
        $this->set('currentUser', $this->Auth->user());
        $this->Auth->allow('login','index_front');
    }

    public $components = [
        'DebugKit.Toolbar',
        'Flash',
        'Auth' => [
//             start boostcake
            'flash' => array(
                'element' => 'alert',
                'key' => 'auth',
                'params' => array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-error'
                )
            ),
            // end boostcake
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'UserModel' => 'User',
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password',
                    ],
                    'passwordHasher' => 'Blowfish',
                ]
            ],
            'authorize' => [
                'Controller'
            ],
            'loginRedirect' => [
                'controller' => 'admins',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'pages',
                'action' => '/'
            ],
            'authError' => 'Please log in.',
        ],
    ];

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        return false;
    }

    // boostcake
    public $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );

}
