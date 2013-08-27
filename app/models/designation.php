<?php
class Designation extends AppModel {

	var $name = 'Designation';
	var $useTable = "designations";
	var $primaryKey = 'id';
	
        
        var $validate = array(
                'designation' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter designation name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'weight_value' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter weight value',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                        'numeric' => array(
                                'rule' => array('numeric'),
                                'message' => 'Use numeric value',
                        )
		),
	);
	
	var $hasMany = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'designation_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);	


}
?>