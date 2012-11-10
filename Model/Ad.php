<?php

App::uses('AppModel', 'Model');

class Ad extends AppModel {

	public $name = 'Ad';
	
	public  $validate = array(
		    
    		'Text' => array( 
        		'rule' => 'notEmpty',
        		'message' => '���� �� ������ ���� ������'
    			),
			'Date' => array(
				'rule' => 'date',
				'message' => '������� ���� � ������� YY-MM-DD.',
				'allowEmpty' => true
			)
			   			
			);
	
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
	
	public $hasMany = array(
		/* 'User'=> array(
			'className' => 'User',
		), */
		'details_auto' => array(
			'className' => 'details_auto',
			
		),'details_immovable' => array(
			'className' => 'details_immovable',
	));
}