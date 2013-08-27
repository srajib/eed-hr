<?php
class Salary extends AppModel {

	var $name = 'Salary';
	var $useTable = "salaries";
	var $primaryKey = 'id';
	
   /* var $belongsTo = array(
	
	   'Employee' => array(
			'className' => 'Salary',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		);*/
}
?>