<?php
/**
 * CakePHP Model Post
 * @author Eugene
 */
class User extends AppModel {
    public $belongsTo = 'Role';
    public $hasMany = array(
        'Page' => array(
            'className' => 'Page',
            'foreignKey' => 'user_id'
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id'
        ), 
         'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id'
        )     
    );
}

?>
