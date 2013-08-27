
 admin_layout.ctp 
HTML document text
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
			
		
   /* 
         <!--    $(function(){

		$("form").form();

		});-->*/




		</script>
</head>
<body>
	<div id="header"> 
			<div id="logo">
			</div>
			
			<div id="header_left" style="text-align: right">
			</div>	    
	</div>
		
<span class="preload1"></span>
<span class="preload2"></span>

<div id="menu">		
<ul id="nav">
	<li class="top"><a href="<?php echo $this->base; ?>" class="top_link"><span>Home</span></a></li>
	<li class="top"><a href="<?php echo $this->base; ?>/admin/departments/" id="products" class="top_link"><span class="down">Departments</span></a>
		<ul class="sub">
			<li><a href="<?php echo $this->base; ?>/admin/departments/">Department Details</a>
			<li><a href="<?php echo $this->base; ?>/admin/departments/add">Add Dept. Details</a>
			</li>
			<li class="mid"><a href="<?php echo $this->base; ?>/admin/projects/" >Project Details</a>
			<li class="mid"><a href="<?php echo $this->base; ?>/admin/projects/add" > Add Projct. Details</a>
			</li>
		</ul>
	</li>
	<li class="top">
	<a href="<?php echo $this->base; ?>/admin/employees/" id="services" class="top_link"><span class="down">Employee</span></a>
		<ul class="sub">
			<li><a href="<?php echo $this->base; ?>/admin/employees/add/">Add Employee</a></li>
			
			<!--<li><a href="<?php echo $this->base; ?>/admin/employees/">Already Asigned Staff </a></li>-->
			     <li><a href="<?php echo $this->base; ?>/admin/leaves/add">Leave Application</a>
			</li>
			  <li><a href="<?php echo $this->base; ?>/admin/leaves/leavetype">Leave Type</a>
			</li>
			<li><a href="<?php echo $this->base; ?>/admin/leaves/">Leave Status</a></li>
			<li><a href="<?php echo $this->base; ?>/admin/leaves/">Leave Status List View</a></li>
			<li><a href="<?php echo $this->base; ?>/admin/employees/advance">Emp. Advance Table</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/employees/bankinfo">Emp. Bank Accnt. Info</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/salaries/">Emp. Salary Statement</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/employees/fine">Emp. Adv. & Fine report</a></li>
		</ul>
	</li>
	<li class="top"><a href="<?php echo $this->base; ?>/admin/jobs/" id="contacts" class="top_link"><span class="down">HR</span></a>
		<ul class="sub">
		<li><a href="javascript:void();">New Recruit List</a></li>
		<li><a href="javascript:void();">New Recruit Search</a></li>
		<li><a href="javascript:void();">Confirm Emp. Search</a></li>
		<li><a href="javascript:void();">Employee Discontinue</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/employees/level">Employee By level</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/employees/joiningmanagement">Employee By Dept.</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/employees/index">Employee Pers. Detail</a></li>
		<li><a href="javascript:void();">Employee Rec. Change</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/times/attendence">Employee Timesheet</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/jobs/add">New Job Posting</a></li>
		<li><a href="<?php echo $this->base; ?>/admin/jobs/index">Vacancies</a></li>
		
		</ul>
	</li>
	
	<li class="top"><a href="<?php echo $this->base; ?>/admin/times/index" id="shop" class="top_link"><span class="down">Timesheet</span></a>
		<ul class="sub">
		    <li><a href="<?php echo $this->base; ?>/admin/times/index">Employee Timesheet</a></li>
			<li><a href="<?php echo $this->base; ?>/admin/times/attendence">Employee Attendence</a></li>
			<li><a href="<?php echo $this->base; ?>/admin/times/monthlyattendence">monthly Attendence </a></li>

		</ul>
	</li>
	<li class="top"><a href="<?php echo $this->base; ?>/admin/salaries/" id="shop" class="top_link"><span class="down">Salary</span></a>
		<ul class="sub">
		    <li><a href="<?php echo $this->base; ?>/admin/salaries/paygrade">Pay Grade / Pay Scale</a></li>
			<li><a href="">Edit Salaries</a></li>
			<li><a href="">Month</a></li>
		</ul>
	</li>
	
	<li class="top"><a href="<?php echo $this->base; ?>/admin/employees/joiningmanagement/" id="shop" class="top_link"><span class="down">Report</span></a>
		<ul class="sub">
			<li><a href="<?php echo $this->base; ?>/admin/employees/joiningmanagement">Search by Department</a></li>
	  <!--      <li><a href="<?php echo $this->base; ?>/admin/employees/serchprojects">Search by Project</a></li>
			 <li><a href="<?php echo $this->base; ?>/admin/employees/search">Search by EmplpyoeeID</a></li>-->
			 
			 <li><a href="javascript:void();">Search by Project</a></li>
			 <li><a href="javascript:void();">Search by EmplpyoeeID</a></li>
		</ul>
		</li>
	<li class="top"><a href="javascript:void();p" id="privacy" class="top_link"><span>Help</span></a></li>
	<li class="top"><a href="<?php echo $this->base; ?>/users/logout" id="privacy" class="top_link"><span>Logout</span></a></li>
</ul>
        
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
	<div class="clear" style="margin:top:20px;"></div>
	<div id="footer">
	<div class="fl">Powered by: <a href="http://www.webtechbd.net/">Web Technology Bangladesh</a></div>
	<div class="fr">Copyright &copy; <?php echo date('Y'); ?> http://www.eedmoe.gov.bd/</div>
	</div>
	
</body>
</html>