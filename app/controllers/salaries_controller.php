<?php
class SalariesController extends AppController 
{
  	var $name = 'Salaries';
	
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	} 	
	
   function admin_index($id=null)
   {
        $date=date('Y-m-d');
        $this->loadModel('Employee');
		 $this->loadModel('Designation');
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		$this->loadModel('Currency');
		
	    $this->Employee->recursive = 0;
	    $this->paginate = array('limit'=>10,'order'=>'Employee.first_name ASC');
		$this->set('Salary', $this->paginate('Employee'));
		
				/* echo "<pre>";
				 print_r($this->paginate());*/
	
   }
   
	

   function admin_paygrade()
   {
        
		$date=date('Y-m-d');
       
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		$this->loadModel('Currency');
		$this->loadModel('PayGrade');
	    $this->PayGrade->recursive = 0;
	    $this->paginate = array('limit'=>10,'order'=>'PayGrade.name ASC');
		$this->set('PayGrade', $this->paginate('PayGrade'));
		
	
   }
   
   
	function admin_add()
	{	
		$this->loadModel('PayGrade');
		$this->loadModel('Employee');
		$this->loadModel('Currency');
		
		$options = $this->Currency->find('list', array(
		       'fields' => array('Currency.currency_id', 'Currency.name'),
		       'recursive' => 0 ));
		$this->set('currencies',$options);	
	
	
		if(!empty($this->data)) 
		{
				
				if ($this->Salary->save($this->data)) 
				{
					$this->Session->setFlash(__('The Paygrade has been saved', true));
					$this->redirect(array('action' => '/'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Paygrade  could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	 
	 
	function admin_addsalarylevel()
	{	
		$this->loadModel('PayGrade');
		$this->loadModel('Employee');
		$this->loadModel('Currency');
		
		$options = $this->Currency->find('list', array(
		       'fields' => array('Currency.currency_id', 'Currency.name'),
		       'recursive' => 0 ));
		$this->set('currencies',$options);	
	
	
		if(!empty($this->data)) 
		{
				
				if ($this->PayGrade->save($this->data)) 
				{
					$this->Session->setFlash(__('The Paygrade has been saved', true));
					$this->redirect(array('action' => '/'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Paygrade  could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	 
	 	function admin_edit($employee_id = null) {
	   
	    $this->loadModel('Salary');
		$this->loadModel('Employee');
		$this->loadModel('Currency');
		$this->loadModel('Designation');
		
	   $options2 = $this->Designation->find('list', array(
		       'fields' => array('Designation.id', 'Designation.designation'),
		       'recursive' => 0 ));
		$this->set('designations',$options2);
		
		$options = $this->Currency->find('list', array(
		       'fields' => array('Currency.currency_id', 'Currency.name'),
		       'recursive' => 0 ));
		$this->set('currencies',$options);	
		
	
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		 
		if (!$employee_id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Salary', true));
			$this->redirect(array('action' => 'index'));
		}
	    
		if (!empty($this->data)) {
		
			if ($this->Employee->save($this->data)) {
			    $this->Session->setFlash(__('The Salary has been saved', true));
				$this->redirect(array('action' => 'index'));
			  
			} else {
				$this->Session->setFlash(__('Salary could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
			$this->data = $this->Employee->read(null,$employee_id );
		}
		
		
		}
	 
	 

}

?>