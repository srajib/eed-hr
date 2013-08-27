

<div class="search">
<?php
echo $form->create('User', array('action' => 'login'));
echo $form->input('email_address', array('label'=>__('Username (your e-mail address)', true), 'after'=>''));
echo $form->input('password', array('label'=>__('Password', true), 'after'=>''));
echo "<div class='clear' style='height:10px;'></div>";
echo $form->submit('LOGIN');
echo $form->end();
?>
</div>
<div>&nbsp;</div>

<?php echo $html->link(__('Forgot your username or password?', true), array('controller'=> 'users', 'action'=>'forgotpassword'), array('style'=>'
background:url('.$this->base.'/img/btn_forgot_password.gif) no-repeat;
color:#fff;
font-weight:normal;
font-size:12px;
min-width:0;
padding:4px 8px;
margin-top:-10px;
text-decoration:none;')); ?>

