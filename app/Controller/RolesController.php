<?php
/**
 * Roles Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class RolesController extends AppController {
        public function index() {
            $this->set('roles', $this->Role->find('all'));
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->Role->create();
                if($this->Role->save($this->request->data)) {
                    $this->Session->setFlash(__('New role has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new role'));
            }
        }
}
