<?php
class Credit extends AppModel {

	var $name = 'Credit';
	var $useTable = "credits";
	var $primaryKey = 'id';
	
		var $validate = array(
		'credit_no' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please Enter Credit No',
			),
		    'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Credit No should be unique.',
            ) ,
		),
		'start_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please Enter Start Date',
			),
		),
		'end_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please Enter End Date',
			),
		),
		);

}
?>