<?php
App::uses('AppModel', 'Model');

class Job extends AppModel {
    
    public $belongsTo = array(
        'Category' => array(
            'className'     => 'Category',
            'foreign_key' => 'category_id',
        )  
    );
      
//    public $validate = array(
//        'name' => array(
//            'notBlank' => array(
//                'rule' => array('notBlank'),
//                'message' => '未入力です。',
//                'required' => true,
//            ),
//            'maxLength' => array(
//                'rule' => array('maxLength', 100),
//                'message' => '100文字以内で入力してくだい。',
//                'required' => true,
//            ),
//        ),
//        'email' => array(
//            'notBlank' => array(
//                'rule' => array('notBlank'),
//                'message' => '未入力です。',
//                'required' => true,
//            ),
//            'email' => array(
//                'rule' => array('email'),
//                'message' => 'メールアドレス以外が入力されています。',
//                'required' => true,
//            ),
//            'maxLength' => array(
//                'rule' => array('maxLength', 255),
//                'message' => '255文字以内で入力してくだい。',
//                'required' => true,
//            ),
//        ),
//    );
      
    
    
}