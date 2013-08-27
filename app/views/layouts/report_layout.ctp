<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Progati'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('admin.style');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container_report">
		<div id="report_header">
		<div class="fl"><?php echo $this->Html->image('logo_progati.gif'); ?>  </div>
		<div class="fr">&nbsp; &nbsp; <?php echo $this->Html->image('logo_usaid.gif'); ?></div>
		
			<div class="clear">&nbsp;</div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); echo $session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
<!--		<div class="fl" style="padding: 30px 0 0 180px">Powered by: <a href="http://www.grameensolutions.com/">Grameen Solutions</a></div>
		<div class="fr" style="padding: 30px 310px 0 0px">Copyright &copy; <?php echo date('Y'); ?> progatibd.org</div>-->
		<!--<div class="fl">Powered by: <a href="http://www.grameensolutions.com/">Grameen Solutions</a></div>
		<div class="fr">Copyright &copy; <?php echo date('Y'); ?> progatibd.org</div>-->
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>