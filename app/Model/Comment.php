<?php
/**
 * Comment Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Comment extends AppModel {
	public $belongsTo = array(
            'Review' => array(
               'className' => 'Review',
                'foreignKey' => 'review_id'
            ),
            'Clinic' => array(
                'className' => 'Clinic',
                'foreignKey' => 'clinic_id'
            ),
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'user_id'
            )
        );
       public $validate = array(
        'content' => array(
             'rule' => 'notEmpty',
             'message' => 'Comment must not be empty.'
         )        
    );
      
}
