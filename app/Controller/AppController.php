<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array('Session', 'Auth');
    
    public $helpers = array('Html', 'Form', 'Session', 'Js', 'Paginator');

    public function beforeFilter() {
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
        $this->Auth->loginRedirect = array('controller' => 'clinics', 'action' => 'index', 'admin' => true);
        $this->Auth->logoutRedirect = array('controller' => 'clnics', 'action' => 'index', 'admin' => false);
        $this->Auth->authorize = array('Controller');
        
        if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
        $this->layout = 'admin';
        }
        
        $this->set('logged_in', $this->Auth->loggedIn());
    }
    
    //Admin has access to any page
    public function isAuthorized($user) {
       if($user['role'] === 'admin') {
            return true;
       }
    }

    
    
 
   public function beforeRender() {
       
        $this->loadModel('Post');
        $this->set('posts', $this->Post->find('all'));
   }
}
