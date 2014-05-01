<?php
/**
 * CakePHP Controller QuestionsController
 * @author Eugene
 */
class QuestionsController extends AppController {
	public function index() {
            $this->set('questions', $this->Question->find('all', array(
             'limit' => 10,
             'order' => 'Question.created DESC'
            )));
            if($this->request->is('post')) {
                $this->Question->create();
                if($this->Question->save($this->request->data)) {
                    $this->Session->setFlash(__('The Question has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new question'));
            }
            $this->set('categories', $this->Question->Category->find('list'));
        }
        
        public function view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid question'));
            }
            $question = $this->Question->findById($id);
            if(!$question) {
                throw new NotFoundException(__('Invalid question'));
            }
            if($this->request->is('post')) {
                if(isset($this->request->data['Answer'])) {
                    $this->Question->Answer->create();
                        if($this->Question->Answer->save($this->request->data)) {
                            $this->Session->setFlash(__('Your Answer has been added'));
                            return $this->redirect(array('action' => 'view', $id));  
                        }
                        $this->Session->setFlash(__('Unable to add Answer'));
                        
                }elseif (isset($this->request->data['Comment'])) {
                    $this->Question->Answer->Comment->create();
                        if($this->Question->Answer->Comment->save($this->request->data)) {
                            $this->Session->setFlash(__('Your Comment has been added'));
                            return $this->redirect(array('action' => 'view', $id));  
                        }
                        $this->Session->setFlash(__('Unable to add Comment'));
                 }
            }
            $this->set('question', $question);               
        }
}
