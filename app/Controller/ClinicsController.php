<?php
/**
 * Clinics Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class ClinicsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }
	public function index() {
            $this->set('clinics', $this->Clinic->find('all', array(
             'limit' => 10,
             'order' => 'Clinic.created DESC'
            )));
            if($this->request->is('post')) {
                $this->Clinic->create();
                if($this->Clinic->save($this->request->data)) {
                    $this->Session->setFlash(__('The Clinic has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new clinic'));
            }
            $this->set('sections', $this->Clinic->Sections->find('list'));
        }
        
        public function view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid clinic'));
            }
            $clinic = $this->Clinic->findById($id);
            if(!$clinic) {
                throw new NotFoundException(__('Invalid clinic'));
            }
            if($this->request->is('post')) {
                if(isset($this->request->data['Review'])) {
                    $this->Clinic->Review->create();
                        if($this->Clinic->Review->save($this->request->data)) {
                            $this->Session->setFlash(__('Your Review has been added'));
                            return $this->redirect(array('action' => 'view', $id));  
                        }
                        $this->Session->setFlash(__('Unable to add Review'));
                        
                }elseif (isset($this->request->data['Comment'])) {
                    $this->Clinic->Review->Comment->create();
                        if($this->Clinic->Review->Comment->save($this->request->data)) {
                            $this->Session->setFlash(__('Your Comment has been added'));
                            return $this->redirect(array('action' => 'view', $id));  
                        }
                        $this->Session->setFlash(__('Unable to add Comment'));
                 }
            }
            $this->set('clinic', $clinic);               
        }
        
        public function admin_index($id = null) {
           if(!$id) {
              $this->Clinic->recursive = 1;
              $this->set('clinics', $this->paginate());                
           } else {
             $this->set('clinics', $this->Clinic->find('all', array(
             'conditions' => array('Clinic.id' => $id)
           )));
           }
        }
        
        public function admin_view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid clinic'));
            }
            $clinic = $this->Clinic->findById($id);
            if(!$clinic) {
                throw new NotFoundException(__('Invalid clinic'));
            }
            $this->set('clinic', $clinic);               
        } 
        
        public function admin_add() {
            if($this->request->is('post')) {
                $this->Clinic->create();   
                $clinic = $this->request->data;
                $clinic['Clinic']['user_id'] = $this->Auth->user('id');
                if($this->Clinic->save($clinic)) {
                    $this->Session->setFlash(__('The Clinic has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new clinic'));
            }
        }
        
        public function admin_disable($id = null) {
             if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
             if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            $clinic = $this->Clinic->findById($id);
            if (!$clinic) {
                throw new NotFoundException(__('Unable find clinic with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {
                $clinic['Clinic']['published'] = 0;
                $this->Clinic->save($clinic);
                $this->Session->setFlash('The clinic has been unpublished');
                return $this->redirect(array('action' => 'index'));
            }
        }

        public function admin_enable($id = null) {
             if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
             if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            $clinic = $this->Clinic->findById($id);
            if (!$clinic) {
                throw new NotFoundException(__('Unable find clinic with id: %s', h($id)));
            }     
            if ($this->request->is('post')) {                
                $clinic['Clinic']['published'] = 1;
                $this->Clinic->save($clinic);
                $this->Session->setFlash('The clinic has been published');
                return $this->redirect(array('action' => 'index'));
            }
        }        
        
        public function admin_edit($id = null) { 
            if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            
            $clinic = $this->Clinic->findById($id);
            if (!$clinic) {
                throw new NotFoundException(__('Unable find clinic with id: %s', h($id)));
            }
            
            if ($this->request->is(array('post', 'put'))) {
                $this->Clinic->id = $id;
                if ($this->Clinic->save($this->request->data)) {
                    $this->Session->setFlash(__('Clinic has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update clinic.'));
            } else {
               $this->request->data = $clinic;
            }
        }
        
      public function admin_delete($id) {
         if ($this->request->is('get')) {
             throw new MethodNotAllowedException();
         }
         if(!$id) {
             throw new NotFoundException('Invalid Id');
         }
         if(!$this->Clinic->findById($id)) {
             throw new NotFoundException('Clinic with id: %s does\'t exist in the Db', h($id));
         }
          
         $clinic = $this->Clinic->findById($id);
         if(count($clinic['Review']) > 0) {
             $this->Session->setFlash(
                 __('The clinic : %s has reviews. Delete reviews first', h($clinic['Clinic']['title']))
             );
             return $this->redirect(array('controller' => 'reviews', 'action' => 'admin_index'));
         }
         if ($this->Clinic->delete($id)) {
             $this->Session->setFlash(
                 __('The clinic with id: %s has been deleted.', h($id))
             );
             return $this->redirect(array('action' => 'admin_index'));
         }
     } 
        
}
