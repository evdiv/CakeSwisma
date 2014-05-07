<?php
/**
 * Pages Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class PagesController extends AppController {
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index');
        }


        public function index() {
            $this->set('page', $this->Page->find('first'));
            
            $this->loadModel('Clinic');
            $this->set('clinics', $this->Clinic->find('all', array(
                'limit' => 10,
                'order' => 'Clinic.created DESC'
            )));
            $this->set('sections', $this->Clinic->Section->find('list'));
            
            //Just for test create clinic form handler
            if($this->request->is('post')) {
                
                $this->Clinic->create();
                $this->Clinic->User->create();
                
                if($this->Clinic->save($this->request->data) && $this->Clinic->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The Clinic has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new clinic'));
            }
        }
        
        public function admin_index() {
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