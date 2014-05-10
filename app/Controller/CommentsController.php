<?php
/**
 * Comments Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class CommentsController extends AppController {
     
        public function admin_index($id = null) {
           if(!$id) {
            $this->Comment->recursive = 1;
            $this->set('comments', $this->paginate());              
           } else {    
             $this->Paginator->settings =  array(
             'conditions' => array('Comment.review_id' => $id),
             'order' => 'Comment.created DESC',
             );
             $comments = $this->Paginator->paginate('Comment');
             $this->set(compact('comments'));
             
           }
        }
        public function admin_disable($id = null) {
             if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
             if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            $comment = $this->Comment->findById($id);
            if (!$comment) {
                throw new NotFoundException(__('Unable find comment with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {
                $comment['Comment']['published'] = 0;
                $this->Comment->save($comment);
                $this->Session->setFlash('The comment has been unpublished');
                return $this->redirect(array('action' => 'index'));
            }
        }

        public function admin_enable($id = null) {
             if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
             if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            $comment = $this->Comment->findById($id);
            if (!$comment) {
                throw new NotFoundException(__('Unable find comment with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {                
                $comment['Comment']['published'] = 1;
                $this->Comment->save($comment);
                $this->Session->setFlash('The comment has been published');
                return $this->redirect(array('action' => 'index'));
            }
        }        
        
        public function admin_edit($id = null) { 
            if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            
            $comment = $this->Comment->findById($id);
            if (!$comment) {
                throw new NotFoundException(__('Unable find comment with id: %s', h($id)));
            }
            
            if ($this->request->is(array('post', 'put'))) {
                $this->Comment->id = $id;
                if ($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash(__('Comment has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update comment.'));
            } else {
               $this->request->data = $comment;
            }
        }
        
      public function admin_delete($id) {
         if ($this->request->is('get')) {
             throw new MethodNotAllowedException();
         }
         if(!$id) {
             throw new NotFoundException('Invalid Id');
         }
         if(!$this->Comment->findById($id)) {
             throw new NotFoundException('Comment with id: %s does\'t exist in the Db', h($id));
         }
             
         if ($this->Comment->delete($id, true)) {
             
             $this->Session->setFlash(
                 __('The comment with id: %s has been deleted.', h($id))
             );
             return $this->redirect(array('action' => 'index'));
         }
     }      
}
