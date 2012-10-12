<?php
/**
 *  file_source: app/Controller/AdminsController.php
 */

 
App::uses('Security', 'Utility');

class AdminsController extends AppController {

	var $name = 'Admins';

	var $components	= array('Email');
	
	public function index() {
		$this->Admin->recursive = 0;
		$this->set('admins', $this->paginate());
	}

	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid nquiry', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('admin', $this->Admin->read(null, $id));
	}

	public function add() {
		if (!empty($this->data)) {
			$this->Admin->create();
				
			if ($this->Admin->save($this->data)) {
				$this->Session->setFlash(__('The record has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				//we($this->Admin);
				$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
	}

	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true)));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Admin->save($this->data)) {
				$this->Session->setFlash(__('The record has been saved',true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Admin->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Admin->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login () {
		$this->layout = 'ajax';
		if (!empty($this->data)) {
			$conditions = array("login='".$this->data['Admin']['login']."'", "password='".$this->Admin->hash($this->data['Admin']['password'])."'");
			$someone = $this->Admin->find("first", array('conditions'=>$conditions ));
			//we($someone);
			if (!empty($someone)) {
				
				if ($someone['Admin']['confirm_code'] == '1') {
					$this->Session->write('Admin', $someone['Admin']);
					
					if ($this->Session->check('back_url')) {
						$backUrl = '/'.$this->Session->read('back_url');
						
						$this->Session->delete('back_url');
						$this->redirect($backUrl);
					} else {
						
						$this->redirect(array('controller'=>'settings', 'action'=>'index'));
					}
				} else {
					$this->Session->write('NoConfirmedUser', $someone['Admin']);
					$this->Session->setFlash('You not complite your registration. Check your email. <a href="/user/resend/">ReSend Email.</a>');
					$this->redirect(array('action'=>'thankyou'));
				}
			} else {
				//we($this->hash($this->data['Admin']['password']));
				$this->Admin->invalidate('login', 'not_correct');				
			}		
		}
	}
	
	public function logout () {
		$this->Session->delete('Admin');
		$this->redirect( array('action' => 'login'));
	}
	
	private function hash($string, $type = null, $salt = false) {
		
		$_this =& Security::getInstance();
		
		if ($salt) {
			if (is_string($salt)) {
				$string = $salt . $string;
			} else {
				$string = Configure::read('Security.salt') . $string;
			}
		}

		if (empty($type)) {
			$type = $_this->hashType;			
		}
		$type = strtolower($type);

		if ($type == 'sha1' || $type == null) {
			if (function_exists('sha1')) {
				$return = sha1($string);
				return $return;
			}
			$type = 'sha256';
		}

		if ($type == 'sha256' && function_exists('mhash')) {
			return bin2hex(mhash(MHASH_SHA256, $string));
		}

		if (function_exists('hash')) {
			return hash($type, $string);
		}
		
		return md5($string);
	}
}