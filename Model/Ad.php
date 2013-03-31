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