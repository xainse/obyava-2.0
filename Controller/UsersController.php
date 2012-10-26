<?php

App::uses('security', 'utility');

class UsersController extends AppController {
	public $name='Users';
	
	public $components= array ('Email');
	
//<<<<<<< HEAD
	/*public $paginate = array(
        'limit' => 1,
=======
	public $paginate = array(
        'limit' => 20,
>>>>>>> origin
        'order' => array(
	 		'User.id' => 'asc',
	        )
	    );*/
	
	
	public function beforeRender () {
		parent::beforeRender();
		
		$this->layout = 'admin_layout';
		
	}
	
	public function gate_index (){
		$this->User->recursive = 0;		
		$this->set('users', $this->paginate());
	}
	public function gate_view($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid nquiry', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user',$this->User->read(null, $id));
	}
	
	public function gate_add() {
		if (!empty($this->data)){
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The record has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
			//we($this->Admin);
			$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
		
		$this->render('gate_edit');
	}
	
	public function gate_edit($id=null){
		if (!$id && empty($this->data)){
			$this->Session->setFlash (sprintf(__('Invalid %s', true)));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)){
			if ($this->User->save($this->data)){
			$this->Session->setFlash(__('The record been saved',true));
			$this->redirect(array('action'=>'index'));			
		} else {
			$this->Session->setFlash(__('The record count not be saved. Please, try again.',true));
		}
		}
		if (empty($this->data)){
			$this->data =$this->User->read(null, $id);
		}
	}
	public function gate_delete($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid id', true));
			$this->redirect(array('actions'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action'=>'index'));
	}
}