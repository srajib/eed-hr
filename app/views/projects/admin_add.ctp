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
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'employees','action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:400px;width:400px;float:left;margin-left:20px;">
<h2 align="center" style="width:400px;"> Add Project Information</h2>

<?php echo $this->Form->create('Project');?>
    
   <div class="input"> 
      <?php echo $this->Form->input('p_code',array('label'=>'Project Code'));  ?>   
	</div>
     
    <div class="input"> 
      <?php echo $this->Form->input('p_name',array('label'=>'Project Name'));  ?>   
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('p_address',array('label'=>'Address'));  ?>   
	</div>
     
	 
	 <div class="input"> 
      <?php echo $this->Form->input('start_date',array('label'=>'Start Date'));  ?>   
	</div>
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('completion',array('label'=>'Completion'));  ?>   
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('remarks',array('label'=>'Remarks'));  ?>   
	</div>
	
    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<?php echo $this->Form->end(__('Save', true));?>
</div>
