<?php
/**
 * Role Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Role extends AppModel {
	public $hasMany = 'User';
        
}
