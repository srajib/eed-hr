<script src="<?php echo $this->base;?>/js/jscal2.js"></script>
<script src="<?php echo $this->base;?>/js/lang/en.js"></script>

<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery-1.4.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/steel/steel.css" />

<?php 
$this->Html->addCrumb('HR', '/admin/dashboards'); 
$this->Html->addCrumb('Leave', 'index');  
$this->Html->addCrumb('Create Leave Type ', ''); 
?>

<style>

.leaveStatus {
    float: left;
    border:solid 0px red;
    width:600px;
    padding: 10px;
}
.leaveStatus input{
    border:solid 1px #ccc;   
    height:25px; 
    width:200px;
}
.leaveStatus select {
    border:solid 1px #ccc;   
    height:30px; 
    width:208px;
}

input{
display:"";
}

form{
width:200%;
}

label{
display:inherit;
}
</style>


<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'leaves','action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:350px;width:150px;float:left;margin-left:20px;">
<h2 align="center" style="width:500px;"> Add Leave Information</h2>

<?php echo $this->Form->create('LeaveType',  array('url' => array('controller' => 'leaves', 'action' => 'addleavetype'))); ?>

   <fieldset class="ui-widget-content">
	 <legend class="ui-widget-header ui-corner-all">Leave Type Info</legend>


	 
	 <div class="input"> 
      <?php echo $this->Form->input('leave_type_name',array('class'=>'ui-state-default ui-corner-all'));  ?>
	</div> 

	 <div class="input"> 
      <?php echo $this->Form->input('leave_length_days',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div> 
	 
	
	


    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	
	</fieldset>
	
	<?php echo $this->Form->end(__('Save', true));?>
	
	
  
	
	<div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<div class="clear" style="margin-top:10px;">&nbsp;</div>




</div>
</div>


