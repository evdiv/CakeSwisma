<?php
/**
 * Categories Controller
 *
 * PHP version 5.5
 *
 * @category Controller
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class CategoriesController extends AppController {
    public function admin_index() {
        $this->set('categories', $this->Category->find('all'));
    }
    
    public function admin_add() {
        if($this->request->is('post')) {
            $this->Category->create();
            if($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('New Category has been added'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add new Category'));
            
        }
    }
    
         public function admin_edit($id = null) { 
            if (!$id) {
                throw new NotFoundException(__('Invalid id'));
            }
            
            $category = $this->Category->findById($id);
            if (!$category) {
                throw new NotFoundException(__('Unable find category with id: %s', h($id)));
            }
            
            if ($this->request->is(array('post', 'put'))) {
                $this->Category->id = $id;
                if ($this->Category->save($this->request->data)) {
                    $this->Session->setFlash(__('Category has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update category.'));
            } else {
                
               $this->request->data = $category;
            }
        }   
    
    public function admin_delete($id) {
         if ($this->request->is('get')) {
             throw new MethodNotAllowedException();
         }
         if(!$id) {
             throw new NotFoundException('Invalid Id');
         }
         if(!$this->Category->findById($id)) {
             throw new NotFoundException('Category with id: %s does\'t exist in the Db', h($id));
         }
             
         if ($this->Category->delete($id)) {
             $this->Session->setFlash(
                 __('The category with id: %s has been deleted.', h($id))
             );
             return $this->redirect(array('action' => 'index'));
         }
     } 
    
}
