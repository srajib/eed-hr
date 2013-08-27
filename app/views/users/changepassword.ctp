<?php 
$backlink = $this->Html->link("back", array('controller'=>'users', 'action'=>'mysaved'), array('class'=>'btn_nav btn_back','escape'=>false)); 
echo $this->element('toptab', array('current'=>4, 'backlink'=>$backlink)); ?>
<div id="content">

<div class="users form">
<h2>  <?php __('Change Password');?></h2>
<div class="mt8 mb8"><?php echo $this->Html->image('separetor.png'); ?></div>
  <?php  echo $form->create('User', array('action' => 'changepassword')); ?>
  <div class="input text required">
    <?php  echo $form->label('curr_pwd','Current Pass.'); ?>
    <?php  echo $form->password('curr_pwd'); ?>
    <?php  echo $form->error('curr_pwd'); ?>
  </div>
  <div class="input text required">
    <?php  echo $form->label('new_pwd','New Password'); ?>
    <?php  echo $form->password('new_pwd'); ?>
    <?php  echo $form->error('new_pwd'); ?>
  </div>
  <div class="input text required">
    <?php  echo $form->label('confirm_pwd','Confirm Pass.'); ?>
    <?php  echo $form->password('confirm_pwd'); ?>
    <?php  echo $form->error('confirm_pwd'); ?>
  </div>
  <?php  echo $form->end('Save'); ?>
  </div>

</div>
<?php echo $this->element('bottomtab', array('current'=>4)); ?>