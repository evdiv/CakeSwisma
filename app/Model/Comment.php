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
            'Answer' => array(
               'className' => 'Answer',
                'foreignKey' => 'answer_id'
            ),
            'Question' => array(
                'className' => 'Question',
                'foreignKey' => 'question_id'
            )
        );
}
