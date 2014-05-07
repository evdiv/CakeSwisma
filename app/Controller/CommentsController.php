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
        
        public function add($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid review'));
            }          
            $this->set('review_id', $id);
            
            //I have now idea yet how make it better
            $this->loadModel('Review');
            $review = $this->Review->find('first', array(
                'conditions' => array(
                    'Review.id' => $id
                )
            ));
            $this->set('review', $review);
            ///////////////////////////////////////////
            
            if($this->request->is('post')) {
                $this->Comment->create();
                if($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash(__('Your Comment has been added'));
                    return $this->redirect(array('controller' => 'clinics', 'action' => 'view', $review['Clinic']['id']));
                }
                $this->Session->setFlash(__('Unable to add your comment'));
            }
        }
}
