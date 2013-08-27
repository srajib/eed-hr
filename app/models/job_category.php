<?php
class JobCategory extends AppModel {

	var $name = 'JobCategory';
	var $useTable = "job_category";
	var $primaryKey = 'id';
	
	
	var $hasMany = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	

}
?>