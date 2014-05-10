<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Paginator',
        'Session', 
        'Auth' => array(
            'flash' => array(
                'element' => 'alert',
                'key' => 'auth',
                'params' => array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-error'
                )
            )
        )   
    );
    
    public $helpers = array( 
        'Js', 
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),        
        );

    public function beforeFilter() {
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
        $this->Auth->loginRedirect = array('controller' => 'clinics', 'action' => 'index', 'admin' => true);
        $this->Auth->logoutRedirect = array('controller' => 'clnics', 'action' => 'index', 'admin' => false);
        $this->Auth->authorize = array('Controller');
        
        if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
        $this->layout = 'admin';
        }
        
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());   
        
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
