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
        
        public function admin_add() {
            if($this->request->is('post')) {
                $this->Page->create();   
                $page = $this->request->data;
                $page['Page']['user_id'] = $this->Auth->user('id');
                if($this->Page->save($page)) {
                    $this->Session->setFlash(__('The Page has been added'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add new page'));
            }
        }
        
        public function admin_edit($id = null) { 
            if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            
            $page = $this->Page->findById($id);
            if (!$page) {
                throw new NotFoundException(__('Unable find page with id: %s', h($id)));
            }
            
            if ($this->request->is(array('post', 'put'))) {
                $this->Page->id = $id;
                if ($this->Page->save($this->request->data)) {
                    $this->Session->setFlash(__('Page has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update page.'));
            } else {
                
               $this->request->data = $page;
            }
        }
        
      public function admin_delete($id) {
         if ($this->request->is('get')) {
             throw new MethodNotAllowedException();
         }
         if(!$id) {
             throw new NotFoundException('Invalid Id');
         }
         if(!$this->Page->findById($id)) {
             throw new NotFoundException('Page with id: %s does\'t exist in the Db', h($id));
         }
             
         if ($this->Page->delete($id)) {
             $this->Session->setFlash(
                 __('The page with id: %s has been deleted.', h($id))
             );
             return $this->redirect(array('action' => 'index'));
         }
     } 
}