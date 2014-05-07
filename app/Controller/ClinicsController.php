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
        
        public function admin_index() {
            $this->set('clinics', $this->Clinic->find('all', array(
             'order' => 'Clinic.created DESC'
            )));
        }
        
}
