<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Employees', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Emp. Fine entry', true), array('action' => 'addfine')); ?></li>
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

<?php 
if($EmployeeFines){?>
<div class="Employees index" style="border: none;height:600px; float:left; padding: 0;margin-left:20px;">


	<h2><?php __('Employee Fines');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>
	<table width="1000" cellpadding="0" cellspacing="0">
	<tr>
			<th>Name</th>
			<th>Department</th>
			<th>F Amount</th>
			<th> Date &nbsp;</th>
			<th> Actions &nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($EmployeeFines as $EmployeeFine):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
		<td><?php echo $EmployeeFine['Employee']['first_name'].' '.$EmployeeFine['Employee']['last_name']; ?>&nbsp;</td>
		<td><?php echo $EmployeeFine['Department']['dept_name']; ?>&nbsp;</td>
		<td><?php echo $EmployeeFine['EmployeeFine']['fines']; ?>&nbsp;</td>
		<td><?php echo $EmployeeFine['EmployeeFine']['date']; ?>&nbsp;</td>
		
		<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action' => 'editfine', $EmployeeFine['EmployeeFine']['id'])); }?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'deletefine',$EmployeeFine['EmployeeFine']['id']), null, sprintf(__('Are you sure you want to delete advance amount for Employee # %s?', true), $EmployeeFine['EmployeeFine']['id'])); ?>	
	

		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	