<div class="actions" style="width:170px;float:left;margin-left:16px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Create Fund Expenditure', true), array('action' => 'add')); ?></li>
	</ul>
	<ul>
		 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'funds','action' => '')); ?></li>
 	</ul>
</div>


<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">



<?php 
if($FundExpenditures){?>
<div class="FundExpenditures index" style="z-index:14;border: none; width: auto;margin-left:20px; float:left; padding: 0;">


<div class="clear">&nbsp;</div>

	<h2><?php __('Fund Expenditures');?></h2>
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% totals, starting on record %start%, ending on %end%', true)
	));
	
	
	
	?>	</p>
	<table width="700" cellpadding="0" cellspacing="0">
	<tr align="center">
			<th align="center"><div align="center">Name of the month</div></th>
			<th align="center"><div align="center">Withdrawal App Number</div></th>
			<th align="center"><div align="center">Category Name</div></th>
			<th align="center"><div align="center">Payment Type</div></th>
			<th align="center">&nbsp;Action</th>
	</tr>
	<?php
	$i = 0;
	foreach ($FundExpenditures as $FundExpenditure):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
	    <td align="center"><div align="center"><?php echo $FundExpenditure['FundExpenditure']['name_of_month']; ?></div></td>
		<td align="center"><div align="center"><?php  echo $FundExpenditure['FundExpenditure']['withdrawl_app_number']; ?></div></td>
		<td align="center"><div align="center"><?php echo $FundExpenditure['ExpenditureCategory']['category_name']; ?></div></td>
		<td align="center"><div align="center"><?php echo $FundExpenditure['FundExpenditure']['payment_type']; ?></div></td>
		
   
		<td class="actions"><?php if($group_id=='1'){ echo $this->Html->link(__('Edit', true), array('action' => 'edit', $FundExpenditure['FundExpenditure']['id'])); 
		echo '&nbsp;'. $this->Html->link(__('View', true), array('action' => 'view', $FundExpenditure['FundExpenditure']['id'])); }
		?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',$FundExpenditure['FundExpenditure']['id']), null, sprintf(__('Are you sure you want to delete FundExpenditure # %s?', true), $FundExpenditure['FundExpenditure']['id'])); ?>	

<?php //echo $this->Html->link(__('Packages', true), array('controller'=>'FundExpenditures','action' => 'FundExpenditurePackage', $FundExpenditure['FundExpenditure']['LID'])); ?>		</td>
</tr> 
<?php endforeach; ?>
  </table>


	<div class="paging">
		<?php echo $paginator->first();?>
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		<?php echo $paginator->last();?>
		
	</div>
</div>

<?php  } ?>
</div>