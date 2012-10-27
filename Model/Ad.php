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
		'Details_auto'=> array(
		'className' => 'Details_auto',
	),
	 'Details_immovable'=> array(
		'className'=> 'Details_immovable',
	),
	);
	public $hasOne = array (
		'details_auto'=> array(
		'className' => 'details_auto',
	),
	 'details_immovables'=> array(
		'className'=> ' details_immovables',
	),
	);
}