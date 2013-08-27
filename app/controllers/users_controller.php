<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('RequestHandler');
	
	function beforeFilter()
 	{
		parent::beforeFilter();
		
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login','admin'=>false);
		$this->Auth->userScope = array('User.active' => '1');
		$this->Auth->authorize = 'controller';
		$this->Auth->loginError = "Sorry, there is no match for that username and/or password.";
		$this->Auth->fields = array('username' => 'email_address', 'password' => 'password');
		
		$this->Auth->allow('registration','forgotpassword','mysaved');
		$this->Auth->autoRedirect = false;
	} 

	
	function admin_resetpassword($id = null) 
	{
		$this->layout = "admin_layout";		
		if (!$id && empty($this->data)) 
		{
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data))
		{
				$error = false;
				if($this->data['User']['new_pwd'] == '' || $this->data['User']['new_pwd'] == null)
				{
					$this->User->invalidate('new_pwd', 'Please enter new password');
					$this->data['User']['confirm_pwd'] = "";
					$error = true;
				}
				else if(strcmp($this->data['User']['new_pwd'], $this->data['User']['confirm_pwd']) != 0)
				{
					$this->User->invalidate('new_pwd', 'Your passwords do not match');
					$error = true;
					
					$this->data['User']['new_pwd'] = "";
					$this->data['User']['confirm_pwd'] = "";
				}
				
				if(!$error)
				{
					$this->User->id = $this->data['User']['id'];  
					$this->User->saveField('password', $this->Auth->password($this->data['User']['new_pwd'] ), true);
					$this->User->save($this->data);
					$this->Session->setFlash(__('Password has been changed', true));
					$this->redirect(array('action'=>'index'));
				}
		}
		else
		{
			$this->data = $this->User->read(null, $id);
		}
	}
	
	function changepassword() 
	{
		if (!empty($this->data))
		{
			$user = $this->Session->read('Auth');
			$this->User->id = $user['User']['id'];  
			$me = $this->User->findById($this->User->id);
			
			$error = false;
			if($this->data['User']['curr_pwd'] == '' || $this->data['User']['curr_pwd'] == null )
			{
				$this->User->invalidate('curr_pwd', 'Please enter current password');
				$error = true;
			}
			else if(strcmp($this->Auth->password($this->data['User']['curr_pwd']),  $me['User']['password']) != 0)
			{
				$this->User->invalidate('curr_pwd', 'Invalid current password');
				$error = true;
			}
			
			if($this->data['User']['new_pwd'] == '' || $this->data['User']['new_pwd'] == null)
			{
				$this->User->invalidate('new_pwd', 'Please enter new password');
				$this->data['User']['confirm_pwd'] = "";
				$error = true;
				
			}
			else if(strcmp($this->data['User']['new_pwd'], $this->data['User']['confirm_pwd']) != 0)
			{
				$this->User->invalidate('new_pwd', 'Your passwords do not match');
				$error = true;
				
				$this->data['User']['new_pwd'] = "";
				$this->data['User']['confirm_pwd'] = "";
			}
			
			if(!$error)
			{
				$this->User->saveField('password', $this->Auth->password($this->data['User']['new_pwd']), true);
				$this->Session->setFlash(__('Password has been changed', true));
				$this->redirect(array('action'=>'mysaved'));
			}
			
		}
	}
	
	function admin_changepassword() 
	{
		if (!empty($this->data))
		{
			$user = $this->Session->read('Auth');
			$this->User->id = $user['User']['id'];  
			$me = $this->User->findById($this->User->id);
			
			$error = false;
			if($this->data['User']['curr_pwd'] == '' || $this->data['User']['curr_pwd'] == null )
			{
				$this->User->invalidate('curr_pwd', 'Please enter current password');
				$error = true;
			}
			else if(strcmp($this->Auth->password($this->data['User']['curr_pwd']),  $me['User']['password']) != 0)
			{
				$this->User->invalidate('curr_pwd', 'Invalid current password');
				$error = true;
			}
			
			if($this->data['User']['new_pwd'] == '' || $this->data['User']['new_pwd'] == null)
			{
				$this->User->invalidate('new_pwd', 'Please enter new password');
				$this->data['User']['confirm_pwd'] = "";
				$error = true;
				
			}
			else if(strcmp($this->data['User']['new_pwd'], $this->data['User']['confirm_pwd']) != 0)
			{
				$this->User->invalidate('new_pwd', 'Your passwords do not match');
				$error = true;
				
				$this->data['User']['new_pwd'] = "";
				$this->data['User']['confirm_pwd'] = "";
			}
			
			if(!$error)
			{
				$this->User->saveField('password', $this->Auth->password($this->data['User']['new_pwd']), true);
				$this->Session->setFlash(__('Password has been changed', true));
				$this->redirect(array('action'=>'changepassword'));
			}
			
		}
	}
	
	function forgotpassword() 
	{
		if(!empty($this->data)) 
		{
			$this->User->set($this->data);
			if(!Validation::email($this->data['User']['email_address']))
			{
				$this->User->invalidate('email_address', 'Please enter your email address');
			}
			else
      		{
				$this->User->recursive = -1;
				$userinfo = $this->User->find(array('email_address'=>$this->data['User']['email_address']));
				if(!empty($userinfo))
				{
					$newpass = mt_rand(10000, 99999);
					$this->User->id = $userinfo['User']['id'];
					$this->User->saveField('password', $this->Auth->password($newpass));
					$this->Session->setFlash(__('Your new password has sent to your mail box, please check your email', true));
					$userinfo['User']['password'] = $newpass;
					
					$this->requestAction('mailer/forgotpassword',array('user' => $userinfo));
				}
				else
				{
					$this->Session->setFlash(__('Member does not exist', true));
				}
      		}
		}
	}
	
	function login() 
	{
		if($this->Auth->User())
		{
			// for pending favorite save operation
			if($this->Session->read('fav_save'))
			{
				$this->redirect(array('controller'=>'favorites','action'=>'add'));
			}
			
			if($this->Auth->User('group_id') == '1' || $this->Auth->User('group_id') == '3' || $this->Auth->User('group_id') == '4')
			{
				$this->redirect(array('controller'=>'dashboards','action'=>'index', 'admin'=>true, 'language'=>''));
			}
			else
			{
				$this->redirect(array('controller'=>'users','action'=>'mysaved'));
			}
		}
	}

	function logout() 
	{
    	$this->Auth->logout();
		$this -> Session -> destroy();
    	$this->redirect("/");
	}

	function admin_login() 
	{
		$this->redirect('/users/login');
	}

	function admin_index() 
	{
		$user = $this->Session->read('Auth');
		if($user['User']['group_id']=='1'){
		$this->User->recursive = 0;
		/*$this->paginate = array('conditions'=>array('User.group_id !='=>'3'));*/
		$this->paginate = array('conditions'=>array(''));
		$this->set('users', $this->paginate());
		}else $this->redirect('/admin/dashboard/');
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() 
	{
		if (!empty($this->data)) 
		{
			if($this->data['User']['password'] == $this->Auth->password(""))
			{
				$this->data['User']['password'] = "";
			}

			App::import('Sanitize');
			$this->User->create();
			$this->data = Sanitize::clean($this->data); 
			
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(__('New account created.', true));
				$this->redirect(array('action' => 'index'));
			} 
			else 
			{
				$this->Session->setFlash(__('The user could not be saved. Please,  fill up the highlighted fields properly.', true));
				$this->data['User']['password'] = "";
			}
		}
		else
		{
			//$this->data['User']['active'] = "1";
		}
		/*$groups = $this->User->Group->find('list',array('conditions'=>array('id !='=>'3')));*/
		$groups = $this->User->Group->find('list',array('conditions'=>array('')));
		$this->set(compact('groups'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		    App::import('Sanitize');
			$this->data = Sanitize::clean($this->data); 
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please,  fill up the highlighted fields properly.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		/*$groups = $this->User->Group->find('list',array('conditions'=>array('id !='=>'3')));*/
		$groups = $this->User->Group->find('list',array('conditions'=>array('')));
		$this->set(compact('groups'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>