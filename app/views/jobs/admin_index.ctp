<div class="jobs index">
	
	<?php //echo $this->params['url']['url'];  ?>
	
	<h2><?php __('Job Lists');?></h2>
	<div class="clear mb8">&nbsp;</div>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="79%">&nbsp;</td>
		<td width="21%" align="right"><?php echo $this->Paginator->counter(array( 'format' => __('<strong>%start%-%end%</strong> out of <strong>%count% Jobs</strong>', true)	)); ?></td>
	  </tr>
	</table>
	<div class="clear mb4">&nbsp;</div>
	<table width="100%" cellpadding="3" cellspacing="1" bgcolor="#C8C8D2">
	<tr>
			<th height="35" bgcolor="#FFFFFF">Id</th>
			<th bgcolor="#FFFFFF">Job Title</th>
			<th bgcolor="#FFFFFF">Company Name</th>
			<th bgcolor="#FFFFFF">Remark</th>
			<th bgcolor="#FFFFFF">Date</th>
			<th bgcolor="#FFFFFF">Action</th>
	</tr>
	<?php
	$i = 0;
	foreach ($jobs as $job):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $job['Job']['id']; ?></td>
		<td>
		  <?php echo $job['Job']['title']; ?>
		  <div><strong>Source: <?php echo $job['JobDetail']['source_type']; ?></strong></div>
		  <?php //echo $this->Html->link($job['Job']['title'], array('controller' => 'jobs', 'action' => 'details', $job['Job']['id'], strtolower(Inflector::slug($job['Job']['title'])),strtolower(Inflector::slug($job['CompanyProfile']['company_name'])) , "?"=>array('return'=>$this->params['url']['url']) )); ?>
		</td>
		<td><?php echo $job['Job']['company_name']; ?></td>
		<td><div style="color: red"><?php echo $job['JobDetail']['remark']; ?></div>&nbsp;</td>
		<td>
			<div><strong>Deadline:</strong> <?php echo date('l d F, Y', strtotime($job['Job']['application_deadline'])) ; ?></div>
			<div><strong>Posted:</strong> <?php echo date('d F, Y', strtotime($job['Job']['created'])) ; ?></div>
		</td>
		<td class="actions">
			<?php echo $html->image('apps/icon_'.$job['Job']['active'].'.png'); ?>
			<?php echo $this->Html->link(__('Edit/Active', true), array('action' => 'edit', $job['Job']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $job['Job']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $job['Job']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
  </table>
  <div class="clear mb4">&nbsp;</div>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="79%" align="center"><div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div></td>
		<td width="21%" align="right"><?php echo $this->Paginator->counter(array( 'format' => __('<strong>%start%-%end%</strong> out of <strong>%count% Jobs</strong>', true)	)); ?></td>
	  </tr>
  </table>
	
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	
</div>

