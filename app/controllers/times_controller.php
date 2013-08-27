<?php
class TimesController extends AppController 
{
  	var $name = 'Times';
	var $uses = 'Time';
	
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	} 	
	
   
   public function admin_monthlyattendence() {
	  
    	$this->layout = "admin_layout";
		
	     $month = date('m');
		   
		   if($month>8){
		   $end_month =  $month+1;
		   }
		   else 
		   {
		   $end_month =  '0'.$month+1;
		   }
		   
		   
		   $year =date('Y');
		  
		   $start_date = $year.'-'.$month.'-'.'01';
		  
		   if($month>8){
		    
			$end_date = $year.'-'.$end_month.'-'.'01';											
		   }
		    else
		   	 $end_date = $year.'-'.'0'.$end_month.'-'.'01';	
		
		
		
		if( $start_date && $end_date)
		{
		$logrecord=$this->Time->find('all',array(
				 'contain' => array( 'Employee'),
						'conditions'=>array('Time.loginDate BETWEEN ? and ?' => array($start_date, $end_date)),		
							'order'=> 'Time.loginDate DESC',
							
						 ));	 
						 		
						 
				$this->set('logrecords',$logrecord);
				
				
				
		}
		else {$logrecord =''; $this->set('logrecords',$logrecord);}      
	} 
	

   function admin_index($id=null)
   {
        $date=date('Y-m-d');
       
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		
/*		 $t=date('m');
		 $pctime = time()+3600*6;
		 $currentdate = date('F j, Y', $pctime);	
		 $this->set('currentdate', $currentdate);
		 $date2 = date("h:i:s A",$pctime);
		 $date = date("h:i:s",$pctime);
		 $time_chk = date("G:i:s",$pctime);
		 $t1=strtotime($time_chk);
		 */
		 $this->loadModel('User');
		 $user= $this->User->findById($this->Auth->User('id'));
    	 $this->set('user', $user);
		 
		 $t=date('m');
		 $pctime = time()+3600*6;
		 $currentdate = date('F j, Y', $pctime);	
		 $this->set('currentdate', $currentdate);
		 $date2 = date("h:i:s A",$pctime);
		 $date = date("h:i:s",$pctime);
		 $time_chk = date("G:i:s",$pctime);
		 $t1=strtotime($time_chk);
		 $default1=strtotime(AppModel::DEFAULT_LOGINTIME);
		 $default2=strtotime(AppModel::DEFAULT_LOGINTIME_POLICY2);
		 $tday=date("Y:m:d");
		 $this->set('ttime', $date2);
    	 
    	 $logrecord=$this->Time->find('all',array(
						'conditions'=>array(
					    	'Time.user_id'=> $this->Auth->User('id'),
   							 'Time.loginDate like'=> '%'.'-'.$t.'-'.'%'
						),
							'order'=> 'Time.loginDate DESC'
						));	
						
    	 $this->set('logrecords', $logrecord);
		 
    	$logstatus=$this->Time->find('all',array(
						'conditions'=>array(
					    	'Time.user_id'=> $this->Auth->User('id'),
   							 'Time.loginDate'=> $tday
						)
					));	
		$this->set('logoutflag', 0);
		
		if($logstatus){
			if($logstatus[0]['Time']['logoutTime']=="00:00:00"){
				$this->set('logoutflag', 1);
				}
				$this->set('tdayflag', 1);
				}else $this->set('tdayflag', 0);
				
		$timeflag=0;
		if($user['User']['policy']==1){
		if($t1>$default1)
		{
			$timeflag=1;
	    	$this->set('timeflag', $timeflag);
	    	 $this->set('tflag', 1);
    	 	}else { $timeflag=0;$this->set('timeflag', $timeflag);}
			}			
		else  if($user['User']['policy']==2){	
		 	if($t1>$default2)
    		{
			$timeflag=2;
	        $this->set('timeflag', $timeflag);
	    	$this->set('tflag', 1);
    	 	}else { $timeflag=0;$this->set('timeflag', $timeflag);}}
		 
    	 if(!empty($this->data)){
			if($user['User']['policy']==1){
    	    if($t1>$default1){
			$this->Time->save(array('user_id'=>$this->Auth->user('id'),'loginDate'=>$tday,'loginTime'=> $time_chk ,'loginmessage'=>$this->data['Time']['loginmessage'],'remoteIP'=>$_SERVER['REMOTE_ADDR'],'status'=>1,false));
			}
			else {
				$this->Time->save(array('user_id'=>$this->Auth->user('id'),'loginDate'=>$tday,'loginTime'=> $time_chk ,'remoteIP'=>$_SERVER['REMOTE_ADDR'],false));
				}}
			 if($user['User']['policy']==2){
    	    if($t1>$default2){
			$this->Time->save(array('user_id'=>$this->Auth->user('id'),'loginDate'=>$tday,'loginTime'=> $time_chk ,'loginmessage'=>$this->data['Time']['loginmessage'],'remoteIP'=>$_SERVER['REMOTE_ADDR'],'status'=>1,false));
			}
			else {
				$this->Time->save(array('user_id'=>$this->Auth->user('id'),'loginDate'=>$tday,'loginTime'=> $time_chk ,'remoteIP'=>$_SERVER['REMOTE_ADDR'],false));
				}}
			$this->Session->setFlash(__('The Login data has been saved', true));
			$this->redirect(array('controller'=>'times','action'=>'index'));
		}	
	 $workhour=$this->Time->find('all',array(
						'conditions'=>array(
					    	'Time.user_id'=> $this->Auth->User('id'),//,
   							 'Time.loginDate like'=> '%'.'-'.$t.'-'.'%',
							 "Time.logoutTime <>"=> "00:00:00"
						),
							'order'=> 'Time.loginDate DESC'
						));	
	    if($workhour){
		$j=0;	
		foreach($workhour as $workhours){
		   $time['work_hour'][]=$workhours['Time']['duration'];
		   $j++;
		}
			   
		for($i=0;$i<$j;$i++){
			$all_work[$i]=strtotime($time['work_hour'][$i]); 
		}
		$as=(array_sum($all_work))/$j; 
		$average_work_hour=strftime("%H:%M:%S", $as);	
		$this->set('average_work_hour', $average_work_hour);
		$this->set('no_of_day', $j);
		}
		 
		 
		//$this->loadModel('Leave');
	    /*$this->Leave->recursive = 0;
	    $this->paginate = array('limit'=>10,'order'=>'Leave.name ASC');
		$this->set('Leave', $this->paginate());*/
		
				/* echo "<pre>";
				 print_r($this->paginate());*/
	
   }
   
   	  public function admin_attendence($date1=null) {
	  
    	$this->layout = "admin_layout";
		$date = "2012-03-18";
		
		if($date1)
		{
		$logrecord=$this->Time->find('all',array(
				 'contain' => array( 'Employee'),
						'conditions'=>array(
					    	 'Time.loginDate'=> $date1
								), 	
							'order'=> 'Time.loginDate DESC'
						 ));	 
						 		
						 
				$this->set('logrecords',$logrecord);
				
				
				
		}
		else {$logrecord =''; $this->set('logrecords',$logrecord);}      
	} 
	
	
	public function admin_monthlyreport($date=null) {
    	$this->layout = "admin_layout";
		$yesterday = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
		if($date){
		$logrecord=$this->Loginlogout->find('all',array(
				 'contain' => array( 'User'),
						'conditions'=>array(
					    	 'Loginlogout.loginDate'=> $date,
							  'Loginlogout.logoutTime'=> "00:00:00"
								), 
							'order'=> 'Loginlogout.loginDate DESC'
						 ));	 	}
							else 		
							{
							$logrecord=$this->Loginlogout->find('all',array(
								 'contain' => array( 'User'),
										'conditions'=>array(
											 'Loginlogout.loginDate'=> $yesterday,
											  'Loginlogout.logoutTime'=> "00:00:00"
												), 
											'order'=> 'Loginlogout.loginDate DESC'
						 ));	}
						 
				$this->set('logrecords',$logrecord);
		        $total_user=count($logrecord);
				$this->set('total_user',$total_user);
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