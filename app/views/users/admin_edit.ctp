<div class="users form">
<div style="width: 400px;">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email_address');
		echo $this->Form->input('active');
	?>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.firstname').' '.$this->Form->value('User.lastname')  )); ?></li>
		<li><?php echo $this->Html->link(__('User list', true), array('action' => 'index'));?></li>
	</ul>
</div>