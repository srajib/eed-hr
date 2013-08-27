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

    </div>

    <div id="wrapper">
        <div id="content">

			<?php echo $this->Session->flash(); echo $session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
		
	

        </div>
    </div>

    <div id="footer">

    </div>
</div>
	<?php //echo $this->element('sql_dump'); ?>

</body>
</html>