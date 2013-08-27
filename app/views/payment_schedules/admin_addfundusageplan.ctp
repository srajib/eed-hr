
<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery-1.4.2.min.js"></script>
<script src="<?php echo $this->base;?>/js/jquery.validate.js" type="text/javascript"></script>

<style>
		#FundUsageplanAdminAddfundusageplanForm label.error {
			font-size:10px;
			color:red;
		}
</style>
<script>
$(document).ready( function() {
	// validate signup form on keyup and submit
	$("#FundUsageplanAdminAddfundusageplanForm").validate({
		rules: {
			'data[FundUsageplan][Amount]':     {
			                                      required: true,
												  number: true,
												  min: 100000
			                                    }
		},
		messages: {
			'data[FundUsageplan][Amount]':{ 
			   									    required: 'Please enter Amount',
												    number: 'Amount should be numeric',
													min: 'Please enter a value greater than or equal to 100000'
			                                      }
				
		}
	});
	
	
	});
	
				
</script>	
<div class="actions" style="width:160px;float:left;">
<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('action' => 'fundusagelist')); ?></li>
 </ul>
</div>	
<div style="height:600px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin-left:20px;">
 <h2 align="center" style="display:inline;"> Create Fund Usage plan</h2>
<?php 
echo $this->Form->create('FundUsageplan', array('url' => array('controller' => 'fund_expenditures', 'action' => 'addfundusageplan')));
?>

	 <div class="input text required">
		<?php  
			echo $this->Form->label('Category', __('Category', true));
			echo $this->Form->select('category', $categories, null,array('empty'=>'---Please Select---')); 
			echo $this->Form->error('category');
		?> 
	</div>	
    
    <div class="input"> 
      <?php echo $this->Form->input('description',array('label'=>'Description'));  ?>   
	</div>
	
		
    <div class="input text required">
      <?php echo $this->Form->input('Amount',array('label'=>'Amount'));  ?>   
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('remarks',array('label'=>'Remarks')); ?>
	</div>
	
    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<?php echo $this->Form->end(__('Save', true));?>
</div>
</div>