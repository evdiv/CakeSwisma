<?php
/**
 * CakePHP Controller PostsController
 * @author Eugene
 */
class PostsController extends AppController {
	public function index() {
            $this->set('posts', $this->Post->find('all', array(
             'limit' => 10,
             'order' => 'Post.created DESC'
            )));
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->Post->create();
                if($this->Post->save($this->request->data)) {
                    $this->Session->setFlash(__('The Post has been added'));
                    return $this->redirect(array('action' => 'all'));
                }
                $this->Session->setFlash(__('Unable to add new post'));
            }
            $this->set('categories', $this->Post->Category->find('list'));
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
        }
}
