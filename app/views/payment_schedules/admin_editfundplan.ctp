

<div class="actions" style="width:160px;float:left;">
<ul>
 <li><?php echo $this->Html->link(__('All Fund expenditure list', true), array('action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin-left:20px;">
 <h2 align="center" style="display:inline;"> Create Fund Usage plan</h2>
<?php 
echo $this->Form->create('FundUsageplan', array('url' => array('controller' => 'fund_expenditures', 'action' => 'editfundplan')));
echo $this->Form->input('id');  ?>   


	 <div class="input select">
		<?php  
			echo $this->Form->label('Category', __('Category', true));
			echo $this->Form->select('category', $categories, null,array('empty'=>'---Please Select---')); 
			echo $this->Form->error('category');
		?> 
	</div>	
    
    <div class="input"> 
      <?php echo $this->Form->input('description',array('label'=>'Description'));  ?>   
	</div>
	
		
    <div class="input"> 
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