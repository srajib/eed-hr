<?php 
$this->Html->addCrumb('WelCome', ''); 
?>
<?php echo $this->Html->script('jquery-1.4.2.min', false); ?>

<script language="JavaScript">

function selectcredit()
{
 if($('#creditno').val())
 {
 window.location="<?php echo $this->base;?>/admin/dashboards/index/"+$('#creditno').val();
 }
 
	else alert('No Credit no. selected. ');
}

function creditalert()
{
  alert('No Credit no. selected. Please select credit no. first.');
}
</script>
<div style="clear:both"><br /></div>
<div style="width:129px;float:left;">


<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:-4px;">

<?php // echo $session->flash(); 
if($group_id==1 || $group_id==3){
 ?>
	<ul>
	<!-- <li><?php echo $this->Html->link(__('Departments', true), array('controller'=>'departments','action' => 'admin_index')); ?></li>-->
		
		<li><?php echo $this->Html->link(__('Employee', true), array('controller'=>'employees','action' => 'admin_index')); ?></li>
		
		<!--<li><?php echo $this->Html->link(__('Leaves', true), array('controller'=>'leaves','action' => 'admin_index')); ?></li>
		
		
			
			
		<li><?php echo $this->Html->link(__('HR ', true), array('controller'=>'jobs','action' => 'admin_index')); ?></li>-->
	
		<li><?php echo $this->Html->link('Salary', '/admin/salaries/', array('class' => 'button'));?></li> 
	
		<li><?php echo $this->Html->link(__('View Reports', true), array('controller'=>'employees','action' => 'admin_joiningmanagement')); ?></li>
	</ul>
	
<?php
	 }
	 
 if($group_id==1 || $group_id==4){

  }
	 ?>
</div>
</div>
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:42px;margin-top:-13px;">
 <div style="margin-left:180px;width:600px;">
 
 <h2 align="center">Welcome!</h2>
</div>
</div>



