<?php
class Project extends AppModel {

	var $name = 'Project';
	var $useTable = "projects";
	var $primaryKey = 'id';
	
	
     /* var $hasMany = array(
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'project',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		);*/

}
?>