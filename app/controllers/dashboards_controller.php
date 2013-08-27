<?php
class DashboardsController extends AppController 
{
  	var $name = 'Dashboards';
	var $uses = null;
	
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	} 	

   function admin_index($id=null)
   {
        $date=date('Y-m-d');
       
		//$creditno = $this->Credit->find('list', array('fields'=>array('id','credit_no'),'conditions'=>array('end_date'=>$date));
		
		//$this->set(compact('creditno'));
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		
	
	
		
   }
   
   
    function admin_change($id=null)
	   {
			$date=date('Y-m-d');
			$this->loadModel('Credit');
			
			
			 $creditno = $this->Credit->find('list', array(
				'fields' => array('Credit.id', 'Credit.credit_no'),
				'conditions' => array('Credit.end_date >' => $date),
				'recursive' => 0
				));
				
			$this->set(compact('creditno'));	
			
		  if(!empty($id))
			{
			 $this->Session->write('credit_id', $id);
			 $a=$this->Credit->find('all', array('conditions'=>array('id'=>$id)));
			 
			 $credit_no = $a[0]['Credit']['credit_no'];
			 $this->Session->write('credit_no', $credit_no);
			 $this->set('credit_id',$this->Session->read('credit_id'));
			 $this->set('credit_no',$this->Session->read('credit_no'));
			 $this->Session->setFlash(__('Your new credit no. has been selected successfully.','default', array('class' => 'flash_good')));
			
			}
			
			 $this->set('credit_no',$this->Session->read('credit_no'));
			 $this->set('credit_id',$this->Session->read('credit_id'));
			
	   }

}

?>