<?php
class TrHistory extends AppModel {

	var $name = 'TrHistory';
	var $useTable = "tr_his";
	var $primaryKey = 'id';
	
/*	var $hasMany = array(
	    'ExpenditureSubcategory' => array(
			'className' => 'ExpenditureSubcategory',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		);*/
	
/*	var $validate = array(
		'category_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your Category name',
			),
        'unique' => array(
            'rule' => array('isUnique'), 
            'message' => 'This Category name already exists',
			//'last' => true
                 ),
		 )
	   
	   );*/
}
?>