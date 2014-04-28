<?php
/**
 * Question Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Question extends AppModel {
	public $belongsTo = array(
            'Category' => array(
                'className' => 'Category',
                'foreignKey' => 'category_id'
            ),
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'user_id'
            )
        );
        public $hasMany = array(
            'Answer' => array(
                'className' => 'Answer',
                'foreignKey' => 'question_id'
             
            )
        );
}
