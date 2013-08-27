<?php
class Company extends AppModel {

	var $name = 'Company';
	var $useTable = "companies";
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