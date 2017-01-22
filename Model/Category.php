<?php
//App::uses('AppModel', 'Model');

class Category extends AppModel {
        public $hasMany = array(
        'Job' => array(
            'className' => 'Job',
//            'conditions' => array('Comment.status' => '1'),
//            'order' => 'Comment.created DESC',
//            'limit' => '5',
//            'dependent' => true
        )
    );
    
    
}