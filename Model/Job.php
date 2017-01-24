<?php
App::uses('AppModel', 'Model');

class Job extends AppModel {
    
    public $belongsTo = array(
        'Category' => array(
            'className'     => 'Category',
            'foreign_key' => 'category_id',
        )  
    );
    

    public $validate = array(
        'title' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
        ),
        'description' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
        ),
    );
    
}