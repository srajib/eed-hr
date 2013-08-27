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
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'salaries','action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:350px;width:400px;float:left;margin-left:20px;">
<h2 align="center" style="width:400px;">Add Enployee Salary </h2>

<?php echo $this->Form->create(array('controllers'=>'salaries','action'=>'admin_add'));?>
    
	 <div class="input"> 
      <?php echo $this->Form->input('emp_no');  ?>
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('project_code');  ?>
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('name');  ?>
	</div> 
	
	<div class="input"> 
      <?php echo $this->Form->input('designation');  ?>   
	</div> 
	 
	 
    <div class="input"> 
      <?php echo $this->Form->input('start_month',array('label'=>'Start Month'));  ?>   
	</div>	
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('end_month',array('label'=>'End Month'));  ?>   
	</div>	
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('con_salary',array('label'=>'Consolidate salary','type'=>'text'));  ?>   
	</div>	
	
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('wordkdays',array('label'=>'Wordkdays'));  ?>   
	</div>	
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('salary_payable',array('label'=>'Salary payable'));  ?>   
	</div>	
	
	
		
	 <div class="input"> 
      <?php echo $this->Form->input('phone_ceiling',array('label'=>'Phone Ceiling'));  ?>   
	</div>	
   
   
   	
	 <div class="input"> 
      <?php echo $this->Form->input('deduction',array('label'=>'Deduction'));  ?>   
	</div>	
   
   
   	
	 <div class="input"> 
      <?php echo $this->Form->input('allowance',array('label'=>'allowance'));  ?>   
	</div>	
   
   
   	
	 <div class="input"> 
      <?php echo $this->Form->input('adjustment',array('label'=>'adjustment'));  ?>   
	</div>
	
	
		
	 <div class="input"> 
      <?php echo $this->Form->input('bonus',array('label'=>'Bonus'));  ?>   
	</div>
	
	
    <div class="input"> 
      <?php echo $this->Form->input('net_payable',array('label'=>'Net Payable'));  ?>   
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('bank',array('label'=>'Bank'));  ?>   
	</div>
	
		 <div class="input"> 
      <?php echo $this->Form->input('remarks',array('label'=>'Remarks'));  ?>   
	</div>
	
    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
   
	

    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<?php echo $this->Form->end(__('Save', true));?>
</div>
