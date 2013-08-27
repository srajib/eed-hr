<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<div class="users index" style="margin-left:220px;margin-top:-60px;">
	<h2><?php __('Users');?></h2>
	
		<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>


	
	<table width="760" cellpadding="0" cellspacing="0">
	<tr>
			<th width="42"><?php echo $this->Paginator->sort('id');?></th>
			<th width="113"><?php echo $this->Paginator->sort('group_id');?></th>
			<th width="121"><?php echo $this->Paginator->sort('firstname');?></th>
			<th width="98"><?php echo $this->Paginator->sort('lastname');?></th>
			<th width="181"><?php echo $this->Paginator->sort('email_address');?></th>
			<th width="62"><?php echo $this->Paginator->sort('active');?></th>
			<th width="141" class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['Group']['name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['firstname']; ?>&nbsp;</td>
		<td><?php echo $user['User']['lastname']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email_address']; ?>&nbsp;</td>
		<td><?php echo $html->image('apps/icon_'.$user['User']['active'].'.png'); ?>&nbsp;</td>

		<td class="actions"><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
		<?php echo $this->Html->link(__('Reset password', true), array('action' => 'resetpassword', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['firstname'].' '.$user['User']['lastname'])); ?>		</td>
	</tr>
<?php endforeach; ?>
  </table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>

</div>
