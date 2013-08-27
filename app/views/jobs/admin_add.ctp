<?php 
	echo $this->Html->script('jquery-1.4.2.min', false); 
	echo $this->Html->css('admin_job', null, array('inline'=>false)); 
?>
<script type="text/javascript">
//<![CDATA[
$(document).ready( function() {

	/*Salary*/
	function setSalary()
	{
		if($('input:radio[name="data[JobDetail][salary]"]:checked').val() == 'RN')
		{
			$('#divSalRange').show();
		}
		else
		{
			$('#JobDetailMinSalary').val("");
			$('#JobDetailMaxSalary').val("");
			$('#divSalRange').hide();
		}
	}
	$('input:radio[name="data[JobDetail][salary]"]').click(function(e) 
	{
		setSalary();
	});
	setSalary();
	
	/*Location*/
	function setLocation()
	{
		if($('input:radio[name="data[JobDetail][location]"]:checked').val() == 'IN'){
			$('input[name^="data[JobDetail][countries]"]').attr('checked', false);
			$('#divDistricts').show();
			$('#divCountry').hide();
			$('#country_selected').html("");
		}
		if($('input:radio[name="data[JobDetail][location]"]:checked').val() == 'INT'){
			$('input[name^="data[JobDetail][districts]"]').attr('checked', false);
			$('#divCountry').show();
			$('#divDistricts').hide();
			$('#district_selected').html("");
		}
		if($('input:radio[name="data[JobDetail][location]"]:checked').val() == 'ANY'){
			$('input[name^="data[JobDetail][districts]"]').attr('checked', false);
			$('input[name^="data[JobDetail][countries]"]').attr('checked', false);
			$('#divCountry').hide();
			$('#divDistricts').hide();
			$('#district_selected').html("");
			$('#country_selected').html("");
		}
	}
	$('input:radio[name="data[JobDetail][location]"]').click(function(e) 
	{
		setLocation();
	});
	setLocation();
	
	//district
	$('input[name^="data[JobDetail][districts]"]').click(function(e){
		getselected('data[JobDetail][districts]', 'district_selected');
	});
	getselected('data[JobDetail][districts]', 'district_selected');
	
	//countries
	$('input[name^="data[JobDetail][countries]"]').click(function(e){
		getselected('data[JobDetail][countries]', 'country_selected');
	});
	getselected('data[JobDetail][countries]', 'country_selected');
	
	
	///areas exp
	$('input[name^="data[JobDetail][expes]"]').click(function(e){
		getselected('data[JobDetail][expes]', 'expes_selected');
	});
	getselected('data[JobDetail][expes]', 'expes_selected');
	
	///Industry exp
	$('input[name^="data[JobDetail][indus]"]').click(function(e){
		getselected('data[JobDetail][indus]', 'indus_selected');
	});
	getselected('data[JobDetail][indus]', 'indus_selected');
	
	//application email
	function checkAppEmail()
	{
		if($('#JobDetailApplicationFormatsEMAIL').attr('checked')){
			$('#div_application_email').show();
		}
		else{
			$('#JobDetailApplicationEmail').val('');
			$('#div_application_email').hide();
		}
	}
	$('#JobDetailApplicationFormatsEMAIL').click(function(e){
		checkAppEmail();
	});
	checkAppEmail();
});

function remove_selected(ele_id)
{
	$('#'+ele_id).attr('checked', false);
	$('#'+ele_id+"_sele").remove();
}
function getselected(sele_prefix, container_div)
{
	$('#'+container_div).html("");
	
	$('input[name^="'+sele_prefix+'"]:checked').each(function(index, element){
		$('#'+container_div).append("<div class='box_selected' id=\""+element.id+"_sele\" > <table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td>"+$('label[for="'+element.id+'"]').text()+"</td><td align='right'><a href=\"javascript: remove_selected('"+element.id+"')\"><img src=\"<?php echo $this->webroot; ?>img/cross.png\" /></a></td></tr></table> </div>");
	});
}

//]]>

</script>

<div>&nbsp;</div>

<?php 	//debug($this->data);  ?>
<div style="margin: 10px 0 0 50px; width: 600px" class="biginput">
<h2>Create Newspaper Job</h2>

<div>&nbsp;</div>
<?php echo $this->Form->create('Job');?>

<div class="input select">
	<?php  
		echo $this->Form->label('category_id', __('Category', true)." *");
		echo $this->Form->select('category_id', $categories, null, array('empty'=>'---Please Select---')); 
		echo $this->Form->error('category_id');
	?>
</div>
<?php echo $this->Form->input('title', array('label'=>__('Job Title', true)." *")); ?>

<!--
<div class="clear mb8">&nbsp;</div>
<div style="padding: 5px; background: #EFEFEF">
	<?php echo $this->Form->input('JobDetail.job_source_name'); ?>
	<?php echo $this->Form->input('Job.company_name'); ?>
	<?php echo $this->Form->input('JobDetail.company_address_1'); ?>
	<?php echo $this->Form->input('JobDetail.company_address_2'); ?>
	<?php echo $this->Form->input('JobDetail.business_description'); ?>
</div>
<div class="clear mb8">&nbsp;</div>

<div class="input select miniinput">
	<?php echo $this->Form->input('vacancies', array('div'=>false)); ?>
</div>
-->

<div class="clear mb8">&nbsp;</div>
<div class="input checkbox autowidth">
	<label style="width: 145px;">Job application format *</label>
	<?php  foreach($application_formats as $key=>$value): ?>
	<?php echo $this->Form->checkbox("JobDetail.application_formats.".$key,array('hiddenField'=>false)); ?>
	<?php echo $this->Form->label("JobDetail.application_formats.".$key, $value); ?>
	<?php endforeach; ?>
	<div class="clear">&nbsp;</div>
	<?php echo $this->Form->error("JobDetail.application_format"); ?>
</div>

<div class="input text" id="div_application_email" style="display: none">
	<div class="clear mb8">&nbsp;</div>
	<?php echo $this->Form->label('JobDetail.application_email', 'Application Email *', array('class'=>'orange')); ?>
	<?php echo $this->Form->text('JobDetail.application_email'); ?>
	<div class="note">Email address to send CV</div>
	<?php echo $this->Form->error('JobDetail.application_email'); ?>
</div>

<div class="clear mb8">&nbsp;</div>
<?php echo $this->Form->input('JobDetail.instruction', array('type'=>'textarea', 'label'=>'Apply Instruction', 'rows'=>2)); ?>
<?php echo $this->Form->input('designation'); ?>
<?php echo $this->Form->input('start_date', array('minYear'=>date('Y'),'maxYear'=>date('Y')+1,'label'=>'Job  display start date')); ?>
<?php echo $this->Form->input('application_deadline', array('minYear'=>date('Y'),'maxYear'=>date('Y')+1)); ?>

<div class="input radio mt8">
	<div class="fl" style="width:150px;">Gender</div>
	<?php echo $this->Form->radio('gender', $genders, array('legend'=>false)); ?>
</div>
<div class="clear mb8">&nbsp;</div>

<div class="input radio mt8">
	<div class="fl" style="width:150px;">Position Type *</div>
	<?php echo $this->Form->radio('position_type', $position_types, array('legend'=>false)); ?>
	<div class="clear">&nbsp;</div>
	<?php echo $this->Form->error('position_type'); ?>
</div>

<div class="clear mb8">&nbsp;</div>
<div class="input checkbox autowidth">
	<label style="width: 145px;">Position Level *</label>
	<?php  foreach($levels as $key=>$value): ?>
	<?php echo $this->Form->checkbox("Job.levels.".$key,array('hiddenField'=>false)); ?>
	<?php echo $this->Form->label("Job.levels.".$key, $value); ?>
	<?php endforeach; ?>
	<div class="clear">&nbsp;</div>
	<div><?php echo $this->Form->error('level'); ?></div>
</div>


<div class="clear mb8">&nbsp;</div>
<div class="input checkbox autowidth" style="margin-left:150px;">
	<?php echo $this->Form->checkbox('hotjob'); ?>
	<?php echo $this->Form->label('hotjob', 'Display in hotjob listing *', array('class'=>'orange')); ?>
	<?php echo $this->Form->error('hotjob'); ?>
	<div class="note" style="margin-left: 0; clear: both">* BDT 500Tk. Charge applicable</div>
</div>
<div class="clear mb8 mt8">&nbsp;</div>
<div class="input radio">
	<label style="width: 140px; margin-left:0">Salary *</label>
	<?php echo $this->Form->radio('JobDetail.salary', $salaries, array('legend'=>false)); ?>
	<div style="clear: both"><?php echo $this->Form->error('JobDetail.salary'); ?></div>
	<div style="clear: both; padding: 4px 0 0 150px; <?php if($form->value('JobDetail.salary') != 'RN') echo "display: none"; ?>   " id="divSalRange">	
	<table width="500" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
	  <tr>
		<td width="79">Salary Range:</td>
		<td width="67" align="right">Minimum &nbsp;</td>
		<td width="70"><?php echo $this->Form->text('JobDetail.min_salary', array('style'=>'width: 60px;')); ?></td>
		<td width="74" align="right">Maximum &nbsp;</td>
		<td width="70"><?php echo $this->Form->text('JobDetail.max_salary', array('style'=>'width: 60px;'));?></td>
		<td width="40">BTD</td>
		<td width="100"><?php echo $this->Form->select('JobDetail.salary_type', $salary_types, null, array('empty'=>false));  ?></td>
	  </tr>
	  <tr>
	    <td colspan="7"><?php echo $this->Form->error('JobDetail.min_salary'); ?><?php echo $this->Form->error('JobDetail.max_salary'); ?></td>
	    </tr>
	</table>
	</div>
</div>
<div class="clear mb8 mt8">&nbsp;</div>

<div class="input radio">
	<label style="width: 140px; margin-left:0">Location *</label>
	<?php echo $this->Form->radio('JobDetail.location', $locations, array('legend'=>false)); ?>
	<div class="clear">&nbsp;</div>
	<?php echo $this->Form->error('JobDetail.location'); ?>
	<div style="clear: both; padding: 4px 0 0 150px; <?php if($form->value('JobDetail.location') != 'IN') echo "display: none"; ?>   " id="divDistricts">	
	<table width="560" border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="68" valign="top"><strong>District</strong></td>
		<td width="290" valign="top">
		  <div style="width: 290px; height: 85px; overflow: auto; padding: 5px; background: #D9F1FF; border: 1px solid #DDDDDD">
		  <table width="250"  border="0" cellpadding="0" cellspacing="0">
			<?php  foreach($districts as $key=>$value): ?>
			<tr>
			  <td width="22"><?php echo $this->Form->checkbox("JobDetail.districts.".$key,array('hiddenField'=>false)); ?></td>
			  <td width="328"><?php echo $this->Form->label("JobDetail.districts.".$key, $value, array('style'=>'width: auto')); ?></td>
			</tr>
			<?php endforeach; ?>	
		  </table>		
		  </div>
		</td>
		<td width="202" valign="top"><div  style="padding: 0 5px 5px 5px;" id="district_selected">&nbsp;</div></td>
		</tr>
	</table>
	</div>
	
	<div style="clear: both; padding: 4px 0 0 150px; <?php if($form->value('JobDetail.location') != 'INT') echo "display: none"; ?>   " id="divCountry">	
	<table width="560" border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="68" valign="top"><strong>Country</strong></td>
		<td width="290" valign="top">
		  <div style="width: 290px; height: 85px; overflow: auto; padding: 5px; background: #D9F1FF; border: 1px solid #DDDDDD">
		  <table width="250"  border="0" cellpadding="0" cellspacing="0">
			<?php  foreach($countries as $key=>$value): ?>
			<tr>
			  <td width="22"><?php echo $this->Form->checkbox("JobDetail.countries.".$key,array('hiddenField'=>false)); ?></td>
			  <td width="328"><?php echo $this->Form->label("JobDetail.countries.".$key, $value, array('style'=>'width: auto')); ?></td>
			</tr>
			<?php endforeach; ?>	
		  </table>		
		  </div>
		</td>
		<td width="202" valign="top"><div  style="padding: 0 5px 5px 5px;" id="country_selected">&nbsp;</div></td>
		</tr>
	</table>
	</div>

</div>

<div class="clear mb8 mt8">&nbsp;</div>
<?php echo $this->Form->input('tags', array('label'=>'Keywords','after'=>'<div class="note">e.g. Software, PHP, HTML, Javascript</div>')); ?>
<div class="clear mb8">&nbsp;</div>
<div class="input select">
	<?php  
		echo $this->Form->label('JobDetail.min_age', __('Age (Year)', true));
		echo $this->Form->select('JobDetail.min_age', $num_options, null, array('empty'=>'---Mimimum---'))." to "; 
		echo $this->Form->select('JobDetail.max_age', $num_options, null, array('empty'=>'---Maximum---')); 
	?>
</div>
<div class="clear mt8">&nbsp;</div>
<h2>Education</h2>
<div class="clear mb8">&nbsp;</div>
<div class="input select">
	<?php  
		echo $this->Form->label('education', __('Education', true)." *");
		echo $this->Form->select('education', $educations, null, array('empty'=>'---Please Select---')); 
		echo $this->Form->error('education');
	?>
</div>
<?php echo $this->Form->input('JobDetail.education_details', array('rows'=>'2')); ?>

<div class="clear mt8">&nbsp;</div>

<h2>Experience</h2>
<div class="clear mb8">&nbsp;</div>
<div class="input select">
	<?php  
		echo $this->Form->label('JobDetail.exp_min', __('Experience (Year)', true));
		echo $this->Form->select('JobDetail.exp_min', $num_options, null, array('empty'=>'---Mimimum---'))." to "; 
		echo $this->Form->select('JobDetail.exp_max', $num_options, null, array('empty'=>'---Maximum---')); 
	?>	
</div>
<?php	echo $this->Form->input('JobDetail.experience_details', array('rows'=>'2')); ?>
<div class="input select autowidth">
  <label>Do you need the candidate to have experience in the following areas? </label>
	<table width="570" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="363" valign="top">
		
		<div style="width: 350px; height: 85px; overflow: auto; padding: 5px; background: #D9F1FF; border: 1px solid #DDDDDD">
	  <table width="300"  border="0" cellpadding="0" cellspacing="0">
		<?php  foreach($experiences as $key=>$value): ?>
		<tr>
		  <td width="22"><?php echo $this->Form->checkbox("JobDetail.expes.".$key,array('hiddenField'=>false)); ?></td>
		  <td width="278"><?php echo $this->Form->label("JobDetail.expes.".$key, $value, array('style'=>'width: auto')); ?></td>
		</tr>
		<?php endforeach; ?>	
	  </table>		
	  </div>
		
		</td>
		<td width="207" valign="top">
			<div style="padding: 0 5px 5px 5px;" id="expes_selected"></div>
		</td>
	  </tr>
	</table>

</div>
<div class="input select autowidth">
  <label>Do you need the candidate to have experience in the following Business Areas/Industries?</label>

	  <table width="570" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td width="363" valign="top">
		    <div style="width: 350px; height: 85px; overflow: auto; padding: 5px; background: #D9F1FF; border: 1px solid #DDDDDD">
			  <table width="300" border="0" cellspacing="0" cellpadding="0">
			    <?php  foreach($business_types as $key=>$value): ?>
			    <tr>
				  <td width="22"><?php echo $this->Form->checkbox("JobDetail.indus.".$key,array('hiddenField'=>false)); ?></td>
				  <td width="278"><?php echo $this->Form->label("JobDetail.indus.".$key, $value, array('style'=>'width: auto')); ?></td>
			    </tr>
			    <?php endforeach; ?>		
			  </table>
		    </div>		  </td>
		  <td width="207" valign="top">
<div style="padding: 0 5px 5px 5px;" id="indus_selected"></div>		  </td>
		</tr>
	  </table>

</div>


<div class="clear mb8">&nbsp;</div>
<h2>Job details</h2>
<div class="clear mb8">&nbsp;</div>
<?php echo $this->Form->input('JobDetail.responsibility', array('label'=>'Job Responsibility *','rows'=>'2')); ?>
<?php echo $this->Form->input('JobDetail.add_requirements', array('label'=>'Additional Requirement','rows'=>'2')); ?>
<?php echo $this->Form->input('JobDetail.other_benefits', array('rows'=>'2')); ?>
<!--
<h2>SEO</h2>
<div class="clear mb8">&nbsp;</div>
<?php echo $this->Form->input('JobDetail.meta_keyword'); ?>
<?php echo $this->Form->input('JobDetail.meta_description'); ?>
-->
<div class="clear mt8 mb8">&nbsp;</div>
	
<?php echo $this->Form->end(__('Submit', true));?>
</div>



<div class="clear mb8">&nbsp;</div>