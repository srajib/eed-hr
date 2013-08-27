<div class="users form">
<div style="width: 400px;">
<fieldset>
  <legend>
  <?php __('Change Password');?>
  </legend>
<?php  echo $form->create('User', array('action' => 'admin_changepassword')); ?>
<br />
User: <strong><?php echo $session->read('Auth.User.firstname')." ".$session->read('Auth.User.lastname'); ?></strong>
<br />
<br />

<div class="input text required">
	<?php  echo $form->label('curr_pwd','Current Password'); ?>
	<?php  echo $form->password('curr_pwd'); ?>
	<?php  echo $form->error('curr_pwd'); ?>
</div>
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