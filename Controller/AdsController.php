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
		$all_users = $this->Ad->User->find('list', array('fields' => array('User.id', 'User.login')));		
		
		$this->set('all_rubrik',$all_rubriks); 		
		$this->set('all_user',$all_users);
		$this->render('gate_edit');
		
	}
	
	/**
	 * 
	 * Редагування оголошень
	 * @param unknown_type $id
	 */
	public function gate_edit($id=null){
		if (!$id && empty($this->data)){
			$this->Session->setFlash (sprintf(__('Invalid %s', true)));
			$this->redirect(array('action'=>'index'));
		}
		
		//we($this->request->data);
		if (!empty($this->request->data)){
			
			if ($this->Ad->save($this->request->data)){				
				
				// Перевіряеємо чи є данні промашини
				if (!empty($this->request->data['DetailsAuto'][0])) {
					$this->request->data['DetailsAuto'][0]['ad_id'] = $this->Ad->id;
					
					if ($this->Ad->DetailsAuto->save($this->request->data['DetailsAuto'][0])){
						$this->Session->setFlash(__('The DetailsAuto record been saved',true));
					} else {
						we($this->Ad->DetailsAuto->validationErrors);
					}
				}
								
				$this->Session->setFlash(__('The record been saved',true));
				$this->redirect(array('action'=>'index'));			
			} else {
				
				$this->Session->setFlash(__('The record count not be saved. Please, try again.',true));
			}
		}
		
		if (empty($this->data)){
			$this->data = $this->Ad->read(null, $id);
		}
		
		
		
		//$last_ads = $this->paginate();
		//$this->set(compact('last_ads'));
		
		//$this->request->data;
		$all_rubriks = $this->Ad->Rubrik->find('list');
		$this->set('all_rubrik',$all_rubriks); 
		
		$all_users = $this->Ad->User->find('list', array('fields' => array('User.id', 'User.login')));
		$this->set('all_user',$all_users);
	}
	
	 /*
	function renderEdit($action = 'gate_edit') {
		$all_users = $this->Ad->User->find('list');
		$this->set('all_user',$all_users);
		/* $this->set('rubrik_ids', $this->Rubrik->rubrik_ids);
		
		$this->layout = "admin_layout"; *
		$this->render('gate_edit');
	} */
	
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