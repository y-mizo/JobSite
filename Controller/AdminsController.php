<?php

class AdminsController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }
    
    public function isAuthorized($user) {
        
        $action = $this->request->params['action'];
        if (in_array($action, ['index'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }
    

    
    public function index() {
       
        
    }
}