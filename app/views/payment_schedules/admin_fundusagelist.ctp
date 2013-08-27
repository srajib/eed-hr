<?php 
$this->Html->addCrumb('Fund Management', '/admin/funds/'); 
$this->Html->addCrumb('Fund Uses Plan', ''); 
?>
<div class="actions" style="width:170px;float:left;margin-left:16px;margin-top:9px;">
	<ul>
		<li><?php echo $this->Html->link(__('Create Fund Usage Plan', true), array('action' => 'addfundusageplan')); ?></li>
	</ul>
	<ul>
		 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'funds','action' => '')); ?></li>
 	</ul>
</div>


<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">



<?php 
if($FundUsageplans){?>
<div class="FundUsageplans index" style="z-index:14;border: none; width: auto;margin-left:20px; float:left; padding: 0;">


<div class="clear">&nbsp;</div>

	<h2><?php __('Fund Usage Plans');?></h2>
<!--		
<p>
	<?php
	//echo $this->Paginator->counter(array(
	//'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
//	));

	?>	</p>-->
	<table width="700" cellpadding="0" cellspacing="0">
	<tr align="center">
			<th align="center"><div align="center">Category</div></th>
			<th align="center"><div align="center">Description</div></th>
			<th align="center"><div align="center">Amount</div></th>
			<th align="center"><div align="center">Remarks</div></th>
			<th align="center">&nbsp;Action</th>
	</tr>
	<?php
	$i = 0;
	foreach ($FundUsageplans as $FundUsageplan):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
	    <td align="center"><div align="center"><?php echo $FundUsageplan['ExpenditureCategory']['category_name']; ?></div></td>
		<td align="center"><div align="center"><?php  echo $FundUsageplan['FundUsageplan']['description']; ?></div></td>
		<td align="center"><div align="center"><?php echo $FundUsageplan['FundUsageplan']['Amount']; ?></div></td>
		<td align="center"><div align="center"><?php echo $FundUsageplan['FundUsageplan']['remarks']; ?></div></td>
		
   
		<td class="actions"><?php  echo $this->Html->link(__('Edit', true), array('action' => 'editfundplan', $FundUsageplan['FundUsageplan']['id'])); 
	 //}
		?>
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'deletefundplan',$FundUsageplan['FundUsageplan']['id']), null, sprintf(__('Are you sure you want to delete FundUsageplan # %s?', true), $FundUsageplan['FundUsageplan']['id'])); ?>	

<?php //echo $this->Html->link(__('Packages', true), array('controller'=>'FundExpenditures','action' => 'FundExpenditurePackage', $FundExpenditure['FundExpenditure']['LID'])); ?>		</td>
</tr> 
<?php endforeach; ?>
  </table>

<!--
	<div class="paging">
		<?php // echo $paginator->first();?>
		<?php //echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php //echo $this->Paginator->numbers();?>
 |
		<?php //echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		<?php //echo $paginator->last();?>
		
	</div>
</div>-->

<?php  } ?>
</div>

</div>