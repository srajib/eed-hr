<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('BMDF'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->css('admin.style');
		echo $this->Html->css('menu');
		echo $scripts_for_layout;
		echo $this->Html->script('jquery-1.4.4');
		echo $this->Html->script('sleetmute');
		echo $this->Html->script('jquery.dropdownPlain');
		



	?>
	<link rel="icon" href="<?php echo $this->base;?>/fevicon1.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?php echo $this->base;?>/fevicon1.ico" type="image/x-icon">
	  <style>
	    body {
                background-image: url('<?php echo $this->base;?>/img/statement_image.jpg');
                background-repeat: no-repeat;
				background-position:right;
				
            }
			
	
        </style>
		<script>
		$(document).ready(function(){
			$('#flashMessage').animate({opacity: 2.0}, 5000).fadeOut();
			});
		</script>
</head>
<body>
	<div id="header">
			<div id="logo">
			</div>
			<div id="header_left" style="text-align: right">
			
	
			<?php 
			if($session->check('Auth.User.id')) 
			{
				echo "Hi, ".$session->read('Auth.User.firstname')." ".$session->read('Auth.User.lastname')." | "; 
				echo "<a href=\"".$this->base."/\">Home</a> | "; 
				echo $html->link(__('Logout', true), array('controller'=> 'users', 'action'=>'logout','admin'=>false)); 
				echo " | ".$html->link(__('Change password', true), array('controller'=> 'users', 'action'=>'changepassword')); 
				echo " | ".$html->link(__('Change Credit', true), array('controller'=> 'dashboards', 'action'=>'change')); 
				
			}
			else  
			{
				echo $html->link(__('Login', true), array('controller'=> 'users', 'action'=>'login')); 
			}
			
  		  ?>
			</div>
			<div class="clear">&nbsp;</div>
		    </div>
		 
		 <div id="topmenu">
		  <ul>
		  
		 <!-- <li><?php echo $html->link(__('Home', true), array('controller'=> 'dashboard', 'action'=>'index')); ?> &nbsp;|</li>-->
		
			<?php 
			
			if($this->Session->read('credit_no')) { echo '<font color="white">Your selected credit No: '. $this->Session->read('credit_no').'</font>'; }
			 else  echo '<font color="white">You have not select any credit no. yet.</font>';
			 
			if($session->read('Auth.User.group_id')=='1'){?>
			 | <li><?php echo $html->link(__('System Admin', true), array('controller'=> 'users', 'action'=>'index'));
			 }  ?></li>  | 
			<li><?php echo $html->link(__('Data', true), array('controller'=> 'loans', 'action'=>'index')); ?> </li>  | 
	        <li><?php echo $html->link(__('View Reports', true), array('controller'=> 'loans', 'action'=>'reports')); ?>  | 
			<li><?php // echo $html->link(__('CSV', true), array('controller'=>'loan_payments','action' => 'collection')); ?></li>
		  </ul> 
		  
		  <span id="sub_menu">
          <?php echo $this->Html->getCrumbs(' > ','Home'); ?>
		  </span>
		  
		  
		</div>
		
		
		
	<div id="container">
		
		
		<div id="content">
			<?php  echo $this->Session->flash(); echo $session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
		</div>
			<div class="clear">&nbsp;</div>
			<div class="clear" style="height:50px;">&nbsp;</div>
	
	</div>
	
	
	
	<?php echo $this->element('sql_dump'); ?>
	
	<div id="footer">
	<div class="fl">Powered by: <a href="http://www.grameensolutions.com/">Grameen Solutions</a></div>
	<div class="fr">Copyright &copy; <?php echo date('Y'); ?> http://www.bmdf-bd.org/</div>
	</div>
	
</body>
</html>