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
