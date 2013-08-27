<?php echo $this->element('toptab', array('current'=>0)); ?>
<?php 
	if(!empty($content['Content']['description']))
		echo $this->Html->meta(array('name' => 'description', 'content' => $content['Content']['description']), null, array('inline' => false)); 
	if(!empty($content['Content']['keywords']))
		echo $this->Html->meta(array('name' => 'keywords', 'content' => $content['Content']['keywords']), null, array('inline' => false)); 
	if(!empty($content['Content']['robots']))
		echo $this->Html->meta(array('name' => 'robots', 'content' => $content['Content']['robots']), null, array('inline' => false)); 
	if(!empty($content['Content']['author']))
		echo $this->Html->meta(array('name' => 'author', 'content' => $content['Content']['author']), null, array('inline' => false)); 
?>
<div id="content">
	<h2 class="red"><?php echo $content['Content']['title']; ?></h2>
	<?php echo $content['Content']['content']; ?>
</div>
<?php echo $this->element('bottomtab', array('current'=>0)); ?>
