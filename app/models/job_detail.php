<?php
class JobDetail extends AppModel {
	var $name = 'JobDetail';
	var $validate = array(
		'job_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
/*		'application_format' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select job application format',
				//'allowEmpty' => true,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'application_email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email to send CV',
				'allowEmpty' => true,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'salary' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select salary',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'salaryCheck' => array(
				'rule' => array('salaryCheck'),
				'message' => 'Please enter only minimum salary or both minimum and maximum salary',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'min_salary' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter only number in minimum salary amount',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'max_salary' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter only number in maximum salary amount',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'location' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select location',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'responsibility' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter job responsibility',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'meta_keyword' => array(
			'numeric' => array(
				'rule' => array('alphaNumericComaSpace'),
				'message' => 'Meta keyword can only be letters, numbers, comma and space',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'meta_description' => array(
			'numeric' => array(
				'rule' => array('alphaNumericComaSpace'),
				'message' => 'Meta description can only be letters, numbers, comma and space',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);
	
	function salaryCheck($check)
	{
		if($this->data['JobDetail']['salary'] == 'RN' && empty($this->data['JobDetail']['min_salary'])  && empty($this->data['JobDetail']['max_salary']))
		{
			return false;
		}
		if($this->data['JobDetail']['salary'] == 'RN' && empty($this->data['JobDetail']['min_salary'])  && !empty($this->data['JobDetail']['max_salary']))
		{
			return false;
		}
		else
			return true;
	}
	
		
    function alphaNumericComaSpace($check) {
      // $data array is passed using the form field name as the key
      // have to extract the value to make the function generic
      $value = array_values($check);
      $value = $value[0];
      
      return preg_match('|^[0-9a-zA-Z, ]*$|', $value);
    }

	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
	
	function lists($type)
	{
		$options['application_formats'] = array(
				'ONLINE'=>'Apply Online',
				'EMAIL'=>'Email CV',
				'HardCopy'=>'Bring Hard Copy'
				);
		$options['locations'] = array(
				'ANY'=>'Anywhere',
				'IN'=>'Within Bangladesh',
				'INT'=>'Out side Bangladesh'
				);
		return  $options[$type];
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>