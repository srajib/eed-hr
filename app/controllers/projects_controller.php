<?php
class ProjectsController extends AppController 
{
  	var $name = 'Projects';
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
		
	    $this->Project->recursive = 0;
		$this->paginate = array('limit'=>10,'order'=>'Project.p_name ASC');
		$this->set('Project', $this->paginate());
	
   }
   
   
	function admin_add()
	{	
		$this->loadModel('Project');
	
		if(!empty($this->data)) 
		{
			$this->Project->set($this->data);
				
				App::import('Sanitize');
				
				$this->Project->create();
				$this->data = Sanitize::clean($this->data); 
				
				if ($this->Project->save($this->data)) 
				{
					$this->Session->setFlash(__('The Project has been saved', true));
					$this->redirect(array('action' => '/'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Project could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	 
	 	function admin_edit($Project_id = null) {
	   
		$this->loadModel('Project');
		
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		 
		if (!$Project_id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Project', true));
			$this->redirect(array('action' => 'index'));
		}
	    
		if (!empty($this->data)) {
		
			if ($this->Project->save($this->data)) {
			    $this->Session->setFlash(__('The Project has been saved', true));
				$this->redirect(array('action' => 'index'));
			  
			} else {
				$this->Session->setFlash(__('Project could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $Project_id);
		}
		
		
		}
	 
	 

}

?>