<?php 
$this->Html->addCrumb('WelCome', ''); 
?>
<?php echo $this->Html->script('jquery-1.4.2.min', false); ?>

<script language="JavaScript">

function selectcredit()
{
 if($('#creditno').val())
 {
 window.location="<?php echo $this->base;?>/admin/dashboards/index/"+$('#creditno').val();
 }
 
	else alert('No Credit no. selected. ');
}

function creditalert()
{
  alert('No Credit no. selected. Please select credit no. first.');
}
</script>
<div style="clear:both"><br /></div>
<div style="width:129px;float:left;">


<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:-4px;">

<?php // echo $session->flash(); 
if($credit_no){ ?>

	<ul>
		<li><?php echo $this->Html->link(__('Loan Management', true), array('controller'=>'loans','action' => 'admin_dashboard')); ?></li>
		
		<li><?php echo $this->Html->link(__('Fund Management', true), array('controller'=>'funds','action' => 'admin_index')); ?></li>
		
		<li><?php echo $this->Html->link(__('Collection', true), array('controller'=>'loan_payments','action' => 'admin_collectiontype')); ?></li>
	
		<li><?php echo $this->Html->link('Data', '/admin/loans/', array('class' => 'button'));?></li> 
		
		<li><?php echo $this->Html->link(__('Actual Vs. Planned', true), array('controller'=>'loans','action' => 'admin_reports')); ?></li>
	</ul>
	
	<?php } else
	{ ?>
		<ul>
		<li> <?php echo $this->Html->link('Loan Management',"javascript:creditalert()"); ?></li>
		<li> <?php echo $this->Html->link('Fund Management',"javascript:creditalert()"); ?></li>
		<li> <?php echo $this->Html->link('Collection',"javascript:creditalert()"); ?></li>
		<li> <?php echo $this->Html->link('Data',"javascript:creditalert()"); ?></li>
		<li> <?php echo $this->Html->link('Actual Vs. Planned',"javascript:creditalert()"); ?></li>
	    </ul>
	
	<?php }
	 ?>
</div>
</div>
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:42px;margin-top:-13px;">
 <div style="margin-left:380px;">
 
 <h2 align="center">Welcome!</h2>
<?php  ?>
 <div style="width:280px;float:left;margin-left:-333px">
  <?php echo $this->Form->label('credit no'); ?>
  <?php echo $this->Form->select('creditno',$creditno); ?>
   <input type="submit" name="report" value="Select Credit>>" onClick="selectcredit();" style="width:104px;height:25px;"> 
  </div>
  <?php //} ?>
</div>
</div>



