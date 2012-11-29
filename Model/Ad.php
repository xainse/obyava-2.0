<?php

App::uses('AppModel', 'Model');

class Ad extends AppModel {

	public $name = 'Ad';
	
	public  $validate = array(		    
    		'text' => array( 
        		'rule' => 'notEmpty',
        		'message' => 'Текст не може буди пустим'
    			),
		/* 	'date' => array(
				'rule' => 'date',
				'message' => 'dd-mm-YY.',
				'allowEmpty' => true
			) */
	);
	
	public $belongsTo = array(
		'User' => array(				// У нас є зв*язок в моделі User має багато оголошень, це зв*язок дає нам доступ в зворотньому напрямку.
			'className' => 'User',
		),	
		'Rubrik' => array(
			'className' => 'Rubrik',			
		),
		'Region' => array(
			'className' => 'Region',
		),
	);
	
	public $hasOne = array(
		
	);
	
	public $hasMany = array(
		'DetailsAuto' => array(
			'className' => 'DetailsAuto',
			
		),'DetailsImmovable' => array(
			'className' => 'DetailsImmovable',
	));
	
	
	public function afterFind($res, $primery) {
	
		if (!empty($res[0]['Ad'])) {
			foreach ($res as $key => $i) {
				$res[$key]['Ad']['date'] = date('d.m.Y', strtotime($i['Ad']['date']));
				//$res[$key]['Ad']['text'] = substr($res[$key]['Ad']['text'], 0, 140);
				
			}
		}

		return $res;
	}
}