<?php
//App::uses('AppModel', 'Model');

class Job extends AppModel {
    
      public $belongsTo = array(
        'Category' => array(
            'className'     => 'Category',
            'foreign_key' => 'category_id',
        )  
     );
      
    
    
}