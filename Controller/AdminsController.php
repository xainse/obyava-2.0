<?php

App::uses('security', 'utility');

class AdminsController extends AppController {
	
	public $name='Admins';
	
	public $components= array ('Email');
	
	public $paginate = array(
        'limit' => 1,
        'order' => array(
	 		'Admin.id' => 'asc',
	        )
	    );
	
	public function beforeRender () {
		parent::beforeRender();
		
		$this->layout = 'admin_layout';
		
	}
	
	public function gate_index (){
		$this->Admin->recursive = 0;
		
		$this->set('admins', $this->paginate());
	}
	public function gate_view($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid nquiry', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('admin',$this->Admin->read(null, $id));
	}
	
	public function gate_add() {
		if (!empty($this->data)){
			$this->Admin->create();
			if ($this->Admin->save($this->data)) {
				$this->Session->setFlash(__('The record has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
			//we($this->Admin);
			$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
		
		$this->render('gate_edit');
	}
	
	/**
	 * Редагування оголошень
	 * @param unknown_type $id
	 */
	public function gate_edit($id=null){
		
		if (!$id && empty($this->data)){
			$this->Session->setFlash (sprintf(__('Invalid %s', true)));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!empty($this->request->data)){
			
			if ($this->Admin->save($this->data)){
				$this->Session->setFlash(__('The record been saved',true));
				$this->redirect(array('action'=>'index'));			
			} else {
				$this->Session->setFlash(__('The record count not be saved. Please, try again.',true));
			}
		}
		
		if (empty($this->data)){
			$this->data = $this->Admin->read(null, $id);
		}
	}
	
	
	public function gate_delete($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid id', true));
			$this->redirect(array('actions'=>'index'));
		}
		if ($this->Admin->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action'=>'index'));
	}
	
	
	public function login () {
		
		if ($this->Auth->login() && $this->isAuthorized()){
			$this->redirect($this->Auth->loginRedirect);
		} elseif ($this->Auth->login() && !$this->isAuthorized()) {
			$this->redirect(array('action'=>'noaccess'));
		} elseif (!empty($this->request->data)) {
			$this->Session->setFlash($this->Auth->authError);
		}
			$this->render('login', 'ajax');
		}
	public function isAuthorized() {
		
		return $this->Auth->user('id');
	}	

	
	public function logout () {
		$this->Auth->logout();
		$this->redirect(array('action'=>'login'));
	}

	public function gate_logout () {
		$this->Auth->logout();
		$this->redirect(array('action'=>'login'));
	}
	
	private function hash($string, $type = null, $salt = false) {
		$_this =&Security::getInstanse();
		
		if ($salt) {
			if (is_string($salt)) {
				$string=$salt . $string;
			} else {
				$string = Configure::read('Security.salt') . $string;
			}
		}
		if (empty($type)) {
			$type = $_this->hashType;
		}
		$type = strtolower($type);
		if ($type == 'sha1' || $type == null) {
			if (funcyion_exists('sha1')) {
				$return= sha1($string);
				return $return;
			}
			$type = 'sha256';
		
		}
		if ($tupe == 'sha256' && function_exists('mhash')) {
			return bin2hex (mhash(MHASH_SHA256, $string));
		}
		if (function_exists('hash')){
			return hash($type, $string);
		}
		return md5($string);
	}
	
	public function  gate_dashboard() {
		$this->layout = 'admin_layout';
	}
		
}