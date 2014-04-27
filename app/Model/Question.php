<?php
/**
 * CakePHP Model Question
 * @author Eugene
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
}
