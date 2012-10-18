<?php

App::uses('security','utility');

class RubriksController extends AppController {
	public $name='Rubrik';
	
	public $components= array ('Email');
	
	/*public $paginate = array (
		'limit'=> 1,
		'order' => array (
			'Rubrik.id'=> 'asc',
				)
		);*/
	public function beforeRender () {
		parent::beforeRender();
		$this->layout= 'admin_layout';
	}
	public function index() {
		$this->Rubrik->recursive = 0;
		
		$this->set('rubriks', $this->paginate());
	}
	public function view($id=null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid nquiry', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('rubrik', $this->Rubrik->read(null, $id));
	}
	public function add() {
		if (!empty($this->data)) {
			$this->Rubrik->create();
			if ($this->Rubrik->save($this->data)) {
				$this->Session->setFlash(__('The record has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
		$this->render('edit');
	}
	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true)));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Rubrik->save($this->data)) {
				$this->Session->setFlash(__('The record has been saved',true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rubrik->read(null, $id);
		}
	}
	public function delete ($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Indalid id', true));
			$this->redirect(array('actions'=>'index'));
		}
		if ($this->Rubrik->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action'=>'index'));
	}
}

?>