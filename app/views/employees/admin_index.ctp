<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Employees', ''); 
?>

<div align="right" style="margin-right:35px;">
 <a href="<?php echo $this->base;?>/employeelist.doc">Print</a>	
</div>

<?php 
if($Employees){?>
<div class="Employees index" style="border: none;height:600px;width:600px; float:left; padding: 0;margin-left:20px;">


	<h2><?php __('Employees');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>
	<table width="1000" cellpadding="0" cellspacing="0">
	<tr>
			<!--<th>Code</th>-->
			<th>Name</th>
			<th>Designation</th>
			<th> Phone</th>
			<th> Join Date &nbsp;</th>
			<th> Actions &nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($Employees as $Employee):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
		<!--<td><?php echo $Employee['Employee']['emp_code']; ?>&nbsp;</td>-->
		<td><a href="<?php echo $this->base;?>/admin/employees/personalinfo/<?php echo $Employee['Employee']['employee_id']?>"><?php echo $Employee['Employee']['first_name'].' '.$Employee['Employee']['last_name']; ?></a>&nbsp;</td>
		<td><?php echo $Employee['Designation']['designation']; ?>&nbsp;</td>
		<td><?php echo $Employee['Employee']['land_phone']; ?>&nbsp;</td>
		<td><?php echo $Employee['Employee']['join_date']; ?>&nbsp;</td>
		
		<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action' => 'edit', $Employee['Employee']['employee_id'])); }?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$Employee['Employee']['employee_id']), null, sprintf(__('Are you sure you want to delete Employee # %s?', true), $Employee['Employee']['employee_id'])); ?>	
	

		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	