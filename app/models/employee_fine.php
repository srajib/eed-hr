<?php
class EmployeeFine extends AppModel {

	var $name = 'EmployeeFine';
	var $useTable = "employee_fines";
	var $primaryKey = 'id';
	
	
	
    var $belongsTo = array(
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'dept_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	   'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		);
	
	
}
?>