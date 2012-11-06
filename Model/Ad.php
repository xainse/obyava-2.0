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
		/*
		'DetailsAuto' => array(
			'className' => 'DetailsAuto',
			
		),
		'DetailsImmovable' => array(
			'className' => 'DetailsImmovable',
		),*/
	);
	/*
	public $hasOne = array(
		'DetailsAuto' => array(
			'className' => 'DetailsAuto',
			
		),
		'DetailsImmovable' => array(
			'className' => 'DetailsImmovable',
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
	*/
	
}