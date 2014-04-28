<?php
/**
 * CakePHP Controller CommentsController
 * @author Eugene
 */
class CommentsController extends AppController {
        
        public function add($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid answer'));
            }          
            $this->set('answer_id', $id);
            
            //I have now idea yet how make it better
            $this->loadModel('Answer');
            $answer = $this->Answer->find('first', array(
                'conditions' => array(
                    'Answer.id' => $id
                )
            ));
            $this->set('answer', $answer);
            //----
            
            if($this->request->is('post')) {
                $this->Comment->create();
                if($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash(__('Your Comment has been added'));
                    return $this->redirect(array('controller' => 'questions', 'action' => 'view', $answer['Question']['id']));
                }
                $this->Session->setFlash(__('Unable to add your comment'));
            }
        }
}
