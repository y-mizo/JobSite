<?php
class Contact extends AppModel {
    public $useTable = false;
    
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 100),
                'message' => '100文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        'email' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'メールアドレス以外が入力されています。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        'body' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 2500),
                'message' => '2500文字以内で入力してくだい。',
                'required' => true,
            ),           
        ),
    );
}