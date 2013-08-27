
<?php echo $this->Html->script('jquery-1.4.4.min.js');?>
<script src="<?php echo $this->base;?>/js/jquery.validate.js" type="text/javascript"></script>

<style>
		#FundExpenditureAdminAddForm label.error {
			font-size:10px;
			color:red;
		}
</style>


<script>
$(document).ready( function() {

	
	
	$("#FundExpenditureAdminAddForm").validate({
		rules: {
			'data[FundExpenditure][withdrawl_app_number]':{
			                         required: true,
									 number: true,
									 min:1
			                         }
			
		
		},
		messages: {
			'data[FundExpenditure][withdrawl_app_number]':{ 
			   						required: 'Please enter App number',
									number: 'App number should be numeric',
									min: 'App number should not be less than 1'	
			                        }
				
		}
		
		
	});
	
	
	});
</script>	

<div class="actions" style="width:160px;float:left;">
<ul>
 <li><?php echo $this->Html->link(__('All Fund expenditure list', true), array('action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin-left:20px;">
 <h2 align="center" style="display:inline;"> Create Fund expenditure </h2>
<?php echo $this->Form->create('FundExpenditure');?>
    
    <div class="clear" style="height:30px">&nbsp;</div>
	
    <div class="clear">&nbsp;</div>
	
<!--	<div class="input"> 
	<div class="input text required">
      <?php echo $this->Form->label('credit no'); ?>
	  <?php echo $this->Form->select('creditno',$creditno); 
	        echo $this->Form->error('creditno');
	  ?>
	  </div>
	</div>-->
   <input type='hidden' name='data[FundExpenditure][creditno]' id='FundExpenditureCreditno' value="<?php echo $creditno;?>" />
  
    <div class="input"> 
	<div class="input text required">
    	<?php  
			echo $this->Form->label('Name of month', __('Name of month', true));
			echo $this->Form->select('name_of_month', $name_of_month, null, array('empty'=>'---Please Select---')); 
			echo $this->Form->error('name_of_month');
		?>
	</div>
	</div>
	
    <div class="input"> 
    <div class="input text required">
      <?php echo $this->Form->input('withdrawl_app_number',array('label'=>'Withdrawal App Number'));  ?>   
	</div>
    </div>
	
	<div class="input"> 
	<div class="input text required">
		<?php  
			echo $this->Form->label('Head of Expenditure', __('Head of Expenditure', true));
			echo $this->Form->select('category', $categories, null,array('empty'=>'---Please Select---')); 
			echo $this->Form->error('category');
		?> 
	</div>	
	</div>
	
	<div class="input"> 
	 <div class="input text required"> 
    	<?php  
			echo $this->Form->label('Payment Type', __('Payment Type', true));
			echo $this->Form->select('payment_type', $payment_type, null, array('empty'=>'---Please Select---')); 
			echo $this->Form->error('payment_type');
		?>
	</div>
	</div>
	
   <div class="input"> 
      <?php echo $this->Form->input('remarks',array('label'=>'Remarks')); ?>
	</div>
	
    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<?php echo $this->Form->end(__('Save', true));?>
</div>
</div>