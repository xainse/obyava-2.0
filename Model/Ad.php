<?php

App::uses('AppModel', 'Model');

class Ad extends AppModel {

	public $name = 'Ad';
	
	/**
	 * 
	 * Категорії оголошень побудовані на системі тегів
	 * Корінний тег для "Категорій оголошень" має номер 33
	 * - це як точка входу в ланцюг тегів про категорії
	 * @var int
	 */
	const MAIN_CATEGORY_TAG = 33;
				
	
	/**
	 * Правила валидации моделей
	 */
	public  $validate = array(			
		'text' => array(
				'rule' 		 => array('notempty'),
				'allowEmpty' => false,
				'message'    => 'Напишіть текст оголошення',
		),    		
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
	
	/**
	 * Связь ко многим
	 */
	public $hasMany = array(
		'DetailsAuto' => array(
			'className' => 'DetailsAuto',
			
		),'DetailsImmovable' => array(
			'className' => 'DetailsImmovable',
	));
	
	/**
	 * Обработка после нахождения объявлений в базе
	 * @see Model::afterFind()
	 */
	public function afterFind($res, $primary = false) {
	
		if (!empty($res[0]['Ad'])) {
			foreach ($res as $key => $i) {
				$res[$key]['Ad']['date'] = date('d.m.Y', strtotime($i['Ad']['date']));
				
				if (empty($res[$key]['Ad']['short_text'])) {
					$res[$key]['Ad']['short_text'] = $this->getShortText($res[$key]['Ad']['text']);
					$res[$key]['Ad']['short_text_len'] = strlen($res[$key]['Ad']['short_text']);
				}
				
				/*switch ($i['Ad']['subrubrik_id']) {
					case 'sell': $res[$key]['Rubrik']['title2'] = 'Продам '.$i['Rubrik']['name']; break;
					case 'bay': $res[$key]['Rubrik']['title2'] = 'Куплю '.$i['Rubrik']['name']; break;
					case 'chenge': $res[$key]['Rubrik']['title2'] = 'Обменяю '.$i['Rubrik']['name']; break; 
				}*/
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
	
	/**
	 * Получить Категории объяв
	 * Которые состоят из тегов
	 * TODO: сделать кеширование этого списка
	 */
	public function getAdsCategories() {
		//App::import('Model', 'Tag');
		//$this->Tag = new Tag;
		
		$this->Tag = ClassRegistry::init('Tag');
		// 33 - это тег, который называется "Категорії об*яв" - и он должен содержать в себе иерархию категорий 
		$tmp_categories = $this->Tag->getTagsHierarchy(self::MAIN_CATEGORY_TAG, 1);
	//wln($tmp_categories);
		$categories = $options = array();		
		foreach ($tmp_categories['TagConnection'] as $category1) {

			if (!empty($category1['TagConnection'])) {
				/*$categories[$category1['Tag']['name']] = array(
					$category1['Tag']['id']	=> $category1['Tag']['name']
				);*/
				
				foreach ($category1['TagConnection'] as $category2) {
					
					$categories[$category1['Tag']['name']][$category2['Tag']['id']] = $category2['Tag']['name'];
				}
			} else {
				$categories[$category1['Tag']['id']] = $category1['Tag']['name'];					
			}		
		}	
		
		return $categories;
	}

	/*
	 * Переопределяю функцию сохранения модели
	   Что нужно сделать при сохранении:
	   1. Провалидировать
	   2 . 
	 */
	public function save($data = null, $validate = true, $fieldList = array()) {

		if (parrent::save($data, $validate, $fieldList)) {


		}
	}
}