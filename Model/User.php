<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $name = 'User';
	
	public function Password2($data) {
    	return $this->data['User']['password'] == $this->data['User']['confirm_password'];
		}
	
	public  $validate = array(
        'login' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'только буквы и цифры'
                ),
            'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'Пользователь с таким логином уже существует.'		 
            )
            ),
            'email' => array(
                'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'Пользователь с таким email уже существует.'
		    	),
		    	'email'=>array(
        		'rule' => array('email', true),
        		'message' => 'Пожалуйста, введите действующий email адрес.')
    			),
    		'password' => array(
    			'minLength'=> array(
		         'rule' => array('minLength', '6'),  
       			 'message' => 'Пароль должен быть минимум 6 символов.'
   				) ,
    			
    		'alphanumeric' => array(
	            'rule' => 'alphaNumeric',  
	            'message' => 'Разрешены только буквы и цифры.',
	            'last' => true
   				)
   				),
   			'confirm_password' =>  array(   
					'custom' => array(
					'rule' => array('Password2'),
					'message' => 'При повторении пароль не совпадает!',
					),
					)
	         
            );
}