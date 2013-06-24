<?php
App::uses('Tag', 'Model');

/**
 * 
 * Клас Регіонів, по правильному, повинен наслідувати модель Тегів
 * Класифікація геопозицій буде йти наступним чином
 * 1. Країна
 * 	2. Областні центри
 * 		3. Області
 * 			4. Райони
 * 				5. Міста, СМТ, села, і т.д.
 * 
 * @author xain
 *	
 * Щоб визначити, що такий то тег, це місто, я можу робити зв*язок на першому рівні від конкретного тега до тега "Місто"
 *
 * INSERT INTO `obyava_port`.`tag_connections` (`id`, `prime_tag_id`, `sub_tag_id`, `level`, `created`) VALUES (NULL, '36', '37', '1', NULL), (NULL, '37', '34', '1', NULL);
 */
class Region extends Tag {

	public $name = 'Region';
	
	public $useTable = 'tags';

    /**
     * 
     * Точка входу для тегів з группи регіони
     * @var int
     */
    const MAIN_REGION_TAG = 36;
    
    /**
     * Возвращает список регионов
     * Нужно сделать рекурсивную функцию, которая будет возвращать спиоск связанных тегов 
     * TODO: сделать кеширование этого списка
     */
    public function getAdsRegions() {
    	$regions = array();
    	$tmp_regions =  $this->getTagsHierarchy(self::MAIN_REGION_TAG, 1);
		
    	foreach ($tmp_regions['TagConnection'] as $region_level_1) {
    		if ($region_level_1['Region']['level'] == 2) {
    			
    			$regions[$region_level_1['Region']['name']] = array(
    				$region_level_1['Region']['id'] => $region_level_1['Region']['name'], 
    			);
    			
    			foreach ($region_level_1['TagConnection'] as $region_level_2) {
    				$regions[$region_level_1['Region']['name']][$region_level_2['Region']['id']] = $region_level_2['Region']['name']; 
    			}
    		}
		}
    	
    	return $regions;
    }
}