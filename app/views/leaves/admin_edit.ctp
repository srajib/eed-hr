<script src="<?php echo $this->base;?>/js/jscal2.js"></script>
<script src="<?php echo $this->base;?>/js/lang/en.js"></script>

<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery-1.4.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/steel/steel.css" />

<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Customers', 'index');  
$this->Html->addCrumb('Create Customer', ''); 
?>

<style>

.leaveStatus {
    float: left;
    border:solid 0px red;
    width:600px;
    padding: 10px;
}
.leaveStatus input{
    border:solid 1px #ccc;   
    height:25px; 
    width:200px;
}
.leaveStatus select {
    border:solid 1px #ccc;   
    height:30px; 
    width:208px;
}

input{
display:"";
}

form{
width:200%;
}

</style>


<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'leaves','action' => 'index')); ?></li>
 </ul>
</div>	
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:350px;width:400px;float:left;margin-left:20px;">
<h2 align="center" style="width:500px;"> Edit Leave Information</h2>

<?php echo $this->Form->create('Leave');
     echo $this->Form->input('leave_id');
 ?>

   <fieldset class="ui-widget-content">
   <legend class="ui-widget-header ui-corner-all">Leave Info</legend>

  <div style="float:left;display:inline;">
  
     <div class="input" style="float:left;display:inline;"> 
      <?php echo $this->Form->input('application_date',array('label'=>'Application Date','type'=>'text','style'=>'width:80px;'));  ?>   
	</div>

    
	 <div style="float:left;display:inline;margin:18px 14px 0px 5px;">
	  <input type="button" value="..." id="f_btn1" style="width:26px;height:26px;padding-top:-10px;margin-top:-15px; background:url('<?php echo $this->base;?>/img/calendar_days.png') no-repeat ;"/>
    </div>
	

	<script type="text/javascript">

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: true
      });
	  
      cal.manageFields("f_btn1", "LeaveApplicationDate", "%Y-%m-%d");
	 
   </script> 
     
	 
	<div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>

	

      <div class="input"> 
	  <?php    
	  	   // echo $this->Form->label('Employee Name', __('Employee Name', true)." *");
            echo $this->Form->input('Leave.employee_id',$employees,array('label'=>'Employee'));  ?>   
	  </div> 
	 
	 
	 <div class="input"> 
      <?php echo $this->Form->input('department', $departments,array('default'=>'1','label'=>''));  ?>
	</div> 

	 <div class="input"> 
      <?php echo $this->Form->input('designation',$designations,array('default'=>'1','label'=>''));  ?>   
	</div> 
	 
	
	
	
    <div class="input" style="float:left;display:inline;">
      <?php echo $this->Form->input('leave_start',array('label'=>'Leave Start Date','type'=>'text','style'=>'width:80px;'));  ?>   
	</div>
	
	  <div style="float:left;display:inline;margin:18px 14px 0px 5px;">
	  <input type="button" value="..." id="f_btn2" style="width:26px;height:26px;padding-top:-10px;margin-top:-15px; background:url('<?php echo $this->base;?>/img/calendar_days.png') no-repeat ;"/>
    </div>
	

	<script type="text/javascript">

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: true
      });
	  
      cal.manageFields("f_btn2", "LeaveLeaveStart", "%Y-%m-%d");
	 
   </script> 
	
	<div class="input" style="margin-left:-10px;float:left;display:inline;">
      <?php echo $this->Form->input('leave_end',array('label'=>'Leave End Date','type'=>'text','style'=>'width:80px;'));  ?>   
	</div>
	
	
	  <div style="float:left;display:inline;margin:18px 14px 0px 5px;">
	  <input type="button" value="..." id="f_btn3" style="width:26px;height:26px;padding-top:-10px;margin-top:-15px; background:url('<?php echo $this->base;?>/img/calendar_days.png') no-repeat ;"/>
      </div>
	

	<script type="text/javascript">

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: true
      });
	  
      cal.manageFields("f_btn3", "LeaveLeaveEnd", "%Y-%m-%d");
	 
		function parseDate(str) {
           var mdy = str.split('/')
           return new Date(mdy[2], mdy[0]-1, mdy[1]);
           }

          function daydiff(first, second) {
            return (second-first)/(1000*60*60*24)
          }
		  
	
           $("#LeaveLeaveEnd").blur(function ()  {
		  
		   t1=$('#LeaveLeaveStart').val();

		   t2=$('#LeaveLeaveEnd').val() ;

            //Total time for one day

            var one_day=1000*60*60*24; 
            //Here we need to split the inputed dates to convert them into standard format

            var x=t1.split("-");     
            var y=t2.split("-");
            //date format(Fullyear,month,date) 


			var date1=new Date(x[0],(x[1]-1),x[2]);
	  
			var date2=new Date(y[0],(y[1]-1),y[2]);
			var month1=x[1]-1;
			var month2=y[1]-1;
        
           //Calculate difference between the two dates, and convert to days

               
          _Diff=Math.ceil((date2.getTime()-date1.getTime())/(one_day)); 
           
		   $('#LeaveLeaveLengthDays').val(_Diff);
		  
		 		 
           });
	
       </script>
	 
	
   
    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
   
	<div class="input"> 
      <?php echo $this->Form->input('leave_length_days',array('label'=>'No. of Days'));  ?>   
	</div>
	
	 <div class="select"> 
      <?php 
	          
			 $merchant_select = '1' ;
			
			  echo $form->input('leave_type_id',
						array('label' => 'Leave Type',
						  'options' => $LeaveType,
						  'default' => $merchant_select));

			
			 ?>   
	</div>
	
	
	</div>
	
	
	<div style="float:left;display:inline;margin-left:40px;">
	
	 <div class="input"> 

      <?php echo $this->Form->input('leave_reason',array('label'=>'Purpose of Leave'));  ?>   
	</div>
	  
	 
	 <div class="input"> 
      <?php echo $this->Form->input('leave_period_contact',array('label'=>'Address & Contact Telephone # during Leave Period'));  ?>   
	</div> 
         
    <div class="input"> 
      <?php echo $this->Form->input('leave_recomendation',array('label'=>'Recomended by ( Section Head )'));  ?>   
	</div>    
	   
	   
     <div class="input"> 
      <?php echo $this->Form->input('leave_comments',array('label'=>'Leave Comments','class'=>'ui-state-default ui-corner-all'));  ?>   
	 </div>         
      
	  <div class="clear"></div>
<!--        <style>
		label{ display:inline;}
		</style>-->
	 
	 
	  <div class="input"> 
	   <?php
	  echo $this->Form->label('Checked by Substitues', __('Checked by Substitues', true,array('style'=>'display:inline;')));
      echo $this->Form->checkbox('leave_chked_admin',array('label'=>'Checked by Substitues','type'=>'check','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>  
      <div class="clear"></div>
	  
	 <div class="input"> 
	    
	   <?php
	   echo $this->Form->label('Recomended by Section Head', __('Checked by Section Head', true));
       echo $this->Form->checkbox('leave_chked_md',array('label'=>'Checked by Section Head','type'=>'check','class'=>'ui-state-default ui-corner-all'));  
	   
	   //echo $this->Form->hidden('employee_id');?> 
	     
	</div>  
     
	 </div>


    <div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	
	</fieldset>
	
	<?php echo $this->Form->end(__('Save', true));?>
	
	
  
	
	<div class="clear">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	<div class="clear" style="margin-top:10px;">&nbsp;</div>




</div>
</div>

<div class="clear">&nbsp;</div>
	
	  <script>
	    $(document).ready( function() {
				
			         $("#LeaveEmployeeId").change(function () {
				   
				     $("#CL").load('<?php echo $this->base;?>/admin/leaves/leavestatus/'+$(this).val());
				   
				});
		});
		</script>
	

	<div class="Leave index">

     <div id="CL" style="width: 48%; margin-top: 10px; float:left; margin-bottom: 15px;" >
			
			<!-- ADD WILL LOAD HERE -->
			
			<span class="aj_loading">&nbsp;</span>
	
     </div> 

    </div>
