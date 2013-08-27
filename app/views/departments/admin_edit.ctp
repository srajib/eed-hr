<script src="<?php echo $this->base;?>/js/jscal2.js"></script>
<script src="<?php echo $this->base;?>/js/lang/en.js"></script>

<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery-1.4.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/steel/steel.css" />

<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Customers', 'index');  
$this->Html->addCrumb('Create Customer', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'leaves','action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:350px;width:400px;float:left;margin-left:20px;">
<h2 align="center" style="width:400px;"> Edit Department Information</h2>

<?php echo $this->Form->create('Department');

      echo $this->Form->input('id');
?>
     
	 <div class="input"> 
      <?php echo $this->Form->input('dept_code');  ?>
	</div> 
	
	<div class="input"> 
      <?php echo $this->Form->input('dept_name');  ?>   
	</div> 
	 
	 
    <div class="input"> 
      <?php echo $this->Form->input('location',array('label'=>'Location','type'=>'text'));  ?>   
	</div>	
	
	
	
	
	 <div class="input"> 
	  <?php  
			echo $this->Form->label('Project Name', __('Project Name', true));
			echo $this->Form->select('project', $projects, null,array('empty'=>'---Please Select---'));  
       ?>

    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<?php echo $this->Form->end(__('Save', true));?>
</div>
