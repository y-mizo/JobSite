<?php
App::uses('AppModel', 'Model');

class Job extends AppModel {
    
    public $belongsTo = array(
        'Category' => array(
            'className'     => 'Category',
            // 'foreign_key' => 'category_id',
            // https://book.cakephp.org/2.0/ja/models/associations-linking-models-together.html
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