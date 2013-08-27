<?php
class EmployeesController extends AppController 
{
  	var $name = 'Employees';
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
		
	    $this->Employee->recursive = 0;
		$this->paginate = array('limit'=>10,'order'=>'Designation.weight_value DESC');
		$this->set('Employees', $this->paginate());
   }
   
   
   	 	function admin_empdetails($employee_id = null) {
	   
		$this->loadModel('Department');
		$this->loadModel('EmployeeFine');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
		$employees = $this->Employee->find('all', array(
			   'conditions'=>array('Employee.employee_id'=>$employee_id),
		       'recursive' => 0 ));
			   
		$this->set('employees',$employees);
		
		//echo "<pre>";
		//print_r($employees);
		
		
	
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		}
		
		function admin_personalinfo($employee_id = null) {
	   
		$this->loadModel('Department');
		$this->loadModel('EmployeeFine');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
		$employees = $this->Employee->find('first', array(
                                'conditions'=>array('Employee.employee_id'=>$employee_id)
                            ));
			   
		$this->set('employees',$employees);
		
		//echo "<pre>";
		//print_r($employees);
		
		
	
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		}
   
   function admin_bankinfo($id=null)
   {
        $date=date('Y-m-d');
       
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		
	    $this->Employee->recursive = 0;
		$this->paginate = array('limit'=>10,'order'=>'Employee.first_name ASC');
		$this->set('Employees', $this->paginate());
   }
   
   
   function admin_fine()
   {
        $this->loadModel('EmployeeFine');
		
		$date=date('Y-m-d');
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		
	    $this->EmployeeFine->recursive = 0;
		$this->paginate = array('limit'=>10,'order'=>'Employee.first_name ASC');
		$this->set('EmployeeFines', $this->paginate('EmployeeFine'));
   }
   
   	function admin_addadvance()
	{	
		$this->loadModel('Department');
		$this->loadModel('EmployeeAdvance');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
		$employees = $this->Employee->find('list', array(
		       'fields' => array('Employee.employee_id', 'Employee.first_name'),
		       'recursive' => 0 ));
		$this->set('employees',$employees);
		
		
	
		if(!empty($this->data)) 
		{
				
				if ($this->EmployeeAdvance->save($this->data)) 
				{
					$this->Session->setFlash(__('The Employee Advance data has been saved', true));
					$this->redirect(array('controller'=>'employees','action' => 'admin_advance'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Employee Advance data could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	 
    
	function admin_addfine()
	{	
		$this->loadModel('Department');
		$this->loadModel('EmployeeFine');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
		$employees = $this->Employee->find('list', array(
		       'fields' => array('Employee.employee_id', 'Employee.first_name'),
		       'recursive' => 0 ));
		$this->set('employees',$employees);
		
		
	
		if(!empty($this->data)) 
		{
				
				if ($this->EmployeeFine->save($this->data)) 
				{
					$this->Session->setFlash(__('The Employee Fine data has been saved', true));
					$this->redirect(array('controller'=>'employees','action' => 'admin_advance'));
				} 
				else 
				{
					$this->Session->setFlash(__('The Employee Fine data could not be saved. Please, Fill up the highlighted fields properly.', true));
				}
			
		}
	 }
	 
	     
	 	function admin_editfine($id = null) {
	   
		$this->loadModel('Department');
		$this->loadModel('EmployeeFine');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
		$employees = $this->Employee->find('list', array(
		       'fields' => array('Employee.employee_id', 'Employee.first_name'),
		       'recursive' => 0 ));
		$this->set('employees',$employees);
		
		
	
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
	
		 
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Advance data', true));
			$this->redirect(array('action' => 'advance'));
		}
	    
		if (!empty($this->data)) {
		
		
			if ($this->EmployeeFine->save($this->data)) {
			    $this->Session->setFlash(__('The Employee Advance data  has been saved', true));
				$this->redirect(array('action' => 'advance'));
			  
			} else {
				$this->Session->setFlash(__('Employee Advance data could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
		    
			$this->data = $this->EmployeeFine->read(null, $id);
			$this->set('EmployeeFine',$this->data);
		
		}
		
		
		}
	
	 
	 	function admin_editadvance($id = null) {
	   
		$this->loadModel('Department');
		$this->loadModel('EmployeeAdvance');
		$this->loadModel('Employee');
			
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
		$employees = $this->Employee->find('list', array(
		       'fields' => array('Employee.employee_id', 'Employee.first_name'),
		       'recursive' => 0 ));
		$this->set('employees',$employees);
		
		
	
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
	
		 
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Advance data', true));
			$this->redirect(array('action' => 'advance'));
		}
	    
		if (!empty($this->data)) {
		
		
			if ($this->EmployeeAdvance->save($this->data)) {
			    $this->Session->setFlash(__('The Employee Advance data  has been saved', true));
				$this->redirect(array('action' => 'advance'));
			  
			} else {
				$this->Session->setFlash(__('Employee Advance data could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
		    
			$this->data = $this->EmployeeAdvance->read(null, $id);
			$this->set('EmployeeAdvance',$this->data);
		
		}
		
		
		}
	
	
	
   function admin_advance()
   {
        $this->loadModel('EmployeeAdvance');
		
		$date=date('Y-m-d');
		$a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']); 
		
	    $this->EmployeeAdvance->recursive = 0;
		$this->paginate = array('limit'=>10,'order'=>'Employee.first_name ASC');
		$this->set('EmployeeAdvances', $this->paginate('EmployeeAdvance'));
   }
   
   
   
   
   function admin_download($dl = 1, $fileName =  null)
	{
		$folder = APP.'files'.DS.'employees'.DS;
		$path_parts = pathinfo($folder.$fileName);

		$mime = mime_content_type($folder.$fileName);
		
		$this->view = 'Media';
		$params = array(
			'id' => $path_parts['basename'],
			'name' => $path_parts['filename'],
			'download' => $dl,
			'extension' => $path_parts['extension'],
			'mimeType' => array($path_parts['extension'] => $mime),
			'path' => $folder
		);
		$this->set($params);
	}
   
    function admin_joiningmanagement($com_id=null)
	{
	
	    $this->loadModel('Designation'); //if it's not already loaded
		 $this->loadModel('Employee');
		
		$options = $this->Designation->find('list', array(
		       'fields' => array('Designation.id', 'Designation.designation'),
		       'recursive' => 0 ));
		$this->set('Designation',$options);
		
		$this->set('Report','');
		if($com_id){
		
		$result = $this->Employee->query("SELECT * FROM employees where employees.designation_id='$com_id'"); 
		
		$this->set('Report',$result);
		}
	}
	

    function admin_searchid($com_id=null)
	{
	
	    $this->loadModel('Designation'); //if it's not already loaded
		 $this->loadModel('Employee');
		
		$options = $this->Employee->find('list', array(
		       'fields' => array('employee_id', 'first_name'),
		       'recursive' => 0 ));
		$this->set('designations',$options);
		
		$this->set('Report','');
		if($com_id){
		
		$result = $this->Employee->query("SELECT * FROM employees where employees.employee_id='$com_id'"); 
		
		$this->set('Report',$result);
		}
	}

	function admin_report($com_id=null)
	{
          $this->layout="";	

	if($com_id){
		
		$result = $this->Employee->query("SELECT * FROM employees where employees.designation_id='$com_id'"); 
		
		$this->set('Report',$result);
		}
	
	}

	function admin_empreport($com_id=null)
	{
	$this->layout="";	
	if($com_id){
		
		$Report = $this->Employee->query("SELECT * FROM employees where employees.employee_id='$com_id'"); 
		$employees = $this->Employee->findByEmployeeId($com_id); 
		
		$this->set(compact(array('Report','employees')));
		}
	
	}	
   
	function admin_add()
	{	
		$this->loadModel('Employee');
		
		/*$this->loadModel('JobCategory'); //if it's not already loaded
		$options = $this->JobCategory->find('list', array(
		       'fields' => array('JobCategory.id', 'JobCategory.name'),
		       'recursive' => 0 ));
		$this->set('jobcategories',$options);*/
		
		/*$this->loadModel('Nationality'); //if it's not already loaded
		$options = $this->Nationality->find('list', array(
		       'fields' => array('Nationality.id', 'Nationality.name'),
		       'recursive' => 0 ));
		$this->set('nationality',$options);*/
	
        /*$this->loadModel('Company'); //if it's not already loaded
		$options = $this->Company->find('list', array(
		       'fields' => array('Company.id', 'Company.company_name'),
		       'recursive' => 0 ));
		$this->set('companies',$options);*/
		
		/*$this->loadModel('Department');
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);*/
		
		/*
		$this->loadModel('Job');
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$num_options_0 = $this->Job->lists('num_options_0');
		$num_years = $this->Job->lists('num_years');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
	*//*
		$this->loadModel('District');
		$districts = $this->District->find('list', array('order'=>array('name ASC')));
		$application_formats = $this->Job->JobDetail->lists('application_formats');*/
		/*
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		*//*
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		*/
                
		$this->loadModel('Designation');
		$designations = $this->Designation->find('list',array('fields'=>array('id','designation')));
                
		$this->set(compact('designations'));
		
		
		if (!empty($this->data)) 
		{
		

				   //$this->Employee->recursive = -1;
		
					$this->Employee->set($this->data);
					$this->Employee->create();
					//Operator Id
					
					if ($this->Employee->saveAll($this->data,  array('validate'=>'first'))) 
					{
                                                if($this->data['Employee']['content_temp']['size'])
						{
							App::import('Component', 'Thumb');
							$this->Thumb  = new ThumbComponent();
							if($this->Thumb->checkFile($this->data['Employee']['content_temp'])){
								$Employeepicture =  $this->Thumb->generateThumb($this->data['Employee']['content_temp'], WWW_ROOT.'img'.DS.'employees', WWW_ROOT.'img'.DS.'employees_thumb'); // Upload File
								$this->Employee->saveField('content', $Employeepicture);
							}
						}
						$this->Session->setFlash(__('The Employee has been saved', true));
						$this->redirect(array('action' => 'admin_index'));
					}else {
						$this->Session->setFlash(__('The Employee could not be saved. Please, try again.', true));
					}
	
		}
		
		
	 }
	 
	 
	 	function admin_edit($employee_id = null) {
	   
		$this->loadModel('Employee');
		/*
		$this->loadModel('JobCategory'); //if it's not already loaded
		$options = $this->JobCategory->find('list', array(
		       'fields' => array('JobCategory.id', 'JobCategory.name'),
		       'recursive' => 0 ));
		$this->set('jobcategories',$options);
		
		$this->loadModel('Nationality'); //if it's not already loaded
		$options = $this->Nationality->find('list', array(
		       'fields' => array('Nationality.id', 'Nationality.name'),
		       'recursive' => 0 ));
		$this->set('nationality',$options);
	
        $this->loadModel('Company'); //if it's not already loaded
		$options = $this->Company->find('list', array(
		       'fields' => array('Company.id', 'Company.company_name'),
		       'recursive' => 0 ));
		$this->set('companies',$options);
		
		$this->loadModel('Department');
		$options = $this->Department->find('list', array(
		       'fields' => array('Department.id', 'Department.dept_name'),
		       'recursive' => 0 ));
		$this->set('departments',$options);
		
		
		$this->loadModel('Job');
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$num_options_0 = $this->Job->lists('num_options_0');
		$num_years = $this->Job->lists('num_years');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
	
		$this->loadModel('District');
		$districts = $this->District->find('list', array('order'=>array('name ASC')));
		$application_formats = $this->Job->JobDetail->lists('application_formats');
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		
		$this->set(compact('educations','genders','districts','position_types','levels','num_options','salaries','salary_types','locations','num_years'));
		
	    $a=$this->Auth->user();
		$this->set('user_id', $a['User']['id']);
		$this->set('group_id',$a['User']['group_id']);
		
		 $this->loadModel('Company'); //if it's not already loaded
		$options = $this->Company->find('list', array(
		       'fields' => array('Company.id', 'Company.company_name'),
		       'recursive' => 0 ));
		$this->set('companies',$options);
                */
		 
		$this->loadModel('Designation');
		$designations = $this->Designation->find('list',array('fields'=>array('id','designation')));
                
		$this->set(compact('designations'));
		if (!$employee_id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Customer', true));
			$this->redirect(array('action' => 'index'));
		}
	    
		if (!empty($this->data)) {
		
			if ($this->Employee->save($this->data)) {
			    $this->Session->setFlash(__('The Employee has been saved', true));
				$this->redirect(array('action' => 'index'));
			  
			} else {
				$this->Session->setFlash(__('Employee could not be saved.Please, Fill up the highlighted fields properly.', true));
			}
			}
			
		
		if (empty($this->data)) {
			$this->data = $this->Employee->read(null, $employee_id);
			$this->set('Employee',$this->data);
		
		}
		}
		
		
		
	function admin_delete($employee_id = null) {
	
		if (!$employee_id) {
			$this->Session->setFlash(__('Invalid id for Employee', true));
			$this->redirect($this->referer());
		}
		if ($this->Employee->delete($employee_id)) {
			$this->Session->setFlash(__('Employee deleted', true));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Employee was not deleted', true));
		$this->redirect($this->referer());
	}

	 
	 
	 	function admin_deleteadvance($id = null) {
	
	    	$this->loadModel('EmployeeAdvance');
	 
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for employee advance data', true));
			$this->redirect($this->referer());
		}
		if ($this->EmployeeAdvance->delete($id)) {
			$this->Session->setFlash(__('Employee Advance data  deleted', true));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Employee Advance data  was not deleted', true));
		$this->redirect($this->referer());
	}

}

?>