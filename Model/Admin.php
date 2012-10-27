<?php
App::uses('AppModel', 'Model');

class Admin extends AppModel {

	public $name = 'Admin';
	
	public function PasswordA($data) {
    return $this->data['Admin']['password'] == $this->data['Admin']['confirm_password'];
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
		    	),
		    
               
            'between' => array(
                'rule' => array('between', 5, 15),
                'message' => 'от 5 до 15 символов'
            )
            ),
         'first_name'=> array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'только буквы и цифры'
                ),
                'between' => array(
                'rule' => array('between', 5, 15),
                'message' => 'от 5 до 15 символов'
                )
           
            ),
            'last_name'=> array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'только буквы и цифры'
                ),
                'between' => array(
                'rule' => array('between', 5, 15),
                'message' => 'от 5 до 15 символов'
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
    		'description' => array(
    			'title' => array( 
        		'rule' => 'notEmpty',
        		'message' => 'Поле не должно быть пустым'
    			)
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
			  'confirm_password' => array(   
					'custom' => array(
					'rule' => array('PasswordA'),
					'message' => 'При повторении пароль не совпадает!',
					),
   				
   				   /* 'rule' => array('equalTo', 'password'),  
        			'message' => "пароль должен совпадать c полем 'password'  "
   				/*'alphanumeric' => array(
	            'rule' => 'alphaNumeric',  
	            'message' => 'Разрешены только буквы и цифры.',
	            'last' => true
   				)*/
   				)
	         
            );
}