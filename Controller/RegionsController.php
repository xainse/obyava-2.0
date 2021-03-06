<?php

App::uses('security','utility');

class RegionsController extends AppController {
	public $name='Region';
	
	public $components= array ('Email');
	
	/*public $paginate = array (
		'limit'=> 1,
		'order' => array (
			'Region.id'=> 'asc',
				)
		);*/
	public function beforeRender () {
		parent::beforeRender();
		$this->layout= 'admin_layout';
	}
	public function gate_index() {
		$this->Region->recursive = 0;
		
		$this->set('regions', $this->paginate());
	}
	public function gate_view($id=null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid nquiry', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Region', $this->Region->read(null, $id));
	}
	public function gate_add() {
		if (!empty($this->data)) {
			$this->Region->create();
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('The record has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
		$this->render('gate_edit');
	}
	public function gate_edit ($id=null) {
		if (!$id && empty($this->data)){
			$this->Session->setFlash(sprintf(__('Invalid %s', true)));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('The record been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The record count not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data=$this->Region->read(null, $id);
		}
	}
	public function gate_delete ($id=null) {
		if (!$id) {
			$this->Session->setFlash(__('Indalid id', true));
			$this->redirect(array('actions'=>'index'));
		}
		if ($this->Region->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action'=>'index'));
	}
}

?>