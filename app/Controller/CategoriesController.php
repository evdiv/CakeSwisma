<?php
/**
 * Categories Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
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
