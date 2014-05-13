<?php
/**
 * Category Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Category extends AppModel {
    public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id'
        )
    );
       public $validate = array(
        'title' => array(
             'rule' => array('custom', '/^[a-z A-Z]{1,255}$/i'),
             'required'   => 'create',
             'message' => 'Category title must contain only letters and be maximum 255 characters long'
        ),
         'description' => array(
             'rule' => 'notEmpty',
             'message' => 'Description must not be empty.'
         )
    );
    
}
