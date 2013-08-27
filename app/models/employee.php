<?php
class Employee extends AppModel {

	var $name = 'Employee';
	var $useTable = "employees";
	var $primaryKey = 'employee_id';
	
	var $validate = array(
	'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter first name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter last name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	'join_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Join Date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	'date_of_birth' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Date of Birth',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	'designation' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Designation',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
/*	'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select content file',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		*/
	);
	
	
   var $belongsTo = array(/*
                    'Department' => array(
                            'className' => 'Department',
                            'foreignKey' => 'dept_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
                    ),*/
                            'Designation' => array(
                            'className' => 'Designation',
                            'foreignKey' => 'designation_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
                    ),
		);
		
	
	var $hasMany = array(
		'Leave' => array(
			'className' => 'Leave',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EmployeeAdvance' => array(
			'className' => 'EmployeeAdvance',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EducationalQualification' => array(
			'className' => 'EducationalQualification'
		),
		'ServiceHistory' => array(
			'className' => 'ServiceHistory',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Time' => array(
			'className' => 'Time', 
			'foreignKey' => 'employee_id'
		)
	);	

 
}
?>