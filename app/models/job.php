<?php
class Job extends AppModel {
	var $name = 'Job';
	var $validate = array(
		'company_profile_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select category',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter job title',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'application_deadline' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'position_type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select position type',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select position level',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'education' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select education',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tags' => array(
			'alphaNumericComaSpace' => array(
				'rule' => array('alphaNumericComaSpace'),
				'message' => 'Tags can only be letters, numbers, comma and space',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);
	function alphaNumericComaSpace($check) {
      // $data array is passed using the form field name as the key
      // have to extract the value to make the function generic
      $value = array_values($check);
      $value = $value[0];
      
      return preg_match('|^[0-9a-zA-Z, ]*$|', $value);
    }


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'CompanyProfile' => array(
			'className' => 'CompanyProfile',
			'foreignKey' => 'company_profile_id',
			'conditions' => '',
			'fields' => array('id','company_name','contact_email','company_address_1','company_address_2','business_description'),
			'order' => ''
		),
		'JobCategory' => array(
			'className' => 'JobCategory',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasOne = array(
		'JobDetail' => array(
			'className' => 'JobDetail',
			'foreignKey' => 'job_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
	function lists($type)
	{
		$options['salary_types'] = array(
				'monthly'=>'Monthly',
				'yearly'=>'Yearly',
				'hourly'=>'Hourly'
				);
				
		$options['salaries'] = array(
				'NA'=>'Negotiable',
				'NM'=>'Not mention',
				'RN'=>'Range'
				);
		
		$options['num_options_0'] = array();
		for($i=0; $i<=50; $i++)
			$options['num_options_0'][$i] = $i;
		
		$options['num_options_12'] = array();
		for($i=0; $i<12; $i++)
			$options['num_options_12'][$i] = $i;
		
		$options['num_options'] = array();
		for($i=1; $i<=50; $i++)
			$options['num_options'][$i] = $i;
		
		$options['num_years'] = array();
		for($i=1950; $i<=2010; $i++)
			$options['num_years'][$i] = $i;	
		
		$options['levels'] = array(
				'INT'=>'Internship',
				'ENT'=>'Entry',
				'MID'=>'Middle',
				'SEN'=>'Senior',
				'MGT'=>'Management',
				'DIR'=>'Director',
				'EXE'=>'Executive',
				);
		$options['position_types'] = array(
				'Full Time'=>'Full Time',
				'Part Time'=>'Part Time',
				'Contract'=>'Contract',
				'Any'=>'Any',
				);
				
		$options['genders'] = array(
				'Any'=>'Any',
				'Female Only'=>'Female Only',
				'Male Only'=>'Male Only'
				);
		
		$options['educations'] = array(
				'HS'=>__('High school', true),
				'A'=>__('Associates (A)',true),
				'BS'=>__('Bachelor of Science (BS)', true),
				'BA'=>__('Bachelor of Arts (BA)', true),
				'BFA'=>__('Bachelor of Fine Arts', true),
				'BBA'=>__('Bachelor of Business Administration (BBA)', true),
				'JD'=>__('Juris Doctorate (JD)', true),
				'MS'=>__('Master of Science (MS)', true),
				'MA'=>__('Master of Arts(MA)', true),
				'MD'=>__('Medical Doctor (MD)', true),
				'MBA'=>__('Master of Business (MBA)', true),
				'MFA'=>__('Master of Fine Arts (MFA)', true),
				'B'=>__('Bachelors degree (B)', true),
				'M'=>__('Masters degree (M)', true),
				'PhD'=>__('PhD', true),
				'OTH'=>__('Other', true),
				);
		return  $options[$type];
	}
	
	

}
?>