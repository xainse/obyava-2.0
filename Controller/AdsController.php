<?php 

App::uses('AppController', 'Controller');

class AdsController extends AppController {
	
	public function index () {
		$last_ads = $this->Ad->find('all', array(
//			'fields'	=> array(),
			'order'	=> 'Ad.date DESC',
			'limit' => 80,
		));
		
		$this->set(compact('last_ads'));
	}
}