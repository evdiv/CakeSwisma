<?php
/**
 * Clinic Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Clinic extends AppModel {
    
	public $belongsTo = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'user_id'
            )
        );
        public $hasMany = array(
            'Review' => array(
                'className' => 'Review',
                'foreignKey' => 'clinic_id'
             
            ),
            'Comment' => array(
                'className' => 'Comment',
                'foreignKey' => 'clinic_id'
            )
        );
       
}
