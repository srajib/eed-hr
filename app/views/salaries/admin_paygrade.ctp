<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Department', ''); 
?>

<div align="right" style="float:right;margin-right:35px;">
 <a href="<?php echo $this->base;?>/PayGradelist.doc">Print</a>	
</div>

<?php 
if($PayGrade){?>

<div class="PayGrades index" style="border: none;height:600px; float:left; padding: 0;margin-left:20px;">

	<h2><?php __('PayGrade');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' =>__('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));?></p>
	<table width="1000" cellpadding="0" cellspacing="0">
	<tr>
			
			<th>New Scale of Pay</th>
<!--			<th>Currency</th>-->
			<th>Existing Basic Pay </th>
			<th>Basic Pay in New Scale</th>
			<th> Actions &nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($PayGrade as $PayGrade2):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
	    <td><?php echo $PayGrade2['PayGrade']['name']; ?>&nbsp;</td>
	<!--	<td><?php echo $PayGrade2['PayGrade']['currency_id']; ?>&nbsp;</td>-->
		<td><?php echo $PayGrade2['PayGrade']['existing_basic_pay'];?>&nbsp;</td>
		<td><?php echo $PayGrade2['PayGrade']['basic_new_scale'];?>&nbsp;</td>
	
		
		<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action' => 'edit', $PayGrade2['PayGrade']['id'])); }?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$PayGrade2['PayGrade']['id']), null, sprintf(__('Are you sure you want to delete PayGrade # %s?', true), $PayGrade2['PayGrade']['id'])); ?>	
	
		</td>
</tr> 
<?php endforeach;  } ?>
  </table>


	
	