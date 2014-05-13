<?php
/**
 * Post Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Post extends AppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );
    public $validate = array(
        'title' => array(
             'rule' => 'notEmpty',
             'message' => 'Title must not be empty.'
        ),         
        'content' => array(
             'rule' => 'notEmpty',
             'message' => 'Content must not be empty.'
         )          
    );
    
    public function updateViews($post) {
            //Get post Id from the Array $post
            $postId = Set::extract('/Post/id', $post);

            //Update post view in the DB
            $this->updateAll(
                    array(
                            'Post.views' => 'Post.views + 1',
                    ),
                    array('Post.id' => $postId)
            );
    } 
}
