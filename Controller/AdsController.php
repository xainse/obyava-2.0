<?php 

App::uses('AppController', 'Controller');

class AdsController extends AppController {

	
	public function gate_index () {
		$last_ads = $this->Ad->find('all', array(
//			'fields'	=> array(),
			'order'	=> 'Ad.date DESC',
			'limit' => 80,
		));
		
		$this->set(compact('last_ads'));
		$this->set(compact('ads'));
	}
	public function index () {
		$last_ads = $this->Ad->find('all', array(
//			'fields'	=> array(),
			'order'	=> 'Ad.date DESC',
			'limit' => 80,
		));
		
		$this->set(compact('last_ads'));
	}
	public function beforeRender () {
		parent::beforeRender();
		
		//$this->layout = 'admin_layout';
		
	}
	public function gate_view($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid nquiry', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('ad',$this->Ad->read(null, $id));
	}
	
	public function gate_add() {
		if (!empty($this->data)){
			$this->Ad->create();
			if ($this->Ad->save($this->data)) {
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
			if ($this->Ad->save($this->data)){
			$this->Session->setFlash(__('The record been saved',true));
			$this->redirect(array('action'=>'index'));			
		} else {
			$this->Session->setFlash(__('The record count not be saved. Please, try again.',true));
		}
		}
		if (empty($this->data)){
			$this->data =$this->Ad->read(null, $id);
		}
	}
	public function gate_delete($id=null) {
		if (!$id){
			$this->Session->setFlash(__('Invalid id', true));
			$this->redirect(array('actions'=>'index'));
		}
		if ($this->Ad->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action'=>'index'));
	}
	
}