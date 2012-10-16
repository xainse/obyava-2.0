<?php

App::uses('security', 'utility');

class UsersController extends AppController {
	public $name='Users';
	
	public $components= array ('Email');
	
	public $paginate = array(
        'limit' => 20,
        'order' => array(
	 		'User.id' => 'asc',
	        )
	    );
	
	
	public function beforeRender () {
		parent::beforeRender();
		
		$this->layout = 'admin_layout';
		
	}
	
	public function index (){
		$this->User->recursive = 0;		
		$this->set('users', $this->paginate());
	}
	public function view($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid nquiry', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user',$this->User->read(null, $id));
	}
	
	public function add() {
		if (!empty($this->data)){
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlesh(__('The record has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
			//we($this->Admin);
			$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
		
		$this->render('edit');
	}
	
	public function edit($id=null){
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
	public function delete($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid id', true));
			$this->redirect(array('actions'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlesh(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action'=>'index'));
	}
}