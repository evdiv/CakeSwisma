<?php
/**
 * Reviews Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class ReviewsController extends AppController {
    
	public function index() {
            $this->set('reviews', $this->Review->find('all', array(
             'limit' => 10,
             'order' => 'Review.created DESC'
            )));
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->Review->create();
                    if($this->Review->save($this->request->data)) {
                        $this->Session->setFlash(__('The Review has been added'));
                        return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
                    }
                    $this->Session->setFlash(__('Unable to add new review'));                    
            }
        }
        
        public function view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid review'));
            }
            $review = $this->Review->findById($id);
            if(!$review) {
                throw new NotFoundException(__('Invalid review'));
            }
            $this->set('review', $review);  
        }
        
       public function admin_index($id = null) {
           if(!$id) {
                $this->Review->recursive = 1;
                $this->set('reviews', $this->paginate());                  
           } else {
                $this->set('reviews', $this->Review->find('all', array(
                'conditions' => array('Review.clinic_id' => $id),
                'order' => 'Review.created DESC',
           )));
           }
        }
        
        public function admin_view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid review'));
            }
            $review = $this->Review->findById($id);
            if(!$review) {
                throw new NotFoundException(__('Invalid review'));
            }
            $this->set('review', $review);               
        }         
        
        public function admin_disable($id = null) {
             if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
             if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            $review = $this->Review->findById($id);
            if (!$review) {
                throw new NotFoundException(__('Unable find review with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {
                $review['Review']['published'] = 0;
                $this->Review->save($review);
                $this->Session->setFlash('The review has been unpublished');
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
            $review = $this->Review->findById($id);
            if (!$review) {
                throw new NotFoundException(__('Unable find review with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {                
                $review['Review']['published'] = 1;
                $this->Review->save($review);
                $this->Session->setFlash('The review has been published');
                return $this->redirect(array('action' => 'index'));
            }
        }        
        
        public function admin_edit($id = null) { 
            if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            
            $review = $this->Review->findById($id);
            if (!$review) {
                throw new NotFoundException(__('Unable find review with id: %s', h($id)));
            }
            
            if ($this->request->is(array('post', 'put'))) {
                $this->Review->id = $id;
                if ($this->Review->save($this->request->data)) {
                    $this->Session->setFlash(__('Review has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update review.'));
            } else {
               $this->request->data = $review;
            }
        }
        
      public function admin_delete($id) {
         if ($this->request->is('get')) {
             throw new MethodNotAllowedException();
         }
         if(!$id) {
             throw new NotFoundException('Invalid Id');
         }
         if(!$this->Review->findById($id)) {
             throw new NotFoundException('Review with id: %s does\'t exist in the Db', h($id));
         }
             
         if ($this->Review->delete($id, true)) {
             
             $this->Session->setFlash(
                 __('The review with id: %s has been deleted.', h($id))
             );
             return $this->redirect(array('action' => 'index'));
         }
     } 
                
        
}
