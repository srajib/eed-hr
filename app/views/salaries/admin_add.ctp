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
<div style="margin: auto;height:350px;width:900px;float:left;margin-left:20px;">
<h2 align="center" style="width:500px;">Add Employee Salary </h2>

<?php echo $this->Form->create(array('controllers'=>'salaries','action'=>'admin_add'));?>
    
	 <div class="input"> 
      <?php // echo $this->Form->input('emp_no');  ?>
	</div>
	
	<div>
	
	 <fieldset class="ui-widget-content" style="width:550px;margin-left:22px;">
	 <legend class="ui-widget-header ui-corner-all">Basic Info</legend>
	
	 <div class="input"> 
      <?php echo $this->Form->input('first_name',array('class'=>'ui-state-default ui-corner-all'));  ?>
	</div> 
	
	<div class="input"> 
      <?php echo $this->Form->input('designation',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div> 
	
		<div class="input"> 
      <?php echo $this->Form->input('month',array('class'=>'ui-state-default ui-corner-all')); ?>   
	</div> 
	 
	<div class="input"> 
      <?php echo $this->Form->input('project_code',array('label'=>'Code No','class'=>'ui-state-default ui-corner-all'));  ?>
	</div>
	 
	<div class="input"> 
      <?php echo $this->Form->input('voucher_no',array('label'=>'Voucher No.','class'=>'ui-state-default ui-corner-all'));  ?>
	</div>
	 
 
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('con_salary',array('label'=>'Consolidate salary','type'=>'text','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>	
	
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('wordkdays',array('label'=>'Wordkdays','class'=>'ui-state-default ui-corner-all'));   ?>   
	</div>	
	
	 <div class="input"> 
      <?php echo $this->Form->input('net_salary',array('label'=>'Net Salary','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	 
	 </fieldset>
	 </div>

     <div style="float:left;display:inline;margin-left:12px;width:300px;">
	 <fieldset class="ui-widget-content">
	 
	 <legend class="ui-widget-header ui-corner-all">Allowances</legend>
	
	 <div class="input"> 
      <?php echo $this->Form->input('house_allowance',array('label'=>'House Rent','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>	
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('conveyance',array('label'=>'conveyance','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>	
	
	
	 <div class="input"> 
      <?php echo $this->Form->input('medical',array('label'=>'medical','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('education',array('label'=>'education','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
	  <div class="input"> 
      <?php echo $this->Form->input('telephone',array('label'=>'telephone','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('entertain',array('label'=>'entertain','class'=>'ui-state-default ui-corner-all'));  ?>   
	 </div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('other',array('label'=>'other','class'=>'ui-state-default ui-corner-all'));  ?>   
	 </div>
	 
	 <div class="input"> 
      <?php echo $this->Form->input('basic_pay',array('label'=>'Total/Basic Pay','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>	
	</fieldset>
	</div>
	
	<div style="float:left;display:inline;margin-left:22px;">
	
     <fieldset class="ui-widget-content">
	 <legend class="ui-widget-header ui-corner-all">Deductions</legend>
	 
	 <div class="input"> 
      <?php echo $this->Form->input('CPF',array('label'=>'CPF','class'=>'ui-state-default ui-corner-all'));   ?>   
	</div>	
   
   
   	
	 <div class="input"> 
      <?php echo $this->Form->input('income_tax',array('label'=>'Income Tax','class'=>'ui-state-default ui-corner-all'));   ?>   
	</div>	
   
   
   	 <div class="input"> 
      <?php echo $this->Form->input('advance',array('label'=>'Advance','class'=>'ui-state-default ui-corner-all'));   ?>   
	</div>
   
   	
	 <div class="input"> 
      <?php echo $this->Form->input('total_deduction',array('label'=>'Total Deduction','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
	
 
	
	<div class="input"> 
      <?php echo $this->Form->input('remarks',array('label'=>'Remarks','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
   
    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<?php echo $this->Form->end(__('Save', true));?>
		
	</fieldset>
	</div>

	 <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	
   
	
</div>
</div>

	 <div class="clear" style="margin-bottom:40px;">&nbsp;</div>
    <div class="clear">&nbsp;</div>
