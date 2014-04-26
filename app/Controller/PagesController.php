<?php
/**
 * CakePHP Controller PagesController
 * @author Eugene
 */
class PagesController extends AppController {
        public function index() {
            $this->set('home_page', $this->Page->find('first', array(
                'conditions' => array(
                    'Page.id' => '1'
                )
            )));
        }
        
        public function all() {
            $this->set('pages', $this->Page->find('all'));
        }
}
