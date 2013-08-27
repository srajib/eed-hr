<?php 
$this->Html->addCrumb('Data', '/admin/designations'); 
$this->Html->addCrumb('Designation', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:0px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Designation add', true), array('action' => 'add')); ?></li>
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
if($Designation){?>

<div class="Leaves index" style="border: none;height:600px; float:left; padding: 0;">

	<h2><?php __('Designation');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' =>__('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));?></p>
	<table width="" cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('designation'); ?></th>
			<th><?php echo $this->Paginator->sort('weight_value'); ?></th>
			<th> Actions &nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($Designation as $Designation2):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
                <td><?php echo $Designation2['Designation']['designation']; ?>&nbsp;</td>
		<td><?php echo $Designation2['Designation']['weight_value']; ?>&nbsp;</td>
		
		<td class="actions"><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $Designation2['Designation']['id'])); ?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$Designation2['Designation']['id']), null, sprintf(__('Are you sure you want to delete Designation # %s?', true), $Designation2['Designation']['id'])); ?>	
	
		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	