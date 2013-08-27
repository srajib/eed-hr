<?php
class MailerController extends AppController 
{
  var $name = 'Mailer';
	var $uses = "";
	var $components = array('Email'); 

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('*');
	} 
	function sendproperty()
	{
  	    $listing_array = $this->params['listing_array'];
		$this->Email->to       = $listing_array['email_address'];
		$this->Email->subject  = "[Progati]".$listing_array['fromname']." wants you to see a property";
		$this->Email->replyTo  = 'info@progatibd.org';
		$this->Email->from     = 'info@progatibd.org';
		$this->Email->sendAs   = 'html';
		$this->Email->template = 'sendproperty';
		$this->set('listing', $listing_array);
		//$this->Email->delivery = 'debug';
		$this->Email->send();
		return "";

	}
	
	function feedback()
	{
	 	$contact = $this->params['contact'];
		$this->Email->to       = array('info@progatibd.org');
//		$this->Email->bcc       = array('awrussel2002@gmail.com');
		$this->Email->subject  = "Client feedback  - ".date("j-M-Y"); ;
		$this->Email->replyTo  = $contact['email_address'];
		$this->Email->from     = $contact['email_address'];
		$this->Email->sendAs   = 'html';
		$this->Email->template = 'feedback';

		$this->set('contact', $contact);
		$this->Email->send();
		return "";
	}

	
	function forgotpassword()
  	{
  	    $user = $this->params['user'];
		$this->Email->to       = $user['User']['email_address'];
		$this->Email->subject  = "Forgot password request for WP2Evaluation";
		$this->Email->replyTo  = 'info@progatibd.org';
		$this->Email->from     = 'info@progatibd.org';
		$this->Email->sendAs   = 'html';
		$this->Email->template = 'forgotpassword';
		$this->set('user', $user);
		$this->Email->send();
		return "";
	}
		
}
?>