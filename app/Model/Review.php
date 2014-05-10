<?php
/**
 * Review Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Review extends AppModel {
    
	public $belongsTo = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'user_id'
            ),
            'Clinic' => array(
                'className' => 'Clinic',
                'foreignKey' => 'clinic_id'
            )
        );
        public $hasMany = array(
            'Comment' => array(
                'className' => 'Comment',
                'foreignKey' => 'review_id'
            )
        );
       
}
