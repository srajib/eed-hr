<?php
class Leave extends AppModel {

	var $name = 'Leave';
	var $useTable = "leaves";
	var $primaryKey = 'leave_id';
	
    var $belongsTo = array(
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Designation' => array(
			'className' => 'Designation',
			'foreignKey' => 'designation',
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
		),
		'LeaveType' => array(
			'className' => 'LeaveType',
			'foreignKey' => 'leave_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
		);
}
?>