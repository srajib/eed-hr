<?php
class EmployeeAdvance extends AppModel {

	var $name = 'EmployeeAdvance';
	var $useTable = "employee_advances";
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