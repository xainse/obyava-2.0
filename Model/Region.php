<?php
App::uses('AppModel', 'Model');

class Region extends AppModel {

	public $name = 'Region';
	
	public  $validate = array(
        'name' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'только буквы и цифры'
                ),
            'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'регион с таким именем уже существует.'
		    	),
		    
    		'title' => array( 
        		'rule' => 'notEmpty',
        		'message' => 'Поле не должно быть пустым'
    			)
    			),
    		'name_ru'=>array(
    			'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'регион с таким именем уже существует.'
		    	),
		    
    		'title' => array( 
        		'rule' => 'notEmpty',
        		'message' => 'Поле не должно быть пустым'
    			)
    			)
    			
    			);
}