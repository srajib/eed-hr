<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Department', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:0px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Department add', true), array('action' => 'add')); ?></li>
	</ul>
	<ul>
		 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'employees','action' => '')); ?>
		 </li>
 	</ul>
</div>


<div style="height:10px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
</div>

<div align="right" style="margin-right:35px;">
 <a href="<?php echo $this->base;?>/leavelist.doc">Print</a>	
</div>

<?php 
if($Department){?>

<div class="Leaves index" style="border: none;height:600px; float:left; padding: 0;">

	<h2><?php __('Department');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' =>__('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));?></p>
	<table width="" cellpadding="0" cellspacing="0">
	<tr>
			
			<th>Code</th>
			<th>Department</th>
			<th>Loaction</th>
			<th>Projects</th>
			<th>Remarks</th>
			<th> Actions &nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($Department as $Department2):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
	    <td><?php echo $Department2['Department']['dept_code']; ?>&nbsp;</td>
		<td><?php echo $Department2['Department']['dept_name']; ?>&nbsp;</td>
		<td><?php echo $Department2['Department']['location'];?>&nbsp;</td>
		<td><?php echo $Department2['Project']['p_name'];?>&nbsp;</td>
		<td><?php echo $Department2['Department']['remarks'];?>&nbsp;</td>
	
		<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action' => 'edit', $Department2['Department']['id'])); }?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$Department2['Department']['id']), null, sprintf(__('Are you sure you want to delete Department # %s?', true), $Department2['Department']['id'])); ?>	
	
		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	