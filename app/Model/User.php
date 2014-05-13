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
    public $hasMany = array(
        'Page' => array(
            'className' => 'Page',
            'foreignKey' => 'user_id'
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id'
        ), 
         'Clinic' => array(
            'className' => 'Clinic',
            'foreignKey' => 'user_id'
        ),
        'Review' => array(
            'className' => 'Review',
            'foreignKey' => 'user_id'
        ),
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'user_id'
        )
    );
    public $validate = array(
        'username' => array(
            'unique' => array(
            'rule' => 'isUnique',
            'required' => 'create',
            'message' => 'This username is already used'   
        ),
        'alphanumeric' => array(
            'rule' => 'alphanumeric'
        )),
        'password' => array(
             'rule' => array('custom', '/^[a-z A-Z 0-9]{1,10}$/i'),
             'required'   => 'create',
             'message' => 'Password must contain only letters and digits and be maximum 10 characters long'
        ),      
        'full_name' => array(
             'rule' => array('custom', '/^[a-z A-Z]{1,255}$/i'),
             'required'   => 'create',
             'message' => 'Category title must contain only letters and be maximum 255 characters long'
        ),
        'email' => array(
             'rule' => 'notEmpty',
             'message' => 'Email must not be empty.'
         ),
        'description' => array(
             'rule' => 'notEmpty',
             'message' => 'Description must not be empty.'
         )        
    );
           
    public function beforeSave($options = array()) {
        if(isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            return true; 
        } else {
            return false;
        }
    }
    
    
}

?>
