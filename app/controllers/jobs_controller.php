<?php
class JobsController extends AppController {

	var $name = 'Jobs';
	var $components = array('RequestHandler');
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('autosearch', 'search','category', 'details','search_advanced','hot','latest');
	}
	
	
	function autosearch()
	{
		//$this->layout = 'default';
		//sleep(1);
		$this->helpers[] = 'Text';
		App::import('Sanitize');
		$this->params['form']['q'] = Sanitize::paranoid($this->params['form']['q'], array(' '));
		$this->params['form']['q'] = substr($this->params['form']['q'], 0, 65);
		
		if($this->params['form']['q'] != "")
		{
			$conds = explode(' ',trim($this->params['form']['q']));
			$conditions['OR'] = array();
			$highlight = array();
			array_push($conditions['OR'], "Job.title like '%".$conds."%'");
			array_push($conditions['OR'], "Category.name like '%".$conds."%'");
			foreach($conds as $cond)
			{
				if($cond == "" || strlen($cond) == 1 ) continue;
				array_push($conditions['OR'], "Job.title like '%".$cond."%'");
				array_push($conditions['OR'], "Job.tags like '%".$cond."%'");
				array_push($conditions['OR'], "Category.name like '%".$cond."%'");
				array_push($conditions['OR'], "Job.company_name like '%".$cond."%'");
				array_push($highlight, $cond);
			}
			$this->set('highlight',$highlight);
			
			$this->Job->recursive = 0;
			$this->Job->unbindModel(
				array(
				'hasOne' => array('JobDetail'),
				'belongsTo' => array('CompanyProfile'),
				), 
				false
			);
			
			$this->set('jobs', $this->Job->find('all', array(
				'limit'=>'10', 
				'conditions'=> $conditions,
				'fields'=>array('Job.id','Job.title','Job.education','Job.application_deadline','Job.created','Job.company_name', 'Category.name'),
				'order'=>array('Job.created DESC'))));
		}
	}
	
	function search()
	{
		$educations = $this->Job->lists('educations');
		$this->set(compact('educations'));
		App::import('Sanitize');
		
		
		$this->params['url']['q'] = Sanitize::paranoid($this->params['url']['q'], array(' '));
		$this->params['url']['q'] = substr($this->params['url']['q'], 0, 65);
		
		if($this->params['url']['q'] != "")
		{
			$conds = explode(' ',trim($this->params['url']['q']));
			$conditions['OR'] = array();
			$highlight = array();
			array_push($conditions['OR'], "Job.title like '%".$conds."%'");
			array_push($conditions['OR'], "Category.name like '%".$conds."%'");
			foreach($conds as $cond)
			{
				if($cond == "" || strlen($cond) == 1 ) continue;
				array_push($conditions['OR'], "Job.title like '%".$cond."%'");
				array_push($conditions['OR'], "Job.tags like '%".$cond."%'");
				array_push($conditions['OR'], "Category.name like '%".$cond."%'");
				array_push($conditions['OR'], "Job.company_name like '%".$cond."%'");
				array_push($highlight, $cond);
			}
			$this->Job->recursive = 0;
			$this->Job->unbindModel(
				array(
				'hasOne' => array('JobDetail'),
				'belongsTo' => array('CompanyProfile'),
				), 
				false
			);
			$this->paginate = array(
				'limit'=>'20', 
				'conditions'=> $conditions,
				'fields'=>array('Job.id','Job.title','Job.education','Job.application_deadline','Job.created','Job.company_name'),
				'order'=>array('Job.created DESC')
			);
			$this->set('jobs', $this->paginate());
		}
	}

	function hot()
	{
		$educations = $this->Job->lists('educations');
		$this->set(compact('educations'));

		$this->Job->recursive = 0;
		$this->Job->unbindModel(
			array(
//			'hasOne' => array('JobDetail'),
			'belongsTo' => array('Category', 'CompanyProfile'),
			), 
			false
		);
		
		$jobs = $this->Job->find('all', array(
			'limit'=>'5', 
			'fields'=>array('Job.id','Job.title','Job.education','Job.application_deadline','Job.created','Job.company_name','JobDetail.logo'),
			'conditions'=>array('Job.active'=>'1','Job.hotjob'=>'1'),
			'order'=>array('Job.id DESC')
		));
		$this->set('jobs', $jobs);
	}

	function latest()
	{
		$educations = $this->Job->lists('educations');
		$this->set(compact('educations'));

		$this->Job->recursive = 0;
		$this->Job->unbindModel(
			array(
			'hasOne' => array('JobDetail'),
			'belongsTo' => array('Category','CompanyProfile'),
			), 
			false
		);
		
		$jobs = $this->Job->find('all', array(
			'limit'=>'20', 
			'conditions'=>array('Job.active'=>'1'),
			'fields'=>array('Job.id','Job.title','Job.education','Job.application_deadline','Job.created','Job.company_name'),
			'order'=>array('Job.id DESC')
		));
		$this->set('jobs', $jobs);
	}
	
	function search_advanced()
	{
		
		App::import('Component', 'Cookie');
		$this->Cookie = new CookieComponent();
		$this->Cookie->key = 'sdfsdf8754';

		$categories = $this->Job->Category->find('list');
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$num_options_0 = $this->Job->lists('num_options_0');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
		$locations = $this->Job->JobDetail->lists('locations');
		$this->loadModel('Country');
		$countries = $this->Country->find('list');
		$this->loadModel('District');
		$districts = $this->District->find('list', array('order'=>array('name ASC')));

		$this->set(compact('countries','districts','categories','educations','genders','position_types','levels','num_options','num_options_0','salaries','salary_types','locations'));
		
		if ($this->RequestHandler->isAjax()) 
		{
			$this->render('ajax_search_advanced');
		}
		else
		{
			
			$educations = $this->Job->lists('educations');
			$this->set(compact('educations'));
			App::import('Sanitize');
			$this->data = Sanitize::paranoid($this->data, array(' ','.'));
			
			$cookie_Job= $this->Cookie->read('Searchoptions.Job');
			$cookie_JobDetail= $this->Cookie->read('Searchoptions.JobDetail');
			
			if(empty($this->data) && (!empty($cookie_Job) || !empty($cookie_JobDetail))  )
			{
				$this->data['Job'] = $cookie_Job;
				$this->data['JobDetail'] = $cookie_JobDetail;
				//debug($this->data);
			}
			if(!empty($this->data))
			{
				$this->Cookie->write('Searchoptions.Job', $this->data['Job'], false);
				$this->Cookie->write('Searchoptions.JobDetail', $this->data['JobDetail'], false);
				//debug("write cookie");
			}
			if(!empty($this->data))
			{
				$conditions = array();
				foreach($this->data['Job'] as  $key=>$value)
				{
					if($value == '') continue;
					
					if($key == 'level')
						$conditions['AND']["Job.level like"]= "%".$value."%";
					elseif($key == 'tags')
					{
						$conds = explode(' ',trim($value));
						$conditions['OR']["Job.title like"] =  "%".$conds."%";
						$conditions['OR']["Category.name like"] = "%".$conds."%";
						foreach($conds as $cond)
						{
							if($cond == "" || strlen($cond) == 1 ) continue;
							$conditions['OR']["Job.title like"] =  "%".$cond."%";
							$conditions['OR']["Job.tags like"] = "%".$cond."%";
							$conditions['OR']["Category.name like"] =  "%".$cond."%";
							$conditions['OR']["Job.company_name like"] =  "%".$cond."%";
						}
						
					}
					else
				 		$conditions['AND']['Job.'.$key] = $value;
				}
				foreach($this->data['JobDetail'] as  $key=>$value)
				{
					if($value == '') continue;
					$conditions['AND']['JobDetail.'.$key." >="] = $value;
				}
				
				if(!empty($conditions))
				{
					$this->Job->recursive = 0;
					$this->Job->unbindModel(
						array(
						'belongsTo' => array('CompanyProfile'),
						), 
						false
					);
					$this->paginate = array(
						'limit'=>'20', 
						'conditions'=> $conditions,
						'fields'=>array('Job.id','Job.title','Job.education','Job.application_deadline','Job.created','Job.company_name'),
						'order'=>array('Job.created DESC')
					);
					$this->set('jobs', $this->paginate());
				}
			}
			
			
		}
	}
	
	function category($category_id = null, $category_slug = null)
	{
		$this->Job->Category->recursive = -1;
		$category  = $this->Job->Category->read(null, $category_id);
		$this->set('category', $category);
		
		$this->set('title_for_layout', htmlspecialchars($category['Category']['name'])." Jobs");
		
		
		$educations = $this->Job->lists('educations');
		$this->set(compact('educations'));

		$this->Job->recursive = 0;
		$this->Job->unbindModel(
			array(
			'hasOne' => array('JobDetail'),
			'belongsTo' => array('Category'),
			), 
			false
		);
		
		$this->paginate = array(
			'limit'=>'20', 
			'conditions'=>array('Job.category_id'=>$category_id, 'Job.active'=>'1'),
			'fields'=>array('Job.id','Job.title','Job.education','Job.application_deadline','Job.created','Job.company_name'),
			'order'=>array('Job.id DESC')
		);
		$this->set('jobs', $this->paginate());
	}
	
	function details($id = null, $back = null)
	{
		$this->helpers[] = 'Text';
		$this->Job->unbindModel(
			array('belongsTo' => array('CompanyProfile'))
		);
		$job = $this->Job->read(null, $id);
		$this->set('job', $job);
		
		$this->set('title_for_layout', htmlspecialchars($job['Job']['title']." at ".$job['Job']['company_name']));

		if(!empty($job['JobDetail']['country'])){
			$job['JobDetail']['countries'] = array();
			foreach(explode(",", $job['JobDetail']['country']) as $country){
				array_push($job['JobDetail']['countries'], $country);
			}
			$this->loadModel('Country');
			$countries = $this->Country->find('list', array('conditions'=>array('id'=>$job['JobDetail']['countries'])));
			$this->set('countries', $countries);
		}
		
		if(!empty($job['JobDetail']['district'])){
			$job['JobDetail']['districts'] = array();
			foreach(explode(",", $job['JobDetail']['district']) as $district){
				array_push($job['JobDetail']['districts'], $district);
			}
			$this->loadModel('District');
			$districts = $this->District->find('list', array('conditions'=>array('id'=>$job['JobDetail']['districts'])));
			$this->set('districts', $districts);
		}
		
		
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
		$locations = $this->Job->JobDetail->lists('locations');
		
		
		$application_formats = $this->Job->JobDetail->lists('application_formats');
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		
		$this->set(compact('experiences','business_types','categories','educations','genders','position_types','levels','num_options','salaries','salary_types','locations','application_formats'));
		
	}
	
	function company_view($id=null)
	{
		$this->helpers[] = 'Text';
		$this->Job->unbindModel(
			array('belongsTo' => array('CompanyProfile'))
		);
		$job = $this->Job->read(null, $id);
		$this->set('job', $job);
		
		if(!empty($job['JobDetail']['country'])){
			$job['JobDetail']['countries'] = array();
			foreach(explode(",", $job['JobDetail']['country']) as $country){
				array_push($job['JobDetail']['countries'], $country);
			}
			$this->loadModel('Country');
			$countries = $this->Country->find('list', array('conditions'=>array('id'=>$job['JobDetail']['countries'])));
			$this->set('countries', $countries);
		}
		
		if(!empty($job['JobDetail']['district'])){
			$job['JobDetail']['districts'] = array();
			foreach(explode(",", $job['JobDetail']['district']) as $district){
				array_push($job['JobDetail']['districts'], $district);
			}
			$this->loadModel('District');
			$districts = $this->District->find('list', array('conditions'=>array('id'=>$job['JobDetail']['districts'])));
			$this->set('districts', $districts);
		}

		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
		$locations = $this->Job->JobDetail->lists('locations');
		$application_formats = $this->Job->JobDetail->lists('application_formats');
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		
		$this->set(compact('experiences','business_types','countries','districts','categories','educations','genders','position_types','levels','num_options','salaries','salary_types','locations','application_formats'));
		
		
	}
	
	function company_myjobs()
	{
		$this->Job->CompanyProfile->recursive = -1;
		$company_info = $this->Job->CompanyProfile->find('first', array(
		'conditions'=>array('user_id'=>$this->Auth->User('id')),
		'fields' =>array(
			'CompanyProfile.id','CompanyProfile.user_id','CompanyProfile.company_name'
		)));  
		$this->set('company_info', $company_info);
		$educations = $this->Job->lists('educations');
		$this->set('educations', $educations);

		$this->Job->unbindModel(
			array('belongsTo' => array('CompanyProfile'))
		);
		$this->paginate =  array(
		'limit'=>50,
		'order'=>array('Job.created DESC'),
		'conditions'=>array('company_profile_id'=>$company_info['CompanyProfile']['id']),
		'fields' =>array(
			'Job.id','Job.title','Job.designation','Job.designation','Category.name','Job.education',
			'Job.start_date','Job.application_deadline','Job.active','Job.created','Job.modified', 'JobDetail.remark'
		));
		$this->set('jobs', $this->paginate());
	}
	
	function company_edit($id = null)
	{
		$this->Job->CompanyProfile->recursive = -1;
		$company_info = $this->Job->CompanyProfile->find('first', array('fields'=>array('CompanyProfile.id','CompanyProfile.company_name', 'CompanyProfile.logo','CompanyProfile.company_address_1','CompanyProfile.company_address_2','CompanyProfile.business_description'),'conditions'=>array('user_id'=>$this->Auth->User('id'))));  
		$this->set('company_info', $company_info);
		
		$categories = $this->Job->Category->find('list');
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$num_options_0 = $this->Job->lists('num_options_0');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
		$locations = $this->Job->JobDetail->lists('locations');
		$this->loadModel('Country');
		$countries = $this->Country->find('list', array('conditions'=>array('Country.id !='=>'18')));
		$this->loadModel('District');
		$districts = $this->District->find('list', array('order'=>array('name ASC')));
		$application_formats = $this->Job->JobDetail->lists('application_formats');
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		
		$this->set(compact('experiences','business_types','countries','districts','categories','educations','genders','position_types','levels','num_options','num_options_0','salaries','salary_types','locations','application_formats'));
		
		if (!empty($this->data)) 
		{
			//application format
			$applications_formats = array();
			if(!empty($this->data['JobDetail']['application_formats']))
			{			
				foreach($this->data['JobDetail']['application_formats'] as $key=>$value)
						array_push($applications_formats, $key);
			}
			$this->data['JobDetail']['application_format'] =  implode($applications_formats, ",");
			
			//position level
			$job_levels = array();
			if(!empty($this->data['Job']['levels']))
			{
				foreach($this->data['Job']['levels'] as $key=>$value)
					array_push($job_levels, $key);
			}
			$this->data['Job']['level'] =  implode($job_levels, ",");
			
			//district
			$districts_name = array();
			if(!empty($this->data['JobDetail']['districts']))
			{			
				foreach($this->data['JobDetail']['districts'] as $key=>$value)
						array_push($districts_name, $key);
			}
			$this->data['JobDetail']['district'] =  implode($districts_name, ",");
			
			//country
			$countries_name = array();
			if(!empty($this->data['JobDetail']['countries']))
			{			
				foreach($this->data['JobDetail']['countries'] as $key=>$value)
						array_push($countries_name, $key);
			}
			$this->data['JobDetail']['country'] =  implode($countries_name, ",");
			
			//Experience 
			$experiences = array();
			if(!empty($this->data['JobDetail']['expes']))
			{			
				foreach($this->data['JobDetail']['expes'] as $key=>$value)
						array_push($experiences, $key);
			}
			$this->data['JobDetail']['experience'] =  implode($experiences, ",");
			
			//Industry Experience 
			$indus_experiences = array();
			if(!empty($this->data['JobDetail']['indus']))
			{			
				foreach($this->data['JobDetail']['indus'] as $key=>$value)
						array_push($indus_experiences, $key);
			}
			$this->data['JobDetail']['indus_experience'] =  implode($indus_experiences, ",");
			
			//reset data
			if($this->data['JobDetail']['salary'] != 'RN')
			{
				$this->data['JobDetail']['min_salary'] = "";
				$this->data['JobDetail']['max_salary'] = "";
			}
			
			$this->Job->set($this->data);
			$validJob = $this->Job->validates();
			$this->Job->JobDetail->set($this->data);
			$validJobDetail = $this->Job->JobDetail->validates();
			
			$error = false;
			if(!empty($this->data['JobDetail']['application_formats']['EMAIL']) && empty($this->data['JobDetail']['application_email']))
			{
				$this->Job->JobDetail->invalidate('application_email', 'Please enter an email to send CV');
				$error = true;
			}
			if(empty($this->data['JobDetail']['application_formats']['EMAIL']))
			{
				$this->data['JobDetail']['application_email'] = "";
			}
			
			if($validJob && $validJobDetail && !$error)
			{
				$this->data['Job']['company_name'] = $company_info['CompanyProfile']['company_name'];
				$this->data['JobDetail']['logo'] = $company_info['CompanyProfile']['logo'];
				$this->data['JobDetail']['company_address_1'] = $company_info['CompanyProfile']['company_address_1'];
				$this->data['JobDetail']['company_address_2'] = $company_info['CompanyProfile']['company_address_2'];
				$this->data['JobDetail']['business_description'] = $company_info['CompanyProfile']['business_description'];
				
				if ($this->Job->saveAll($this->data, array('validate' => false))) 
				{
					$this->Session->setFlash(__('The job has been saved', true));
					$this->redirect(array('action' => 'view', $this->data['Job']['id']));
				} 
				else 
				{
					$this->Session->setFlash(__('The job could not be saved. Please, supply all required information.', true));
				}
			}
		}
		
		if (empty($this->data)) 
		{
			$this->Job->recursive = 0;
			$this->Job->unbindModel(
				array('belongsTo' => array('CompanyProfile'))
			);
			$this->data = $this->Job->read(null, $id);
			
			if(!empty($this->data['Job']['level'])){
				foreach(explode(",", $this->data['Job']['level']) as $levels){
					$this->data['Job']['levels'][$levels] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['experience'])){
				foreach(explode(",", $this->data['JobDetail']['experience']) as $experience){
					$this->data['JobDetail']['expes'][$experience] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['indus_experience'])){
				foreach(explode(",", $this->data['JobDetail']['indus_experience']) as $indus_experience){
					$this->data['JobDetail']['indus'][$indus_experience] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['country'])){
				foreach(explode(",", $this->data['JobDetail']['country']) as $country){
					$this->data['JobDetail']['countries'][$country] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['district'])){
				foreach(explode(",", $this->data['JobDetail']['district']) as $district){
					$this->data['JobDetail']['districts'][$district] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['application_format'])){
				foreach(explode(",", $this->data['JobDetail']['application_format']) as $application_format){
					$this->data['JobDetail']['application_formats'][$application_format] = 1;
				}
			}
			
			
			
		}
	}
	
	function company_add()
	{
		$this->Job->CompanyProfile->recursive = -1;
		$company_info = $this->Job->CompanyProfile->find('first', array('fields'=>array('CompanyProfile.id','CompanyProfile.company_name', 'CompanyProfile.logo','CompanyProfile.company_address_1','CompanyProfile.company_address_2','CompanyProfile.business_description'),'conditions'=>array('user_id'=>$this->Auth->User('id'))));  
		$this->set('company_info', $company_info);
		
		$categories = $this->Job->Category->find('list');
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$num_options_0 = $this->Job->lists('num_options_0');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
		$locations = $this->Job->JobDetail->lists('locations');
		$this->loadModel('Country');
		$countries = $this->Country->find('list', array('conditions'=>array('Country.id !='=>'18')));
		$this->loadModel('District');
		$districts = $this->District->find('list', array('order'=>array('name ASC')));
		$application_formats = $this->Job->JobDetail->lists('application_formats');
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		
		$this->set(compact('experiences','business_types','countries','districts','categories','educations','genders','position_types','levels','num_options','num_options_0','salaries','salary_types','locations','application_formats'));
		
		if (!empty($this->data)) 
		{
			//application format
			$applications_formats = array();
			if(!empty($this->data['JobDetail']['application_formats']))
			{			
				foreach($this->data['JobDetail']['application_formats'] as $key=>$value)
						array_push($applications_formats, $key);
			}
			$this->data['JobDetail']['application_format'] =  implode($applications_formats, ",");
			
			//position label
			$job_labels = array();
			if(!empty($this->data['Job']['levels']))
			{
				foreach($this->data['Job']['levels'] as $key=>$value)
					array_push($job_labels, $key);
			}
			$this->data['Job']['level'] =  implode($job_labels, ",");
			
			//district
			$districts_name = array();
			if(!empty($this->data['JobDetail']['districts']))
			{			
				foreach($this->data['JobDetail']['districts'] as $key=>$value)
						array_push($districts_name, $key);
			}
			$this->data['JobDetail']['district'] =  implode($districts_name, ",");
			
			//country
			$countries_name = array();
			if(!empty($this->data['JobDetail']['countries']))
			{			
				foreach($this->data['JobDetail']['countries'] as $key=>$value)
						array_push($countries_name, $key);
			}
			$this->data['JobDetail']['country'] =  implode($countries_name, ",");
			
			//Experience 
			$experiences = array();
			if(!empty($this->data['JobDetail']['expes']))
			{			
				foreach($this->data['JobDetail']['expes'] as $key=>$value)
						array_push($experiences, $key);
			}
			$this->data['JobDetail']['experience'] =  implode($experiences, ",");
			
			//Industry Experience 
			$indus_experiences = array();
			if(!empty($this->data['JobDetail']['indus']))
			{			
				foreach($this->data['JobDetail']['indus'] as $key=>$value)
						array_push($indus_experiences, $key);
			}
			$this->data['JobDetail']['indus_experience'] =  implode($indus_experiences, ",");
			
			//reset data
			if($this->data['JobDetail']['salary'] != 'RN')
			{
				$this->data['JobDetail']['min_salary'] = "";
				$this->data['JobDetail']['max_salary'] = "";
			}
			
			
			$this->Job->set($this->data);
			$validJob = $this->Job->validates();
			$this->Job->JobDetail->set($this->data);
			$validJobDetail = $this->Job->JobDetail->validates();
			
			$error = false;
			if(!empty($this->data['JobDetail']['application_formats']['EMAIL']) && empty($this->data['JobDetail']['application_email']))
			{
				$this->Job->JobDetail->invalidate('application_email', 'Please enter an email to send CV');
				$error = true;
			}
			if(empty($this->data['JobDetail']['application_formats']['EMAIL']))
			{
				$this->data['JobDetail']['application_email'] = "";
			}
			
			if($validJob && $validJobDetail && !$error)
			{
				$this->data['Job']['company_profile_id'] = $company_info['CompanyProfile']['id'];
				$this->data['JobDetail']['source_type'] = 'SELF';
				$this->data['Job']['company_name'] = $company_info['CompanyProfile']['company_name'];
				$this->data['JobDetail']['logo'] = $company_info['CompanyProfile']['logo'];
				$this->data['JobDetail']['company_address_1'] = $company_info['CompanyProfile']['company_address_1'];
				$this->data['JobDetail']['company_address_2'] = $company_info['CompanyProfile']['company_address_2'];
				$this->data['JobDetail']['business_description'] = $company_info['CompanyProfile']['business_description'];
				

				$this->Job->create();
				if ($this->Job->saveAll($this->data, array('validate' => false))) 
				{
					$this->Session->setFlash(__('The job has been saved', true));
					$this->redirect(array('action' => 'myjobs'));
				} 
				else 
				{
					$this->Session->setFlash(__('The job could not be saved. Please, supply all required information.', true));
				}
			}
		}
	}
	
  //function admin_approval()
	
  function admin_index()
	{
		$educations = $this->Job->lists('educations');
		$this->set(compact('educations'));

		$this->Job->recursive = 0;
		$this->Job->unbindModel(
			array(
			'belongsTo' => array('Category','CompanyProfile'),
			), 
			false
		);
		
		$this->paginate = array(
			'limit'=>'5', 
			//'conditions'=>array('JobDetail.source_type'=>'SELF'),
			'order'=>array('Job.created DESC'),
			'fields'=>array('Job.id','Job.title','Job.education','JobDetail.source_type','Job.application_deadline','Job.active', 'Job.created','JobDetail.remark','Job.company_name')
		);
		//$this->paginate = array('limit'=>'20');
		$this->set('jobs', $this->paginate());
	}

	function admin_edit($id = null)
	{
		$categories = $this->Job->JobCategory->find('list');
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
		$locations = $this->Job->JobDetail->lists('locations');
		$this->loadModel('Country');
		$countries = $this->Country->find('list', array('conditions'=>array('Country.id !='=>'18')));
		$this->loadModel('District');
		$districts = $this->District->find('list', array('order'=>array('name ASC')));
		$application_formats = $this->Job->JobDetail->lists('application_formats');
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		
		$this->set(compact('experiences','business_types','countries','districts','categories','educations','genders','position_types','levels','num_options','salaries','salary_types','locations','application_formats'));
		
		if (!empty($this->data)) 
		{
			//application format
			$applications_formats = array();
			if(!empty($this->data['JobDetail']['application_formats']))
			{			
				foreach($this->data['JobDetail']['application_formats'] as $key=>$value)
						array_push($applications_formats, $key);
			}
			$this->data['JobDetail']['application_format'] =  implode($applications_formats, ",");
			
			//position level
			$job_levels = array();
			if(!empty($this->data['Job']['levels']))
			{
				foreach($this->data['Job']['levels'] as $key=>$value)
					array_push($job_levels, $key);
			}
			$this->data['Job']['level'] =  implode($job_levels, ",");
			
			//district
			$districts_name = array();
			if(!empty($this->data['JobDetail']['districts']))
			{			
				foreach($this->data['JobDetail']['districts'] as $key=>$value)
						array_push($districts_name, $key);
			}
			$this->data['JobDetail']['district'] =  implode($districts_name, ",");
			
			//country
			$countries_name = array();
			if(!empty($this->data['JobDetail']['countries']))
			{			
				foreach($this->data['JobDetail']['countries'] as $key=>$value)
						array_push($countries_name, $key);
			}
			$this->data['JobDetail']['country'] =  implode($countries_name, ",");
			
			//Experience 
			$experiences = array();
			if(!empty($this->data['JobDetail']['expes']))
			{			
				foreach($this->data['JobDetail']['expes'] as $key=>$value)
						array_push($experiences, $key);
			}
			$this->data['JobDetail']['experience'] =  implode($experiences, ",");
			
			//Industry Experience 
			$indus_experiences = array();
			if(!empty($this->data['JobDetail']['indus']))
			{			
				foreach($this->data['JobDetail']['indus'] as $key=>$value)
						array_push($indus_experiences, $key);
			}
			$this->data['JobDetail']['indus_experience'] =  implode($indus_experiences, ",");
			
			//reset data
			if($this->data['JobDetail']['salary'] != 'RN')
			{
				$this->data['JobDetail']['min_salary'] = "";
				$this->data['JobDetail']['max_salary'] = "";
			}
			
			$this->Job->set($this->data);
			$validJob = $this->Job->validates();
			$this->Job->JobDetail->set($this->data);
			$validJobDetail = $this->Job->JobDetail->validates();
			
			$error = false;
			if(!empty($this->data['JobDetail']['application_formats']['EMAIL']) && empty($this->data['JobDetail']['application_email']))
			{
				$this->Job->JobDetail->invalidate('application_email', 'Please enter an email to send CV');
				$error = true;
			}
			if(empty($this->data['JobDetail']['application_formats']['EMAIL']))
			{
				$this->data['JobDetail']['application_email'] = "";
			}
			if($validJob && $validJobDetail && !$error)
			{
				if ($this->Job->saveAll($this->data, array('validate' => false))) 
				{
					$this->Session->setFlash(__('The job has been saved', true));
					$this->redirect(array('action' => 'approval'));
				} 
				else 
				{
					$this->Session->setFlash(__('The job could not be saved. Please, supply all required information.', true));
				}
			}
		}
		
		if (empty($this->data)) 
		{
			$this->Job->recursive = 0;
			$this->Job->unbindModel(
				array('belongsTo' => array('CompanyProfile'))
			);
			$this->data = $this->Job->read(null, $id);
			
			if(!empty($this->data['Job']['level'])){
				foreach(explode(",", $this->data['Job']['level']) as $levels){
					$this->data['Job']['levels'][$levels] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['experience'])){
				foreach(explode(",", $this->data['JobDetail']['experience']) as $experience){
					$this->data['JobDetail']['expes'][$experience] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['indus_experience'])){
				foreach(explode(",", $this->data['JobDetail']['indus_experience']) as $indus_experience){
					$this->data['JobDetail']['indus'][$indus_experience] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['country'])){
				foreach(explode(",", $this->data['JobDetail']['country']) as $country){
					$this->data['JobDetail']['countries'][$country] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['district'])){
				foreach(explode(",", $this->data['JobDetail']['district']) as $district){
					$this->data['JobDetail']['districts'][$district] = 1;
				}
			}
			if(!empty($this->data['JobDetail']['application_format'])){
				foreach(explode(",", $this->data['JobDetail']['application_format']) as $application_format){
					$this->data['JobDetail']['application_formats'][$application_format] = 1;
				}
			}
			
			$this->Job->CompanyProfile->recursive = -1;
			$CompanyProfile = $this->Job->CompanyProfile->find('first', array('conditions'=>array('id'=>$this->data['Job']['company_profile_id'] )));  
			$this->set('CompanyProfile', $CompanyProfile);
			
			
			
			
		}
	}
	
	function admin_add() 
	{
		$categories = $this->Job->JobCategory->find('list');
		$educations = $this->Job->lists('educations');
		$genders = $this->Job->lists('genders');
		$position_types = $this->Job->lists('position_types');
		$levels = $this->Job->lists('levels');
		$num_options = $this->Job->lists('num_options');
		$salaries = $this->Job->lists('salaries');
		$salary_types = $this->Job->lists('salary_types');
		$locations = $this->Job->JobDetail->lists('locations');
		$this->loadModel('Country');
		$countries = $this->Country->find('list', array('conditions'=>array('Country.id !='=>'18')));
		$this->loadModel('District');
		$districts = $this->District->find('list', array('order'=>array('name ASC')));
		$application_formats = $this->Job->JobDetail->lists('application_formats');
		$this->loadModel('Experience');
		$experiences = $this->Experience->find('list');
		$this->loadModel('BusinessType');
		$business_types = $this->BusinessType->find('list');
		
		$this->set(compact('experiences','business_types','countries','districts','categories','educations','genders','position_types','levels','num_options','salaries','salary_types','locations','application_formats'));
		
		if (!empty($this->data)) 
		{
			//application format
			$applications_formats = array();
			if(!empty($this->data['JobDetail']['application_formats']))
			{			
				foreach($this->data['JobDetail']['application_formats'] as $key=>$value)
						array_push($applications_formats, $key);
			}
			$this->data['JobDetail']['application_format'] =  implode($applications_formats, ",");
			
			//position label
			$job_labels = array();
			if(!empty($this->data['Job']['levels']))
			{
				foreach($this->data['Job']['levels'] as $key=>$value)
					array_push($job_labels, $key);
			}
			$this->data['Job']['level'] =  implode($job_labels, ",");
			
			//district
			$districts_name = array();
			if(!empty($this->data['JobDetail']['districts']))
			{			
				foreach($this->data['JobDetail']['districts'] as $key=>$value)
						array_push($districts_name, $key);
			}
			$this->data['JobDetail']['district'] =  implode($districts_name, ",");
			
			//country
			$countries_name = array();
			if(!empty($this->data['JobDetail']['countries']))
			{			
				foreach($this->data['JobDetail']['countries'] as $key=>$value)
						array_push($countries_name, $key);
			}
			$this->data['JobDetail']['country'] =  implode($countries_name, ",");
			
			//Experience 
			$experiences = array();
			if(!empty($this->data['JobDetail']['expes']))
			{			
				foreach($this->data['JobDetail']['expes'] as $key=>$value)
						array_push($experiences, $key);
			}
			$this->data['JobDetail']['experience'] =  implode($experiences, ",");
			
			//Industry Experience 
			$indus_experiences = array();
			if(!empty($this->data['JobDetail']['indus']))
			{			
				foreach($this->data['JobDetail']['indus'] as $key=>$value)
						array_push($indus_experiences, $key);
			}
			$this->data['JobDetail']['indus_experience'] =  implode($indus_experiences, ",");
			
			//reset data
			if($this->data['JobDetail']['salary'] != 'RN')
			{
				$this->data['JobDetail']['min_salary'] = "";
				$this->data['JobDetail']['max_salary'] = "";
			}
			
			
			$this->Job->set($this->data);
			$validJob = $this->Job->validates();
			$this->Job->JobDetail->set($this->data);
			$validJobDetail = $this->Job->JobDetail->validates();
			
			$error = false;
			if(!empty($this->data['JobDetail']['application_formats']['EMAIL']) && empty($this->data['JobDetail']['application_email']))
			{
				$this->Job->JobDetail->invalidate('application_email', 'Please enter an email to send CV');
				$error = true;
			}
			if(empty($this->data['JobDetail']['application_formats']['EMAIL']))
			{
				$this->data['JobDetail']['application_email'] = "";
			}
			
			if($validJob && $validJobDetail && !$error)
			{
				$this->data['Job']['company_profile_id'] = '7'; // Default company for newspaper job
				$this->data['JobDetail']['source_type'] = 'NEWS';

				$this->Job->create();
				if ($this->Job->saveAll($this->data, array('validate' => false))) 
				{
					$this->Session->setFlash(__('The job has been saved', true));
					$this->redirect(array('action' => 'approval'));
				} 
				else 
				{
					$this->Session->setFlash(__('The job could not be saved. Please, supply all required information.', true));
				}
			}
		}
	
		

	}

	function company_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for job', true));
			$this->redirect($this->referer());
		}
		if ($this->Job->delete($id)) {
			$this->Session->setFlash(__('Job deleted', true));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Job was not deleted', true));
		$this->redirect($this->referer());
	}

/*
	function index() {
		$this->Job->recursive = 0;
		$this->set('jobs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid job', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('job', $this->Job->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Job->create();
			if ($this->Job->save($this->data)) {
				$this->Session->setFlash(__('The job has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.', true));
			}
		}
		$companyProfiles = $this->Job->CompanyProfile->find('list');
		$categories = $this->Job->Category->find('list');
		$this->set(compact('companyProfiles', 'categories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid job', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Job->save($this->data)) {
				$this->Session->setFlash(__('The job has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Job->read(null, $id);
		}
		$companyProfiles = $this->Job->CompanyProfile->find('list');
		$categories = $this->Job->Category->find('list');
		$this->set(compact('companyProfiles', 'categories'));
	}
*/
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for job', true));
			$this->redirect($this->referer());
		}
		if ($this->Job->delete($id)) {
			$this->Session->setFlash(__('Job deleted', true));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Job was not deleted', true));
		$this->redirect($this->referer());
	}
	
}
?>