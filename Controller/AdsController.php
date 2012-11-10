<?php 

App::uses('AppController', 'Controller');

class AdsController extends AppController {

	public $paginate = array(
        'limit' => 30,
        'order' => array(
	 		'Ad.id' => 'asc',
	        )
	    );

	public function beforeRender () {
		parent::beforeRender();
		
		//$this->layout = 'admin_layout';

	}
	
	public function index () {		
		$last_ads = $this->Ad->find('all', array(
			'order'	=> 'Ad.date DESC',
			'limit' => 80,
		));
		
		$this->set(compact('last_ads'));
		$this->set(compact('ads'));
	}

	
	public function gate_index () {
		/*$last_ads = $this->Ad->find('all', array(
			'fields'	=> array(),
			'order'	=> 'Ad.date DESC',
			'limit' => 30,
		));*/
		
		$last_ads = $this->paginate();
		$this->set(compact('last_ads'));
		
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
		$all_rubriks = $this->Ad->Rubrik->find('list');
		$this->set('all_rubrik',$all_rubriks); 
		$all_users = $this->Ad->User->find('list', array('id'=>'id', 'name'=>'login'));
		$this->set('all_user',$all_users);
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
	/* $this->_renderEdit('edit'); 
	$this->set('ad1', $this->Ad->read(null, $rubrik_id));*/
	/* $this->Ad->Rubrik->find('all'); */
	/* $this->loadModel('Rubrik');
	$all_rubriks = $this->Rubrik->find('list');  */
	
	/**/
	$all_rubriks = $this->Ad->Rubrik->find('list');
	$this->set('all_rubrik',$all_rubriks); 
	 $this->loadModel('User');
	$all_users = $this->User->find('list'); 
	 /*$all_users = $this->User->find('list', array('id'=>'id', 'name'=>'login')); /**/  
	/* $all_users = $this->Ad->User->find('list', array('id'=>'id', 'name'=>'login' ));*/
	$this->set('all_user',$all_users);
	}
	 /*function renderEdit($action = 'gate_edit') {
		$all_users = $this->Ad->User->find('list');
		$this->set('all_user',$all_users);
		/* $this->set('rubrik_ids', $this->Rubrik->rubrik_ids);
		
		$this->layout = "admin_layout"; *
		$this->render('gate_edit');
	}   */
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