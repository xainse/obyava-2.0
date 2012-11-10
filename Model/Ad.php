<?php

App::uses('AppModel', 'Model');

class Ad extends AppModel {

	public $name = 'Ad';
	
	public  $validate = array(
		    
    		'Text' => array( 
        		'rule' => 'notEmpty',
        		'message' => 'Поле не должно быть пустым'
    			),
			'Date' => array(
				'rule' => 'date',
				'message' => 'Введите дату в формате YY-MM-DD.',
				'allowEmpty' => true
			)
			   			
			);
	
	public $belongsTo = array(
		'Rubrik' => array(
			'className' => 'Rubrik',
			
		),
		/* */
		'Region' => array(
			'className' => 'Region',
<<<<<<< HEAD
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
=======
		
		) ,
		'User'=> array(
			'className' => 'User',
		) 
	
	);
/*<<<<<<< HEADhasMany*/
	public $hasMany = array(
		/* 'User'=> array(
			'className' => 'User',
		), */
		'details_auto' => array(
			'className' => 'details_auto',
			
		),'details_immovable' => array(
			'className' => 'details_immovable',
		));	
	
	/*  public $hasOne = array (
		'User'=> array(
		'className' => 'User', 
		
//>>>>>>> origin*
	
	); )*/
>>>>>>> origin
	
}