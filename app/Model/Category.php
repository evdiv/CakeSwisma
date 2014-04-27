<?php
/**
 * CakePHP Model Category
 * @author Eugene
 */
class Category extends AppModel {
    public $hasMany = array(
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
