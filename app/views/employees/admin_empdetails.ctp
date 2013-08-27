<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Employees', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Emp. Adv. Posting', true), array('action' => 'addadvance')); ?></li>
	</ul>
	<ul>
		 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'dashboards','action' => '')); ?></li>
 	</ul>
</div>


<div style="height:600px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
</div>

<div align="right" style="margin-right:35px;">
 <a href="<?php echo $this->base;?>/employeelist.doc">Print</a>	
</div>

<div style="margin-left:50px;float:left;"><h2> Employee Salary Sheet</h2></div>
	

	<div class="Employee index">
	
	<table width="200">
	
  <tr>
    <th>Name&nbsp;</th>
    <td><?php echo $employees[0]['Employee']['first_name'].' '.$employees[0]['Employee']['last_name']; ?>
&nbsp;</td>
  </tr>
  <tr>
    <th>Designation&nbsp;</th>
    <td><?php echo $employees[0]['Designation']['designation']; ?></td>
  </tr>
  <tr>
    <th>Month&nbsp;</th>
    <td><?php echo date('M').','.date('Y'); ?>&nbsp;</td>
  </tr>
  <tr>
    <th>Code No.&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>Voucher No.&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="800" >
  <tr>
    <th>Code No&nbsp;</th>
    <th>Description&nbsp;</th>
    <th>Amount&nbsp;</td>
    <th>Total Amount&nbsp;</th>
  </tr>
  <tr>
    <td>4501&nbsp;</td>
    <td>Basic Pay&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['basic_pay'];?></td>
    <td><?php echo $employees[0]['Employee']['basic_pay'];?>&nbsp;</td>
  </tr>
  <tr>
    <td>4713&nbsp;</td>
    <td>Entertainment Allowance&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['entertain'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['entertain'];?>&nbsp;</td>
  </tr>
  <tr>
    <td>4705&nbsp;</td>
    <td>House Allowance&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['house_allowance'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['house_allowance'];?>&nbsp;</td>
  </tr>
  <tr>
    <td>4717&nbsp;</td>
    <td>Medical Allowance&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['medical'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['medical'];?>&nbsp;</td>
  </tr>
  <tr>
     <td>4765&nbsp;</td>
    <td>Conveyance&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['conveyance'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['conveyance'];?>&nbsp;</td>
 
  </tr>
  <tr>
    <td>4773&nbsp;</td>
    <td>Education&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['education_allowance'];?>&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['education_allowance'];?>&nbsp;</td>
  
  </tr>
  <tr>
    <td>4795&nbsp;</td>
    <td>Others&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['other_allowance'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['other_allowance'];?>&nbsp;</td>
 
  </tr>
  
  <tr>
    <th>&nbsp;</th>
    <th><b>Sub Total Salary&nbsp;</b></th>
     <th><?php //echo $employees[0]['Employee']['other_allowance'];?>&nbsp;</th>
    <th><?php echo $employees[0]['Employee']['total_allowance'];?>&nbsp;</th>
   
  </tr>
  
      <tr>
    <td>&nbsp;</th>
    <th>Deduction&nbsp;</td>
     <td><?php //echo $employees[0]['Employee']['other_allowance'];?>&nbsp;</td>
    <td><?php //echo $employees[0]['Employee']['total_allowance'];?>&nbsp;</td>
    
  </tr>
  
    <tr>
    <td>&nbsp;</td>
    <td>CPF&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['CPF'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['CPF'];?>&nbsp;</td>
  
  </tr>
  
   <tr>
    <td>&nbsp;</td>
    <td>Income Tax&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['income_tax'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['income_tax'];?>&nbsp;</td>
   
  </tr>
  
     <tr>
    <td>&nbsp;</td>
    <td>Advance&nbsp;</td>
     <td><?php echo $employees[0]['Employee']['advance'];?>&nbsp;</td>
    <td><?php echo $employees[0]['Employee']['advance'];?>&nbsp;</td>
   
  </tr>
  
      <tr>
    <th>&nbsp;</th>
    <th>Total Deduction&nbsp;</th>
     <th><?php echo $employees[0]['Employee']['total_deduction'];?>&nbsp;</th>
    <th><?php echo $employees[0]['Employee']['total_deduction'];?>&nbsp;</th>
   
  </tr>
  
  
   <tr>
    <th>&nbsp;</th>
    <th>Net Salary&nbsp;</th>
     <th><?php echo $employees[0]['Employee']['net_salary'];?>&nbsp;</th>
    <th><?php echo $employees[0]['Employee']['net_salary'];?>&nbsp;</th>
  
  </tr>
</table>

</div>