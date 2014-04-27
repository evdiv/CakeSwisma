<?php
/**
 * CakePHP Controller CategoriesController
 * @author Eugene
 */
class CategoriesController extends AppController {
    public function index() {
        $this->set('categories', $this->Category->find('all'));
    }
    
    public function add() {
        if($this->request->is('post')) {
            $this->Category->create();
            if($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('New Category has been added'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add new Category'));
            
        }
    }
	
}
