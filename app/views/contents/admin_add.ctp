<?php $this->Html->script('fckeditor.js', false); ?>
<div class="contents form">
<?php echo $this->Form->create('Content');?>
	<fieldset>
 		<legend><?php __('Add Content'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $fck->load('Content/content');
		
		echo $this->Form->input('description');
		echo $this->Form->input('keywords');
		echo $this->Form->input('robots');
		echo $this->Form->input('author');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contents', true), array('action' => 'index'));?></li>
	</ul>
</div>