<style>
div.error-message
{
font-size:11px;
}

</style>

<div id="wrapper" style="width:1000px;height:570px;margin-left:auto;margin-right:auto;margin-top:12px;	background:url('<?php echo $this->base;?>/img/bg_request_pass.jpg') no-repeat;">
<div id="content" style="width:300px;margin-left:450px;margin-right:auto;background: none;padding-top:150px;">

<!--<div class="bodyheading"><h1><?php __('Password Request'); ?></h1></div>
<div class="mt8 mb8"><?php echo $this->Html->image('separetor.png'); ?></div>-->
<div class="mt8 mb8" style="width:258px;font-size:12px;"><?php __('If you have already registered with us but have forgotten your password please fill out the form below.'); ?></div>
<?php echo $form->create('User', array('action' => 'forgotpassword')); ?>

  <div class="input text required">
    <?php  echo $form->label('email_address', __('E-mail address', true)); ?>
    <?php  echo $form->text('email_address'); ?>
    <?php  echo $form->error('email_address'); ?>
  </div>
  
<?php   echo "<div class='clear' style='height:10px;'></div>"; ?>
<?php   echo $form->submit('Submit'); ?></td>
<?php   echo $form->end(); ?>

</div>
</div>