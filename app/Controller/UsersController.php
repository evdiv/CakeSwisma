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
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'register');
    }
    
        public function index() {
            $this->set('users', $this->User->find('all', array(
            'fields' => array(
                'username', 'full_name'
            ))));
        }
        
        public function view($id = null) {

            if(!$id) {
                throw new NotFoundException(__('Invalid user id'));
            }
            $user = $this->User->findById($id);
            
            if(!$user) {
                throw new NotFoundException(__('Unable find user with id: %s', h($id)));
            }
            $this->set('user', $user);
        }
        
        public function register() {
            if($this->request->is('post')) {
                $this->User->create();
                if($this->User->save($this->request->data)) {
                    $id = $this->User->id;
                    $this->request->data['User'] = array_merge(
                            $this->request->data['User'],
                            array('id' => $id));
                    $this->Auth->login($this->request->data['User']);            
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Session->setFlash('Unable create new user');
            }
        }
        
        public function login() {
            if($this->request->is('post')) {     
                if($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Session->setFlash(__('Your username/password was incorrect'));
                }
            }
        }

        public function logout() {
            $this->Auth->logout();
             return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
        
        public function admin_index() {
            $this->set('users', $this->User->find('all', array(
                
            )));
        } 
        
       public function admin_view($id = null) {

            if(!$id) {
                throw new NotFoundException(__('Invalid user id'));
            }
            $user = $this->User->findById($id);
            
            if(!$user) {
                throw new NotFoundException(__('Unable find user with id: %s', h($id)));
            }
            $this->set('user', $user);
        }
        
       public function admin_add() {
            if($this->request->is('post')) {
                $this->User->create();
                if($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new user')); 
            }
       } 
       
        public function admin_edit($id = null) { 
            if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }

            $user = $this->User->findById($id);
            if (!$user) {
                throw new NotFoundException(__('Unable find user with id: %s', h($id)));
            }
            //Remove password from the User array
            unset($user['User']['password']);
            
            if ($this->request->is(array('post', 'put'))) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('User has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update user info.'));
            } else {
               $this->request->data = $user;
            }
        }
        
        public function admin_delete($id) {
         if ($this->request->is('get')) {
             throw new MethodNotAllowedException();
         }
         if(!$id) {
             throw new NotFoundException('Invalid Id');
         }
         if(!$this->User->findById($id)) {
             throw new NotFoundException('User with id: %s does\'t exist in the Db', h($id));
         }
             
         if ($this->User->delete($id)) {
             $this->Session->setFlash(
                 __('The user with id: %s has been deleted.', h($id))
             );
             return $this->redirect(array('action' => 'index'));
         }
     } 


}
