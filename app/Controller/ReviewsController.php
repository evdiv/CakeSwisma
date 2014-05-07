<?php
/**
 * Reviews Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class ReviewsController extends AppController {
	public function index() {
            $this->set('clinics', $this->Review->find('all', array(
             'limit' => 10,
             'order' => 'Review.created DESC'
            )));
        }
        
        public function add() {
            if($this->request->is('post')) {
                $this->Review->create();
                    if($this->Review->save($this->request->data)) {
                        $this->Session->setFlash(__('The Review has been added'));
                        return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
                    }
                    $this->Session->setFlash(__('Unable to add new clinic'));                    
            }
        }
        
        public function view($id = null) {
            if(!$id) {
                throw new NotFoundException(__('Invalid clinic'));
            }
            $clinic = $this->Review->findById($id);
            if(!$clinic) {
                throw new NotFoundException(__('Invalid clinic'));
            }
            $this->set('clinic', $clinic);  
        }
}
