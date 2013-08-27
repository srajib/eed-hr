<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	 <meta name="viewport" content="width=device-width,user-scalable=no" />
	<title>
		<?php __('Education Engineering Department - HRM'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('style');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header"> 
		<div class="fl" style="padding: 5px 0 0 150px;margin-left:auto;margin-right:auto;width:623px;height:100px;"><?php //echo $this->Html->link($this->Html->image('logo.jpg'), "/", array('escape'=>false))?>  </div>
		
		</div>
			<?php echo $this->Session->flash(); echo $session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
		<div id="footer">
			<!--<div class="fl" style="padding-left:10px;">Powered by: <a href="http://www.grameensolutions.com/">Grameen Solutions</a></div>
			<div class="fr" style="padding-right:10px;">Copyright &copy; <?php echo date('Y'); ?> BMDF </div>-->
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
<div class="clear" ></div>
<div id="footer" style="margin:top:17px;">
	<div class="fl">Powered by: <a href="http://www.webtechbd.net/">Web Technology Bangladesh</a></div>
	<div class="fr">Copyright &copy; <?php echo date('Y'); ?> http://www.eedmoe.gov.bd/</div>
	</div>
</body>
</html>