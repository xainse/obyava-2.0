<?php

App::uses('AppModel', 'Model');

class Ad extends AppModel {

	public $name = 'Ad';
	
	public $belongsTo = array(
		'Rubrik' => array(
			'className' => 'Rubrik',
			
		),
		'Region' => array(
			'className' => 'Region',
		),
	);
}