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
		)
	
	);
	public $hasMany = array(
		'details_auto' => array(
			'className' => 'details_auto',
			
		),'details_immovable' => array(
			'className' => 'details_immovable',
			
		),
	);
	
}