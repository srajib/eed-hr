<?php
class Time extends AppModel {

	var $name = 'Time';
	var $useTable = "timesheets";
	var $primaryKey = 'id';
	
    var $belongsTo = array(
	
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