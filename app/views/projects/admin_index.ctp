<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Projects', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Create Project', true), array('action' => 'add')); ?></li>
	</ul>
	<ul>
		 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'projects','action' => '')); ?></li>
 	</ul>
</div>


<div style="height:600px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
</div>

<div align="right" style="margin-right:35px;">
 <a href="<?php echo $this->base;?>/Projectlist.doc">Print</a>	
</div>

<?php 
if($Project){?>
<div class="Projects index" style="border: none;height:600px; float:left; padding: 0;margin-left:20px;">


	<h2><?php __('Projects');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>
	<table width="1000" cellpadding="0" cellspacing="0">
	<tr>
			<th>Project Code</th>
			<th>Name</th>
			<th>Address</th>
			<th>Start date </th>
			<th>Completion  date </th>
			<th>Remarks </th>
			<th> Actions &nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($Project as $Projects):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
		<td><?php echo $Projects['Project']['p_code']; ?>&nbsp;</td>
		<td><?php echo $Projects['Project']['p_name']; ?>&nbsp;</td>
		<td><?php echo $Projects['Project']['p_address']; ?>&nbsp;</td>
		<td><?php echo $Projects['Project']['start_date']; ?>&nbsp;</td>
		<td><?php echo $Projects['Project']['completion']; ?>&nbsp;</td>
		<td><?php echo $Projects['Project']['remarks']; ?>&nbsp;</td>
		
		<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action' => 'edit', $Projects['Project']['id'])); }?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$Projects['Project']['id']), null, sprintf(__('Are you sure you want to delete Project # %s?', true), $Projects['Project']['id'])); ?>	
	

		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	