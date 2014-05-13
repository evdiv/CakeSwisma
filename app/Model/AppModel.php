<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    
    //Strip all tags from forms
    public function beforeSave($options = array())
{
    if(!parent::beforeSave($options))
    {
        return false;
    }

     if(!empty($this->data[$this->alias]['title']))
    {
        $this->data[$this->alias]['title'] = strip_tags($this->data[$this->alias]['title']);
    }
    
    if(!empty($this->data[$this->alias]['description']))
    {
        $this->data[$this->alias]['description'] = strip_tags($this->data[$this->alias]['description']);
    }
    
    if(!empty($this->data[$this->alias]['content']))
    {
        $this->data[$this->alias]['content'] = strip_tags($this->data[$this->alias]['content']);
    }    

     if(!empty($this->data[$this->alias]['email']))
    {
        $this->data[$this->alias]['email'] = strip_tags($this->data[$this->alias]['email']);
    }  
    
     if(!empty($this->data[$this->alias]['website']))
    {
        $this->data[$this->alias]['website'] = strip_tags($this->data[$this->alias]['website']);
    }   
    return true;
}
}
