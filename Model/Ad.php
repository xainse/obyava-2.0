<?php

App::uses('AppModel', 'Model');

class Ad extends AppModel {

	public $name = 'Ad';
	
	public  $validate = array(		    
    		'text' => array(
    			'rule' => array('
    				custom', "/^[a-z0-9][a-z0-9.-_!]{3,500}$/i") ,
                	'allowEmpty' => false,
                	'message'    => 'Текст обяви може містити букви та цифри a-z,0-9, "-","!", 
                                     "_" & "." та повинен містити від 20 до 500 символів',
            ),
		 	'title' => array(
				'custom1' => array(
                	'rule' => array('custom', "/^[a-z0-9][a-z0-9.-_!]{3,130}$/i") ,
                	'allowEmpty' => false,
                	'message'    => 'заголовок може містити букви та цифри a-z,0-9, "-", 
                                     "_" & "." і повинен мати від 3 до 130 символів',
            ),
            ),
    		'tags' => array(
           		 'rule' => array('custom', "/^[a-z0-9][a-z0-9,]{5,60}$/i") ,
                	'allowEmpty' => false,
                	'message'    => 'тег може містити букви та цифри a-z,0-9,  "," і повинен мати від 5 до 60 символів',
            
            	
            ),
		 	/*'date' => array(
				'rule' => 'date',
				'message' => 'dd-mm-YY.',
				'allowEmpty' => false,
            	'message' => 'введите дату, формата д(01)-м(06)-р(13)'
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
				
				if (empty($res[$key]['Ad']['short_text'])) {
					$res[$key]['Ad']['short_text'] = $this->getShortText($res[$key]['Ad']['text']);
					$res[$key]['Ad']['short_text_len'] = strlen($res[$key]['Ad']['short_text']);
				}
				
				switch ($i['Ad']['subrubrik_id']) {
					case 'sell': $res[$key]['Rubrik']['title2'] = 'Продам '.$i['Rubrik']['name']; break;
					case 'bay': $res[$key]['Rubrik']['title2'] = 'Куплю '.$i['Rubrik']['name']; break;
					case 'chenge': $res[$key]['Rubrik']['title2'] = 'Обменяю '.$i['Rubrik']['name']; break; 
				}
			}
		}
		return $res;
	}
	
	/**
	 * Получить короткий текст, который будет выводится
	 * в страницах списка
	 * @param str $text - полный текст объявления
	 */
	private function getShortText ($text) {
		$short_ad_len = 250;
		
		if (strlen($text) > $short_ad_len+20) {
			$pos = strpos(substr($text,$short_ad_len), ' ');			
			$text = substr($text, 0, $short_ad_len+$pos) . '...';
		} 
		
		return $text;
	}
}