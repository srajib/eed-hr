<div class="users form">
<div style="width: 400px;">
<fieldset>
<legend>
<?php __('Reset Password');?>
</legend>
<?php  echo $form->create('User', array('action' => 'resetpassword')); 
    echo $form->input('id');
?>
<br />

<div class="input text required">
  <?php  echo $form->label('new_pwd','New Password'); ?>
  <?php  echo $form->password('new_pwd'); ?>
  <?php  echo $form->error('new_pwd'); ?>
</div>
<div class="input text required">
  <?php  echo $form->label('confirm_pwd','Confirm Password'); ?>
  <?php  echo $form->password('confirm_pwd'); ?>
  <?php  echo $form->error('confirm_pwd'); ?>
</div>

<?php  echo $form->end('Save'); ?>
</fieldset>
</div>
</div>



<div class="actions">
  <ul>
	  <li><?php echo $html->link(__('Back to user list', true), array('controller'=> 'users', 'action'=>'index')); ?></li>
  </ul>
</div>
