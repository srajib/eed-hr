<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Department', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Leave add', true), array('action' => 'add')); ?></li>
	</ul>
	<ul>
		 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'dashboards','action' => '')); ?>
		 </li>
 	</ul>
</div>


<div style="height:600px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
</div>

<div align="right" style="margin-right:35px;">
 <a href="<?php echo $this->base;?>/leavelist.doc">Print</a>	
</div>

<?php 
if($Leaves){?>

<div class="Leaves index" style="border: none;height:600px; float:left; padding: 0;margin-left:20px;">

	<h2><?php __('Leave');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' =>__('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));?></p>
	<table width="1000" cellpadding="0" cellspacing="0">
	<tr>
			
			<th>Employee</th>
			<th>Department</th>
			<th>Designation</th>
			<th>Leave Type</th>
			<th>Leave Start</th>
			<th>Leave End</th>
			<th>Leave Lenth Days</th>
			<th> Actions &nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($Leaves as $Leave2):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>


	    <td><?php echo $Leave2['Employee']['first_name']; ?>&nbsp;</td>
		<td><?php echo $Leave2['Department']['dept_name']; ?>&nbsp;</td>
		<td><?php echo $Leave2['Designation']['designation'];?>&nbsp;</td>
		<td><?php echo $Leave2['LeaveType']['leave_type_name'];?>&nbsp;</td>
		<td><?php echo $Leave2['Leave']['leave_start'];?>&nbsp;</td>
		<td><?php echo $Leave2['Leave']['leave_end'];?>&nbsp;</td>
		<td><?php echo round($Leave2['Leave']['leave_length_days'],true).' days';?>&nbsp;</td>





	
<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action'=>'edit',$Leave2['Leave']['leave_id'])); }?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$Leave2['Leave']['leave_id']), null, sprintf(__('Are you sure you want to delete Leave Data # %s?', true), $Leave2['Leave']['leave_id'])); ?>	
	
		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	