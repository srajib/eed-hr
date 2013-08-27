<?php
class EducationalQualification extends AppModel {

	var $name = 'EducationalQualification';
	var $useTable = "educational_qualifications";
	var $primaryKey = 'educational_qualification_id';
	
	var $validate = array(
	'name_of_degree' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Name of Degree',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name_of_institution' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter last Name of Institution',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	'board' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Board',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	'country' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Country',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	'year_of_passing' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Year of Passing',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter valid year',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	'result' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Result',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
	);
	
	
   var $belongsTo = array(
		'Employee' => array(
			'className' => 'Employee'
		),
		);
		
	
   

 
}
?>