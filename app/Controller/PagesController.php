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