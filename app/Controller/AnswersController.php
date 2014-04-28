<?php
/**
 * CakePHP Controller AnswersController
 * @author Eugene
 */
class AnswersController extends AppController {
	public function index() {
            $this->set('answers', $this->Answer->find('all', array(
             'limit' => 10,
             'order' => 'Answer.created DESC'
            )));
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->Answer->create();
                if($this->Answer->save($this->request->data)) {
                    $this->Session->setFlash(__('The Answer has been added'));
                    return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new answer'));
            }
        }
        
        public function view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid answer'));
            }
            $answer = $this->Answer->findById($id);
            if(!$answer) {
                throw new NotFoundException(__('Invalid answer'));
            }
            $this->set('answer', $answer);  
        }
}
