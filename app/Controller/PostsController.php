<?php
/**
 * Posts Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class PostsController extends AppController {
    
	public function admin_index() {
            $this->set('posts', $this->Post->find('all', array(
             'limit' => 10,
             'order' => 'Post.created DESC'
            )));
        }
        
        public function admin_add() {
            if($this->request->is('post')) {
                $this->Post->create();
                if($this->Post->save($this->request->data)) {
                    $this->Session->setFlash(__('The Post has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new post'));
            }
            $this->set('categories', $this->Post->Category->find('list'));
        }
        
        public function admin_disable($id = null) {
             if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
             if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            $post = $this->Post->findById($id);
            if (!$post) {
                throw new NotFoundException(__('Unable find post with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {               
                $post['Post']['published'] = 0;
                $this->Post->save($post);
                $this->Session->setFlash('The post has been unpublished');
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
            $post = $this->Post->findById($id);
            if (!$post) {
                throw new NotFoundException(__('Unable find post with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {                
                $post['Post']['published'] = 1;
                $this->Post->save($post);
                $this->Session->setFlash('The post has been published');
                return $this->redirect(array('action' => 'index'));
            }
        }        
        
       public function admin_edit($id = null) { 
            if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            
            $post = $this->Post->findById($id);
            if (!$post) {
                throw new NotFoundException(__('Unable find post with id: %s', h($id)));
            }
            
            if ($this->request->is(array('post', 'put'))) {
                $this->Post->id = $id;
                if ($this->Post->save($this->request->data)) {
                    $this->Session->setFlash(__('Post has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update post.'));
            } else {
                
               $this->request->data = $post;
            }
        }
        
      public function admin_delete($id) {
         if ($this->request->is('get')) {
             throw new MethodNotAllowedException();
         }
         if(!$id) {
             throw new NotFoundException('Invalid Id');
         }
         if(!$this->Post->findById($id)) {
             throw new NotFoundException('Post with id: %s does\'t exist in the Db', h($id));
         }
             
         if ($this->Post->delete($id)) {
             $this->Session->setFlash(
                 __('The post with id: %s has been deleted.', h($id))
             );
             return $this->redirect(array('action' => 'index'));
         }
     }
        
        public function view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid post'));
            }
            $post = $this->Post->findById($id);
            if(!$post) {
                throw new NotFoundException(__('Invalid post'));
            }
            $this->set('post', $post); 
            $this->Post->updateViews($post);
        }
}
