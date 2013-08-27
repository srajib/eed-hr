<?php
class ServiceHistory extends AppModel {

	var $name = 'ServiceHistory';
	var $useTable = "service_histories";
	var $primaryKey = 'service_history_id';
        
        
        
        
        
        
        
	
    var $belongsTo = array(
	   'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		);
}
?>