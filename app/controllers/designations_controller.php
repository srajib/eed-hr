<?php
class DesignationsController extends AppController 
{
  	var $name = 'Designations';
	//var $uses = 'employee';
	
        

   function admin_index($id=null)
   {
       
        $this->Designation->recursive = 0;
        $this->paginate = array('limit'=>10,'order'=>'Designation.weight_value ASC');
        $this->set('Designation', $this->paginate());
	
   }
   
   
	function admin_add()
	{	
		$this->loadModel('Designation');
	
		if(!empty($this->data)) 
		{
			$this->Designation->set($this->data);
				
				App::import('Sanitize');
				
				$this->Designation->create();
				$this->data = Sanitize::clean($this->data); 
				
				if ($this->Designation->save($this->data)) 
				{
					$this->Session->setFlash(__('The Designation has been saved', true));
					$this->redirect(array('action' => '/'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Designation could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	 
	 	function admin_edit($Designation_id = null) {
	   
		$this->loadModel('Designation');
		
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		 
		if (!$Designation_id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Designation', true));
			$this->redirect(array('action' => 'index'));
		}
	    
		if (!empty($this->data)) {
		
			if ($this->Designation->save($this->data)) {
			    $this->Session->setFlash(__('The Designation has been saved', true));
				$this->redirect(array('action' => 'index'));
			  
			} else {
				$this->Session->setFlash(__('Designation could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
			$this->data = $this->Designation->read(null, $Designation_id);
		}
		
		
		}
	 
	 

}

?>