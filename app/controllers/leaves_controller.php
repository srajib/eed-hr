<?php
class LeavesController extends AppController 
{
  	var $name = 'Leaves';
	var $uses = 'Leave';
	
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	} 	

   function admin_index($id=null)
   {
        $date=date('Y-m-d');
       
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		
		//$this->loadModel('Leave');
	    $this->Leave->recursive = 0;
	    $this->paginate = array('limit'=>10,'order'=>'Employee.first_name ASC');
		$this->set('Leaves', $this->paginate());
		
	
   }
   
   
      function admin_leavetype()
   {
        $this->loadModel('LeaveType');
		
		$date=date('Y-m-d');
       
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		
		//$this->loadModel('Leave');
	    $this->LeaveType->recursive = 0;
	    $this->paginate = array('limit'=>10,'order'=>'LeaveType.leave_type_name ASC');
		$this->set('Leaves', $this->paginate('LeaveType'));
		
	
	
   }
   
   function admin_leavestatus($employee_id) 
    {
		    $this->layout = 'ajax';  
			
			$this->loadModel('Leave');
			
			
			$conditions = array('Leave.leave_type_id'=>'1', 'Leave.employee_id'=>$employee_id);
			
			$CL = $this->Leave->find('all', array('fields'=>array('SUM(Leave.leave_length_days) AS total_count'),
                                             'conditions'=>$conditions,
                                             'recursive'=>-1));
			
			$this->set('CL', $CL);
			
			
			
			$conditions2 = array('Leave.leave_type_id'=>'2', 'Leave.employee_id'=>$employee_id);
			
			$EL = $this->Leave->find('all', array('fields'=>array('SUM(Leave.leave_length_days) AS total_count'),
                                             'conditions'=>$conditions2,
                                             'recursive'=>-1));
			 
			$this->set('EL', $EL);
			
			
			
			
			
			$conditions3 = array('Leave.leave_type_id'=>'3', 'Leave.employee_id'=>$employee_id);
			
			$OT = $this->Leave->find('all', array('fields'=>array('SUM(Leave.leave_length_days) AS total_count'),
                                             'conditions'=>$conditions3,
                                             'recursive'=>-1));
			 
			$this->set('OT', $OT);
			
			
			
			$conditions4 = array('Leave.leave_type_id'=>'1', 'Leave.employee_id'=>$employee_id);
			$CL_past=$this->Leave->find('all', array('conditions' =>$conditions4, 'fields'=>array('Leave.leave_length_days','Leave.leave_end' ), 'order' => 'Leave.leave_end DESC','limit'=>1));
			
			//print_r($CL_past);
			$this->set('CL_past',$CL_past);
			
			
			$conditions5 = array('Leave.leave_type_id'=>'2', 'Leave.employee_id'=>$employee_id);
			$EL_past=$this->Leave->find('all', array('conditions' =>$conditions5, 'fields'=>array('Leave.leave_length_days','Leave.leave_end' ), 'order' => 'Leave.leave_end DESC','limit'=>1));
			
			//print_r($CL_past);
			$this->set('EL_past',$EL_past);
			
			$conditions6 = array('Leave.leave_type_id'=>'3', 'Leave.employee_id'=>$employee_id);
			$OT_past=$this->Leave->find('all', array('conditions' =>$conditions6, 'fields'=>array('Leave.leave_length_days','Leave.leave_end' ), 'order' => 'Leave.leave_end DESC','limit'=>1));
			
			//print_r($CL_past);
			$this->set('OT_past',$OT_past);
			
			$this->set('leave_comments', '');
		
		
	}
	
   	function get_casual()
	{
		
		$this->layout ='none';
		$conditions = array();
		
		if($this->params['form']['emp'] != '')
		    $conditions['Leave.employee_id'] = $this->params['form']['emp'] ;	
			$conditions['Leave.leave_type_id'] = '1' ;	
			
		 $count = $this->Leave->find('count', array('conditions'=>$conditions));
		 
		 //print_r($count);
	
		$this->set('value', print_r($count));
		
		
	}
	
	function get_earned()
	{
		
		$this->layout ='none';
		$conditions = array();
		
		if($this->params['form']['emp'] != '')
		    $conditions['Leave.employee_id'] = $this->params['form']['emp'] ;	
			$conditions['Leave.leave_type_id'] = '2' ;	
			
		 $count = $this->Leave->find('count', array('conditions'=>$conditions));
		 
		 //print_r($count);
	
		$this->set('value', print_r($count));
		
		
	}
	
	function get_others()
	{
		
		$this->layout ='none';
		$conditions = array();
		
		if($this->params['form']['emp'] != '')
		    $conditions['Leave.employee_id'] = $this->params['form']['emp'] ;	
			$conditions['Leave.leave_type_id'] = '3' ;	
			
		 $count = $this->Leave->find('count', array('conditions'=>$conditions));
		 
		 //print_r($count);
	
		$this->set('value', print_r($count));
		
		
	}
   
   
   
   	function admin_addleavetype()
	{	
		$this->loadModel('Leave');
		$this->loadModel('LeaveType');;
		

		if(!empty($this->data)) 
		{
				
				if ($this->LeaveType->save($this->data)) 
				{
					$this->Session->setFlash(__('The Leave Type has been saved', true));
					$this->redirect(array('action' => '/leavetype'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Leave Type could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
   
   
     
	 	function admin_editleavetype($leave_type_id= null) {
	   
	    $this->loadModel('Leave');
		$this->loadModel('LeaveType');
	
		
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		 
		if (!$leave_type_id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Leave', true));
			$this->redirect(array('action' => 'index'));
		}
	    
		if (!empty($this->data)) {
		
			if ($this->LeaveType->save($this->data)) {
			    $this->Session->setFlash(__('The Leave has been saved', true));
				$this->redirect(array('action' => 'index'));
			  
			} else {
				$this->Session->setFlash(__('Leave could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
			$this->data = $this->Leave->read(null, $leave_type_id);
		}
		
		
		}
     
   
   
	function admin_add($employee_id = null)
	{	
		$this->loadModel('Leave');
		$this->loadModel('LeaveType');
		$this->loadModel('Department');
		$this->loadModel('Designation');
		$this->loadModel('Employee');
		
		$this->set('employee_id', $employee_id);
		
	
			
		  $options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		  $this->set('departments',$options);
		
				
		  $employees = $this->Employee->find('list', array(
		       'fields' => array('Employee.employee_id', 'Employee.first_name'),
		       'recursive' => 0 ));
		  $this->set('employees',$employees);
		
		  $designations = $this->Designation->find('list', array(
		       'fields' => array('Designation.id', 'Designation.designation'),
		       'recursive' => 0 ));
		  $this->set('designations',$designations );
		
		 $leave_type = $this->LeaveType->find('list', array(
		       'fields' => array('LeaveType.leave_type_id', 'LeaveType.leave_type_name'),
		       'recursive' => 0 ));
		$this->set('LeaveType',$leave_type );
	
	    

	
		if(!empty($this->data)) 
		{
				
				if ($this->Leave->save($this->data)) 
				{
					$this->Session->setFlash(__('The Leave has been saved', true));
					$this->redirect(array('action' => '/'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Leave could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	 
	 	function admin_edit($leave_id = null) {
	   
	    $this->loadModel('Leave');
		$this->loadModel('LeaveType');
		$this->loadModel('Department');
		$this->loadModel('Designation');
		$this->loadModel('Employee');
			
		
		 $conditions['Leave.leave_type_id'] = '1' ;	
		 $count = $this->Leave->find('count', array('conditions'=>$conditions));
		
		
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
				
		$employees = $this->Employee->find('list', array(
		       'fields' => array('Employee.employee_id', 'Employee.first_name'),
		       'recursive' => 0 ));
		$this->set('employees',$employees);
		
		$designations = $this->Designation->find('list', array(
		       'fields' => array('Designation.id', 'Designation.designation'),
		       'recursive' => 0 ));
		$this->set('designations',$designations );
		
		 $leave_type = $this->LeaveType->find('list', array(
		       'fields' => array('LeaveType.leave_type_id', 'LeaveType.leave_type_name'),
		       'recursive' => 0 ));
		$this->set('LeaveType',$leave_type );
	
		
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		 
		if (!$leave_id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Leave', true));
			$this->redirect(array('action' => 'index'));
		}
	    
		if (!empty($this->data)) {
		
			if ($this->Leave->save($this->data)) {
			    $this->Session->setFlash(__('The Leave has been saved', true));
				$this->redirect(array('action' => 'index'));
			  
			} else {
				$this->Session->setFlash(__('Leave could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
			$this->data = $this->Leave->read(null, $leave_id);
		}
		
		
		}
	 
	 

}

?>