<?php
/**
 * Category Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Category extends AppModel {
    public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id'
        )
    );
}
