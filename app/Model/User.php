<?php
/**
 * User Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
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
            'foreignKey' => 'user_id'
        ),
        'Answer' => array(
            'className' => 'Answer',
            'foreignKey' => 'user_id'
        ),
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'user_id'
        )
    );
}

?>
