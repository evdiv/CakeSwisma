<?php
/**
 * Answer Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Answer extends AppModel {
	public $belongsTo = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'user_id'
            ),
            'Question' => array(
                'className' => 'Question',
                'foreignKey' => 'question_id'
            )
        );
        public $hasMany = array(
            'Comment' => array(
                'className' => 'Comment',
                'foreignKey' => 'answer_id'
            )
        );
}
