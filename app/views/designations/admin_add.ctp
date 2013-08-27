<script src="<?php echo $this->base;?>/js/jscal2.js"></script>
<script src="<?php echo $this->base;?>/js/lang/en.js"></script>

<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery-1.4.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/steel/steel.css" />

<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Designation', 'index');  
$this->Html->addCrumb('Create Designation', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'designations','action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:350px;width:400px;float:left;margin-left:20px;">
<h2 align="center" style="width:400px;">Add Designation</h2>

<?php echo $this->Form->create('Designation');

     
?>
     
	 <div class="input"> 
      <?php echo $this->Form->input('designation');  ?>
	</div> 
	
	<div class="input"> 
      <?php echo $this->Form->input('weight_value');  ?>   
	</div> 
	 


    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<?php echo $this->Form->end(__('Save', true));?>
</div>
