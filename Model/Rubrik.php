<?php
App::uses('AppModel', 'Model');

class Rubrik extends AppModel {

	public $name = 'Rubrik';
	
	public  $validate = array(
        'name' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'только буквы и цифры'
                ),
            'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'такая рубрика уже существует.'
				)
		    	),
				
		    
    	'title' => array( 
        		'rule' => 'notEmpty',
        		'message' => 'Поле не должно быть пустым'
    			)
    			);
}