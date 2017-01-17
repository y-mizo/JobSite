<?php
//App::uses('AppModel', 'Model');

class Notice extends AppModel {
    
    public $validate = [
        'subject' => [
            'rule' => 'notBlank',
            'message' => '未入力です',
        ],
        'category' => [
            'rule' => 'notBlank',
            'message' => '未入力です',
        ],
        'body' => [
            'rule' => 'notBlank',
            'message' => '未入力です',
        ]
    ];
    
}