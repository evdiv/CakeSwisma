<?php
/**
 * Users Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class UsersController extends AppController {
        public function index() {
            $this->set('users', $this->User->find('all'));
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->User->create();
                if($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new user'));
                
            }
            $this->set('roles', $this->User->Role->find('list', array('order' => 'title')));
        }
}
