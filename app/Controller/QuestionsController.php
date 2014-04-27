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
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->Question->create();
                if($this->Question->save($this->request->data)) {
                    $this->Session->setFlash(__('The Question has been added'));
                    return $this->redirect(array('action' => 'all'));
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
            $this->set('question', $question);  
        }
}
