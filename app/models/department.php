<?php
class Department extends AppModel {

	var $name = 'Department';
	var $useTable = "departments";
	var $primaryKey = 'id';
	
	 	
     var $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		);
	
	
	
    var $hasMany = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => '',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		);

}
?>