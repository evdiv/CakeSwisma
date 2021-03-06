<?php
/**
 * Page Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Page extends AppModel {
    public $belongsTo = 'User';
   
    public $validate = array(
        'title' => array(
             'rule' => 'notEmpty',
             'message' => 'Title must not be empty.'
        ),         
        'content' => array(
             'rule' => 'notEmpty',
             'message' => 'Content must not be empty.'
         )       
    );
}
?>
