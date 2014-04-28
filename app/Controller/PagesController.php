<?php
/**
 * CakePHP Controller PagesController
 * @author Eugene
 */
class PagesController extends AppController {
        public function index() {
            $this->set('page', $this->Page->find('first'));
            
            $this->loadModel('Post');
            $this->set('posts', $this->Post->find('all'));
            
            $this->loadModel('Question');
            $this->set('questions', $this->Question->find('all', array(
                'limit' => 10,
                'order' => 'Question.created DESC'
            )));
            $this->set('categories', $this->Question->Category->find('list'));
            
            //Just for test create question form handler
            if($this->request->is('post')) {
                $this->Question->create();
                if($this->Question->save($this->request->data)) {
                    $this->Session->setFlash(__('The Question has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new question'));
            }
        }
        
        public function all() {
            $this->set('pages', $this->Page->find('all'));
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->Page->create();
                if($this->Page->save($this->request->data)) {
                    $this->Session->setFlash(__('The Page has been added'));
                    return $this->redirect(array('action' => 'all'));
                }
                $this->Session->setFlash(__('Unable to add new page'));
            }
        }     
}