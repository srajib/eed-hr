<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Education Engineering Department - HRM'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<?php
		echo $this->Html->css('admin.style');
		echo $this->Html->css('pro_drop_1');
		echo $scripts_for_layout;
		echo $this->Html->script('jquery-1.4.4.min');
		echo $this->Html->script('sleetmute');
		echo $this->Html->script('stuHover');
		
	?>
	
	<link rel="icon" href="<?php echo $this->base;?>/fevicon1.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?php echo $this->base;?>/fevicon1.ico" type="image/x-icon">
		<script>
		$(document).ready(function(){
			$('#flashMessage').animate({opacity: 2.0}, 5000).fadeOut();
			
			
			});
			
		
   /* 
         <!--    $(function(){

		$("form").form();

		});-->*/




		</script>
</head>
<body>
    <div id="container">
    <div id="header">

    </div>
<span class="preload1"></span>
<span class="preload2"></span>

<div id="menu">		
<ul id="nav">
	<li class="top"><a href="<?php echo $this->base; ?>" class="top_link"><span>Home</span></a></li>
	<!--<li class="top"><a href="<?php echo $this->base; ?>/admin/departments/" id="products" class="top_link"><span class="down">Departments</span></a>
		<ul class="sub">
			<li><a href="<?php echo $this->base; ?>/admin/departments/">Department Details</a>
			<li><a href="<?php echo $this->base; ?>/admin/departments/add">Add Dept. Details</a>
			</li>
		</ul>
	</li>-->
	<li class="top">
	<a href="<?php echo $this->base; ?>/admin/employees/" id="services" class="top_link"><span class="down">Employee</span></a>
		<ul class="sub">
			<li><a href="<?php echo $this->base; ?>/admin/employees/add/">Add Employee</a></li>
			<!--
		<li><a href="<?php echo $this->base; ?>/admin/employees/bankinfo">Emp. Bank Accnt. Info</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/salaries/">Emp. Salary Statement</a></li>
		-->
                </ul>
	</li>
	<li class="top"><a href="<?php echo $this->base; ?>/admin/designations/" id="contacts" class="top_link"><span class="down">Designation</span></a>
		<ul class="sub">
			<li><a href="<?php echo $this->base; ?>/admin/designations/add/">Add Designations</a></li>
		
		</ul>
	</li>
	<!--
	<li class="top"><a href="<?php echo $this->base; ?>/admin/salaries/" id="shop" class="top_link"><span class="down">Salary</span></a>
		<ul class="sub">
		    <li><a href="<?php echo $this->base; ?>/admin/salaries/paygrade">Pay Grade / Pay Scale</a></li>
			<li><a href="">Edit Salaries</a></li>
			<li><a href="">Month</a></li>
		</ul>
	</li>
	-->
	<li class="top"><a href="<?php echo $this->base; ?>/admin/employees/joiningmanagement/" id="shop" class="top_link"><span class="down">Report</span></a>
		<ul class="sub">
			<li><a href="<?php echo $this->base; ?>/admin/employees/joiningmanagement">Search by Designation</a></li>
	  <!--      <li><a href="<?php echo $this->base; ?>/admin/employees/serchprojects">Search by Project</a></li>
			 <li><a href="<?php echo $this->base; ?>/admin/employees/search">Search by EmplpyoeeID</a></li>-->
			 
			<li><a href="<?php echo $this->base; ?>/admin/employees/searchid">Search by Employee</a></li>
		</ul>
		</li>
	<li class="top"><a href="<?php echo $this->base; ?>/users/logout" id="privacy" class="top_link"><span>Logout</span></a></li>
</ul>
        
	</div>
	
		      
	   <div id="wrapper">
		<div id="content">
			<?php  echo $this->Session->flash(); echo $session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
		</div>
               
			<div class="clear">&nbsp;</div>
			<div class="clear" style="height:50px;">&nbsp;</div>
	 <div id="footer">

    </div>
</div>
	
			<div class="clear">&nbsp;</div>
			<div class="clear" style="height:50px;">&nbsp;</div>
	
	
	
	<?php echo $this->element('sql_dump'); ?>
</div>
	
</body>
</html>