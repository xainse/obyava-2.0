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
		/*'details_auto'=> array(
		'className' => 'details_auto',
	),
	 'details_immovables'=> array(
		'className'=> ' details_immovables',
	),*/
	);
	/*public $hasMany = array (
		'details_auto'=> array(
		'className' => 'details_auto',
	),
	 'details_immovables'=> array(
		'className'=> ' details_immovables',
	),
	);*/
}