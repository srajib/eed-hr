<?php
class HrsController extends AppController 
{
  	var $name = 'Hrs';
	var $uses = 'jobs';
	
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
	    $this->Jobs->recursive = 0;
	    $this->paginate = array('limit'=>10,'order'=>'Job.title ASC');
		$this->set('Jobs', $this->paginate());
		
				/* echo "<pre>";
				 print_r($this->paginate());*/
	
   }
   
   
	function admin_add()
	{	
		$this->loadModel('Leave');
		$this->loadModel('LeaveType');
		$this->loadModel('Department');
		$this->loadModel('Designation');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
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
			  //$this->Leave->set($this->data);
				
				//App::import('Sanitize');
				
				//$this->Leave->create();
				//$this->data = Sanitize::clean($this->data); 
				
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
	 
	 
	 	function admin_edit($Leave_id = null) {
	   
	    $this->loadModel('Leave');
		$this->loadModel('LeaveType');
		$this->loadModel('Department');
		$this->loadModel('Designation');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
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
		
		 
		if (!$Leave_id && empty($this->data)) {
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
			$this->data = $this->Leave->read(null, $Leave_id);
		}
		
		
		}
	 
	 

}

?>