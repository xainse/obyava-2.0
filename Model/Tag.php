<?php
/**
 * Модель обработки тегов
 */

App::uses('AppModel', 'Model');

class Tag extends AppModel {

	public $name = 'Tag';

	public $hasMany = array(
		'TagConnection' => array(
			'className' => 'TagConnection',
			'foreignKey' => 'prime_tag_id',
			'fields'	=> array('TagConnection.prime_tag_id', 'TagConnection.sub_tag_id', 'TagConnection.level'),			
		),
	);
	
	
	/**
	 * Получить иерархию тегов начиная с первого тега 
	 * level - уровень иерархии, начиная с которого нужно выбрать дерево тегов.
	 * @param (int) $main_tag_id
	 */
	public function getTagsHierarchy($main_tag_id = null, $level = 1) {
		$result = array();
		$level		 = intval($level);
		$main_tag_id = intval($main_tag_id);	// валидация
				
		if ($main_tag_id) {
			// Я ввожу уровень связей, что-бы контролировать структуру, которую я хочу получить 
			// и как минимум по умолчанию получать структуру с первого уровня, потому что тег может участвовать 
			// в дургих связях и на других уровнях 
			$this->hasMany['TagConnection']['conditions'] = array('TagConnection.level' => $level);
			$level++;
			
			$result = $this->find('first', array(		// Находим сам тег и его связи
				'conditions' => array($this->name . '.id' => $main_tag_id),
				'recursive' => 1,
			));
			
			$result[$this->name]['level'] = $level-1;
			
			if (!empty($result['TagConnection'])) {		//Для связанных тегов, так же рекурсивно находим связанные теги							
				foreach ($result['TagConnection'] as $key => $sub_tag) {
					$result['TagConnection'][$key] = $this->getTagsHierarchy($sub_tag['sub_tag_id'], $level);
				}
			} else {
				unset($result['TagConnection']);
			}
		}
				
		return $result;
	}
	
	/**
	 * 
	 * Выбрать цепочку тегов, от текущего тега вверх по иерархии
	 * @param int $main_tag_id		ID начального тега, от которого мы хотим выбрать цепочку связанных тегов
	 * @param int $level			
	 * 
	 *  Должно быть ограничение по количеству выбираемых тегов
	 */
	public function getReversTagsHierarchy($main_tag_id = null, $level = 1) {
	
	}
}