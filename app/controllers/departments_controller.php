<?php
class DepartmentsController extends AppController 
{
  	var $name = 'Departments';
	//var $uses = 'employee';
	
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
		
	    $this->Department->recursive = 0;
		$this->paginate = array('limit'=>10,'order'=>'Department.dept_name ASC');
		$this->set('Department', $this->paginate());
		
		
	
   }
   
   
	function admin_add()
	{	
		$this->loadModel('Department');
		$this->loadModel('Project');
		
		$projects = $this->Project->find('list', array(
		       'fields' => array('Project.id', 'Project.p_name')
		     ));
		$this->set('projects',$projects);
		
	
		if(!empty($this->data)) 
		{
			$this->Department->set($this->data);
				
				App::import('Sanitize');
				
				$this->Department->create();
				$this->data = Sanitize::clean($this->data); 
				
				if ($this->Department->save($this->data)) 
				{
					$this->Session->setFlash(__('The Department has been saved', true));
					$this->redirect(array('action' => '/'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Department could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	 
	 	function admin_edit($id = null) {
	   
		$this->loadModel('Department');
		$this->loadModel('Project');
		
		$projects = $this->Project->find('list', array(
		       'fields' => array('Project.id', 'Project.p_name')
		     ));
		$this->set('projects',$projects);
		
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		 
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Department', true));
			$this->redirect(array('action' => 'index'));
		}
	    
		if (!empty($this->data)) {
		
			if ($this->Department->save($this->data)) {
			    $this->Session->setFlash(__('The Department has been saved', true));
				$this->redirect(array('action' => 'index'));
			  
			} else {
				$this->Session->setFlash(__('Department could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
			$this->data = $this->Department->read(null, $id);
		}
		
		
		}
	 
	 

}

?>