<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Department', ''); 
?>
<div align="right" style="margin-right:35px;">
 <a href="<?php echo $this->base;?>/Salarylist.doc">Print</a>	
</div>

<?php 
if($Salary){?>

<div class="Salarys index" style="border: none;height:600px; float:left; padding: 0;margin-left:20px;">

	<h2><?php echo __('Employee Salary Report');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' =>__('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));?></p>
	<table width="1000" cellpadding="0" cellspacing="0">
	<tr>
			<th>Employee Name</th>
			<th>Position</th>
			<th>Basic Pay</th>
			<th>House rent </th>
			<th>Conveyance</th>
			<th>Medical</th>
			<th>Education</th>
			<th>Telephone</th>
			<th>Entertain</th>
			<th>Other</th>
			<th>Total</th>
			<th>CPF</th>
			<th>I. Tax</th>
			<th>Advance</th>
			<th>Total deduction</th>
			<th>Net Salary</th>
			<th> Actions </th>
	</tr>
	<?php
	$i = 0;
	foreach ($Salary as $Salary2):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
	    <td><a href="<?php echo $this->base;?>/admin/employees/empdetails/<?php echo $Salary2['Employee']['employee_id']; ?>"><?php echo $Salary2['Employee']['first_name']; ?></a>&nbsp;</td>
		<td><?php echo $Salary2['Designation']['designation']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['basic_pay']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['house_allowance']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['conveyance']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['medical']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['education_allowance']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['phone_allowance']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['entertain']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['other_allowance']; ?>&nbsp;</td>
	    <td><?php echo $Salary2['Employee']['total_allowance']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['CPF']; ?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['income_tax'];?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['advance'];?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['total_deduction'];?>&nbsp;</td>
		<td><?php echo $Salary2['Employee']['net_salary'];?>&nbsp;</td>
		<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action' => 'edit', $Salary2['Employee']['employee_id'])); }?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$Salary2['Employee']['employee_id']), null, sprintf(__('Are you sure you want to delete Salary # %s?', true), $Salary2['Employee']['employee_id'])); ?>	
	
		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	