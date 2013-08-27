<script src="<?php echo $this->base;?>/js/jscal2.js"></script>
<script src="<?php echo $this->base;?>/js/lang/en.js"></script>

<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery-1.4.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/steel/steel.css" />

<style>
#content{
height:900px;
}

</style>


<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Customers', 'index'); 
$this->Html->addCrumb('Create Customer', ''); 
?>
<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'employees','action' => 'index')); ?></li>
 </ul>
</div>	


<div style="height:auto;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:auto;width:605px;float:left;margin-left:20px;">


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
  </script>
</head>
<body style="font-size:62.5%;">
  
  <h2 align="center" style="width:600px;">Add Employee</h2>
  
  <?php echo $this->Form->create('Employee', array('type'=>'file','class'=>'ui-widget'));?>
  
  
  
	<div style='float:left;width:150px;height:auto;margin:15px;'> 
    <img name="" src="<?php echo $this->base;?>/img/blank_avatar_220.png" width="100" height="100" alt="" align="right"/><br />
	<div style="clear:both;height:80px;"></div>
	
	<?php //echo $this->Form->input('content', array('type'=>'file','after'=>'File Type: JPG, GIF or PNG'));
      echo $this->Form->input('content_temp', array('label'=>'Picture','style'=>'display: block','type'=>'file','after'=>'File Type: JPG/GIF/PNG'));?>
   </div>
	<div style="clear:both;"></div>
	
        <div class="input"> 
      <?php echo $this->Form->input('first_name',array('label'=>'First Name','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
	 <div class="input"> 
      <?php echo $this->Form->input('last_name',array('label'=>'Last Name','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    
	 <div class="input"> 
      <?php echo $this->Form->input('father_name',array('label'=>'Father Name','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>


     <div class="input"> 
      <?php echo $this->Form->input('mother_name',array('label'=>'Mother Name','class'=>'ui-state-default ui-corner-all'));  ?>   
	 </div>
	 
  
  
    <div class="input" style="display:inline;width:100px;"> 
	   <?php
		 $options = array('Male'=>'Male','Female'=>'Female');
         echo $this->Form->radio('gender',$options,array('style'=>'float:left;','class'=>'ui-state-default ui-corner-all'));
		?>   
	</div> 
  
	
    <div class="input" style="display:inline;width:100px;"> 
	   <?php
		 $options = array('Married'=>'Married','Unmarried'=>'Unmarried');
         echo $this->Form->radio('marital_status',$options,array('style'=>'float:left;','class'=>'ui-state-default ui-corner-all'));
		?>   
	</div> 
        
  
     <div class="input"> 
      <?php echo $this->Form->input('freedom_fighter',array('type'=>'checkbox','value'=>'1','class'=>'ui-state-default ui-corner-all'));  ?>   
	 </div>
  
  
    <div class="input" style="display:inline;width:100px;"> 
	   <?php
		 $options = array('Islam'=>'Islam','Hindu'=>'Hindu','Chirstian'=>'Chirstian','Buddhist'=>'Buddhist','Other'=>'Other');
         echo $this->Form->radio('religion',$options,array('style'=>'float:left;','class'=>'ui-state-default ui-corner-all'));
		?>   
	</div> 
        
  
  
  
	<div class="input"> 
      <?php 
	  
	  echo $this->Form->input('date_of_birth', array(
			'label' => 'Date of birth','class'=>'ui-state-default ui-corner-all',
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y') - 14 ));
	   ?>   
	</div>
	
        
	
    <div class="input"> 
      <?php echo $this->Form->input('designation_id',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
  
  
    <div class="input"> 
      <?php echo $this->Form->input('national_ID',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    
    
    <div class="input"> 
      <?php echo $this->Form->input('tin',array('label'=>'TIN','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    
  
    
        
        
	
    <div class="input"> 
      <?php echo $this->Form->input('present_address',array('label'=>'Present Address','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('present_address_Zilla',array('label'=>'Zila','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('present_address_upozilla',array('label'=>'Upozila','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('present_address_post_code',array('label'=>'Post Code','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
  
  
                <input type="checkbox" name="samepermanetnt" id="samepermanetnt" value="1"><label for="samepermanent"> please tick, if same as present address</label>
                
    <div class="input"> 
      <?php echo $this->Form->input('parmanent_address',array('label'=>'Parmanent Address','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('parmanent_address_zilla',array('label'=>'Zila','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('parmanent_address_upozilla',array('label'=>'Upozila','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('parmanent_address_post_code',array('label'=>'Post Code','class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
  
                
                
  
                
    <div class="input"> 
      <?php echo $this->Form->input('mobile',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
                
                
    <div class="input"> 
      <?php echo $this->Form->input('land_phone',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('fax',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
    <div class="input"> 
      <?php echo $this->Form->input('email',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
                
                
                
                
                
	
		
<!--	
	
	
	<div class="input"> 
	<span style=""> Location</span>
	   <select name="data[Employee][living_area]" class="ui-state-default ui-corner-all"> 
	   
		<option value="Barisal">Barisal</option>
		<option value="Dhaka">Dhaka</option> 
		<option value="Chittagong">Chittagong</option>
		<option value="Rajshahi">Rajshahi</option>
		<option value="Sylhet">Sylhet</option>
		<option value="Khulna">Khulna</option>
		<option value="Rangpur">Rangpur</option>
		</select>
	</div>
	
	
		<div style="clear:both;"></div>	<div style="clear:both;"></div>

	
	 	<div class="input"> 
	   <?php echo $this->Form->label('Department');  ?>   
	   <?php echo $this->Form->select('dept_id', $departments,array('empty'=>false, 'selected'=>1,'class'=>'ui-state-default ui-corner-all ui-helper-hidden'));?>   
     </div>
	-->
        
	
	<div class="input"> 
      <?php 
	  
	  echo $this->Form->input('join_date', array(
			'label' => 'Join Date','class'=>'ui-state-default ui-corner-all',
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y') + 18 ));
	   ?>   
	</div>
	
	
	<div style="clear:both;"></div>
		
	<div class="input"> 
      <?php 
	  
	  echo $this->Form->input('retirement_date', array(
			'label' => 'Retirement Date','class'=>'ui-state-default ui-corner-all',
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y') + 18 ));
	   ?>   
	</div>
        
        
        
        <fieldset id="edu_info" style="margin-top: 50px;">
            <legend>Educational Informations</legend>
            
            <h3>1</h3>
    <div class="input"> 
      <?php echo $this->Form->input('EducationalQualification.0.name_of_degree',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
                
                
    <div class="input"> 
      <?php echo $this->Form->input('EducationalQualification.0.name_of_institution',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
    <div class="input"> 
      <?php echo $this->Form->input('EducationalQualification.0.board',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
        
        
    <div class="input"> 
      <?php echo $this->Form->input('EducationalQualification.0.country',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
            
	
    <div class="input"> 
      <?php echo $this->Form->input('EducationalQualification.0.year_of_passing',array('type'=>'text','class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
    <div class="input"> 
      <?php echo $this->Form->input('EducationalQualification.0.result',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
        </fieldset>
        
        <a id="add_inst" style="padding: 2px; font-size: 12px; background: #71B1E0; color: #000; cursor: pointer;">Add More Educational Information</a>
        
        
        
        
        <fieldset id="edu_info" style="margin-top: 50px;">
            <legend>Service Informations</legend>
            
    <div class="input"> 
      <?php echo $this->Form->input('present_post',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
                
        
    <div class="input"> 
      <?php echo $this->Form->input('present_posting_place',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
	<div style="clear:both;"></div>
		
	<div class="input"> 
      <?php 
	  
	  echo $this->Form->input('join_date_in_present_post', array(
			'class'=>'ui-state-default ui-corner-all',
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y')));
	   ?>   
	</div>
            
            
    <div class="input"> 
      <?php echo $this->Form->input('pay_scale',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
        
    <div class="input"> 
      <?php echo $this->Form->input('basic_pay',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
            
	
            
	<div class="input"> 
      <?php 
	  
	  echo $this->Form->input('date_of_increament', array(
			'class'=>'ui-state-default ui-corner-all',
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y') ));
	   ?>   
	</div>
            
        
        </fieldset>
        
        
        
        
        
        
        
        
        <fieldset id="leave_info" style="margin-top: 50px;">
            <legend>Leave Informations</legend>
            
            <h3>1</h3>
    <div class="input"> 
      <?php echo $this->Form->input('Leave.0.leave_start',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
                
                
    <div class="input"> 
      <?php echo $this->Form->input('Leave.0.leave_end',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
    <div class="input"> 
      <?php echo $this->Form->input('Leave.0.leave_length_days',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
        
        
    <div class="input"> 
      <?php echo $this->Form->input('Leave.0.nature_of_leave',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
            
	
    <div class="input"> 
      <?php echo $this->Form->input('Leave.0.grounds',array('type'=>'text','class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
    <div class="input"> 
      <?php echo $this->Form->input('Leave.0.sanction_order_number',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
	
            
	<div class="input"> 
      <?php 
	  
	  echo $this->Form->input('Leave.0.sanction_order_date', array(
			'class'=>'ui-state-default ui-corner-all',
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y') ));
	   ?>   
	</div>
            
        </fieldset>
        
        <a id="add_leave" style="padding: 2px; font-size: 12px; background: #71B1E0; color: #000; cursor: pointer;">Add More Leave Information</a>
        
        
        
        
        
        
        
        
        
        
        
        
        <fieldset id="srv_info" style="margin-top: 50px;">
            <legend>Service Informations</legend>
            
                
            <h3>1</h3>
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.join_date',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
                
                
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.name_of_post',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.name_of_cadre',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
        
            
            
	<div class="input"> 
      <?php 
	  
	  echo $this->Form->input('ServiceHistory.0.date_of_promotion', array(
			'class'=>'ui-state-default ui-corner-all',
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y') ));
	   ?>   
	</div>
        
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.nature_of_appointment',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
            
	
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.scale_of_pay',array('type'=>'text','class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.monthly_pay_date',array('class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
	
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.other_monthly_pay',array('type'=>'text','class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
	
    <div class="input"> 
      <?php echo $this->Form->input('ServiceHistory.0.remarks',array('type'=>'text','class'=>'ui-state-default ui-corner-all'));  ?>   
    </div>
        
            
            
        </fieldset>
        
        <a id="add_srv" style="padding: 2px; font-size: 12px; background: #71B1E0; color: #000; cursor: pointer;">Add More Service History</a>
        
        
        
        
        
        
        
        
        
        
        
	
    <div class="input" style="margin-top: 50px;"> 
      <?php echo $this->Form->input('remarks',array('class'=>'ui-state-default ui-corner-all'));  ?>   
	</div>
	
        
        
<?php echo $this->Form->end(__('Save', true));?>


</div>
	
    
    
	
    
</div> 

<div class="clear" style="height:300px;"></div>
    <div class="clear"></div>


    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#samepermanetnt").change(function(){
                if($('#samepermanetnt').is(':checked')){
                    var present = $("#EmployeePresentAddress").val();
                    var zilla = $("#EmployeePresentAddressZilla").val();
                    var upozilla = $("#EmployeePresentAddressUpozilla").val();
                    var pc = $("#EmployeePresentAddressPostCode").val();
                    $('#EmployeeParmanentAddress').val(present);
                    $('#EmployeeParmanentAddressZilla').val(zilla);
                    $('#EmployeeParmanentAddressUpozilla').val(upozilla);
                    $('#EmployeeParmanentAddressPostCode').val(pc);
                } 
                else{
                    $("#EmployeeParmanentAddress").val("");
                    $('#EmployeeParmanentAddressZilla').val("");
                    $('#EmployeeParmanentAddressUpozilla').val("");
                    $('#EmployeeParmanentAddressPostCode').val("");
                }
            });
            
            var inst_count = 0;
            
            $("#add_inst").click(function(){
                inst_count = inst_count+1;
                
                var inst_form = '\n\
                    <div id="inst_'+inst_count+'">\n\
                            <h3>'+(inst_count+1)+'</h3>\n\
                    <div class="input"> \n\
                      <div class="input text required"><label for="EducationalQualification'+inst_count+'NameOfDegree">Name Of Degree</label><input type="text" id="EducationalQualification'+inst_count+'NameOfDegree" maxlength="100" class="ui-state-default ui-corner-all" name="data[EducationalQualification]['+inst_count+'][name_of_degree]"></div>   \n\
                    </div>\n\
                    <div class="input"> \n\
                      <div class="input text required"><label for="EducationalQualification'+inst_count+'NameOfInstitution">Name Of Institution</label><input type="text" id="EducationalQualification'+inst_count+'NameOfInstitution" maxlength="100" class="ui-state-default ui-corner-all" name="data[EducationalQualification]['+inst_count+'][name_of_institution]"></div>   \n\
                    </div>\n\
                    <div class="input"> \n\
                      <div class="input text required"><label for="EducationalQualification'+inst_count+'Board">Board</label><input type="text" id="EducationalQualification'+inst_count+'Board" maxlength="50" class="ui-state-default ui-corner-all" name="data[EducationalQualification]['+inst_count+'][board]"></div>   \n\
                    </div> \n\
                    <div class="input"> \n\
                      <div class="input text required"><label for="EducationalQualification'+inst_count+'YearOfPassing">Year Of Passing</label><input type="text" id="EducationalQualification'+inst_count+'YearOfPassing" class="ui-state-default ui-corner-all" name="data[EducationalQualification]['+inst_count+'][year_of_passing]"></div>   \n\
                    </div>\n\
                    <div class="input"> \n\
                      <div class="input text required"><label for="EducationalQualification'+inst_count+'Country">Country</label><input type="text" id="EducationalQualification'+inst_count+'Country" maxlength="50" class="ui-state-default ui-corner-all" name="data[EducationalQualification]['+inst_count+'][country]"></div>   \n\
                    </div> \n\
                    <div class="input"> \n\
                      <div class="input text required"><label for="EducationalQualification'+inst_count+'Result">Result</label><input type="text" id="EducationalQualification'+inst_count+'Result" maxlength="10" class="ui-state-default ui-corner-all" name="data[EducationalQualification]['+inst_count+'][result]"></div>   \n\
                    </div>\n\
                     </div>\n\
                     ';
               $("#edu_info").append(inst_form); 
            });
            
            
            
            var leave_count = 0;
            
            $("#add_leave").click(function(){
                leave_count = leave_count+1;
                
                var leave_form = '<div id="leave_'+leave_count+'">\n\
                    \n\
                            <h3>'+(leave_count+1)+'</h3> <div class="input">\n\
                     <div class="input date"><label for="Leave'+leave_count+'LeaveStartMonth">Leave Start</label><select id="Leave'+leave_count+'LeaveStartMonth" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][leave_start][month]"> <option value="01">January</option> <option value="02">February</option> <option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option> <option value="08">August</option> <option value="09">September</option> <option  value="10">October</option> <option value="11">November</option> <option value="12">December</option> </select>-<select id="Leave'+leave_count+'LeaveStartDay" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][leave_start][day]"> <option value="01">1</option> <option value="02">2</option> <option value="03">3</option> <option value="04">4</option> <option value="05">5</option> <option value="06">6</option> <option value="07">7</option> <option value="08">8</option> <option value="09">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option  value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option> </select>-<select id="Leave'+leave_count+'LeaveStartYear" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][leave_start][year]"> <option value="2032">2032</option> <option value="2031">2031</option> <option value="2030">2030</option> <option value="2029">2029</option> <option value="2028">2028</option> <option value="2027">2027</option> <option value="2026">2026</option> <option value="2025">2025</option> <option value="2024">2024</option> <option value="2023">2023</option> <option value="2022">2022</option> <option value="2021">2021</option> <option value="2020">2020</option> <option value="2019">2019</option> <option value="2018">2018</option> <option value="2017">2017</option> <option value="2016">2016</option> <option value="2015">2015</option> <option value="2014">2014</option> <option value="2013">2013</option> <option  value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option> <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option> <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option> <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option> <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option> <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option> <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option> </select></div> </div> <div class="input"> <div class="input date"><label for="Leave'+leave_count+'LeaveEndMonth">Leave End</label><select id="Leave'+leave_count+'LeaveEndMonth" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][leave_end][month]"> <option value="01">January</option> <option value="02">February</option> <option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option> <option value="08">August</option> <option value="09">September</option> <option  value="10">October</option> <option value="11">November</option> <option value="12">December</option> </select>-<select id="Leave'+leave_count+'LeaveEndDay" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][leave_end][day]"> <option value="01">1</option> <option value="02">2</option> <option value="03">3</option> <option value="04">4</option> <option value="05">5</option> <option value="06">6</option> <option value="07">7</option> <option value="08">8</option> <option value="09">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option  value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option> </select>-<select id="Leave'+leave_count+'LeaveEndYear" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][leave_end][year]"> <option value="2032">2032</option> <option value="2031">2031</option> <option value="2030">2030</option> <option value="2029">2029</option> <option value="2028">2028</option> <option value="2027">2027</option> <option value="2026">2026</option> <option value="2025">2025</option> <option value="2024">2024</option> <option value="2023">2023</option> <option value="2022">2022</option> <option value="2021">2021</option> <option value="2020">2020</option> <option value="2019">2019</option> <option value="2018">2018</option> <option value="2017">2017</option> <option value="2016">2016</option> <option value="2015">2015</option> <option value="2014">2014</option> <option value="2013">2013</option> <option  value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option> <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option> <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option> <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option> <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option> <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option> <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option> </select></div> </div> <div class="input"> <div class="input text"><label for="Leave'+leave_count+'LeaveLengthDays">Leave Length Days</label><input type="text" id="Leave'+leave_count+'LeaveLengthDays" maxlength="7" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][leave_length_days]"></div> </div> <div class="input"> <div class="input text"><label for="Leave'+leave_count+'NatureOfLeave">Nature Of Leave</label><input type="text" id="Leave'+leave_count+'NatureOfLeave" maxlength="100" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][nature_of_leave]"></div> </div> <div class="input"> <div class="input text"><label for="Leave'+leave_count+'Grounds">Grounds</label><input type="text" id="Leave'+leave_count+'Grounds" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][grounds]"></div> </div> <div class="input"> <div class="input text"><label for="Leave'+leave_count+'SanctionOrderNumber">Sanction Order Number</label><input type="text" id="Leave'+leave_count+'SanctionOrderNumber" maxlength="11" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][sanction_order_number]"></div> </div> <div class="input"> <div class="input date"><label for="Leave'+leave_count+'SanctionOrderDateMonth">Sanction Order Date</label><select id="Leave'+leave_count+'SanctionOrderDateDay" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][sanction_order_date][day]"> <option value="01">1</option> <option value="02">2</option> <option value="03">3</option> <option value="04">4</option> <option value="05">5</option> <option value="06">6</option> <option value="07">7</option> <option value="08">8</option> <option value="09">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option  value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option> </select>-<select id="Leave'+leave_count+'SanctionOrderDateMonth" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][sanction_order_date][month]"> <option value="01">January</option> <option value="02">February</option> <option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option> <option value="08">August</option> <option value="09">September</option> <option  value="10">October</option> <option value="11">November</option> <option value="12">December</option> </select>-<select id="Leave'+leave_count+'SanctionOrderDateYear" class="ui-state-default ui-corner-all" name="data[Leave]['+leave_count+'][sanction_order_date][year]"> <option  value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option> <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option> <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option> <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option> <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option> <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option> <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option> <option value="1991">1991</option> <option value="1990">1990</option> <option value="1989">1989</option> <option value="1988">1988</option> <option value="1987">1987</option> <option value="1986">1986</option> <option value="1985">1985</option> <option value="1984">1984</option> <option value="1983">1983</option> <option value="1982">1982</option> <option value="1981">1981</option> <option value="1980">1980</option> <option value="1979">1979</option> <option value="1978">1978</option> <option value="1977">1977</option> <option value="1976">1976</option> <option value="1975">1975</option> <option value="1974">1974</option> <option value="1973">1973</option> <option value="1972">1972</option> <option value="1971">1971</option> <option value="1970">1970</option> <option value="1969">1969</option> <option value="1968">1968</option> <option value="1967">1967</option> <option value="1966">1966</option> <option value="1965">1965</option> <option value="1964">1964</option> <option value="1963">1963</option> <option value="1962">1962</option> <option value="1961">1961</option> <option value="1960">1960</option> <option value="1959">1959</option> <option value="1958">1958</option> <option value="1957">1957</option> <option value="1956">1956</option> <option value="1955">1955</option> <option value="1954">1954</option> <option value="1953">1953</option> <option value="1952">1952</option> <option value="1951">1951</option> <option value="1950">1950</option> <option value="1949">1949</option> <option value="1948">1948</option> <option value="1947">1947</option> <option value="1946">1946</option> <option value="1945">1945</option> <option value="1944">1944</option> <option value="1943">1943</option> <option value="1942">1942</option> </select></div> </div></div>';
               $("#leave_info").append(leave_form); 
            });
            
            
            
            var srv_count = 0;
            
            $("#add_srv").click(function(){
                srv_count = srv_count+1;
                
                var srv_form ='<div id="srv_'+srv_count+'"> <h3>'+(srv_count+1)+'</h3> <div class="input"> <div class="input date"><label for="ServiceHistory'+srv_count+'JoinDateMonth">Join Date</label><select id="ServiceHistory'+srv_count+'JoinDateMonth" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][join_date][month]"> <option value="01">January</option> <option value="02">February</option> <option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option> <option value="08">August</option> <option value="09">September</option> <option  value="10">October</option> <option value="11">November</option> <option value="12">December</option> </select>-<select id="ServiceHistory'+srv_count+'JoinDateDay" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][join_date][day]"> <option value="01">1</option> <option value="02">2</option> <option value="03">3</option> <option value="04">4</option> <option value="05">5</option> <option value="06">6</option> <option value="07">7</option> <option value="08">8</option> <option value="09">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option  value="29">29</option> <option value="30">30</option> <option value="31">31</option> </select>-<select id="ServiceHistory'+srv_count+'JoinDateYear" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][join_date][year]"> <option value="2032">2032</option> <option value="2031">2031</option> <option value="2030">2030</option> <option value="2029">2029</option> <option value="2028">2028</option> <option value="2027">2027</option> <option value="2026">2026</option> <option value="2025">2025</option> <option value="2024">2024</option> <option value="2023">2023</option> <option value="2022">2022</option> <option value="2021">2021</option> <option value="2020">2020</option> <option value="2019">2019</option> <option value="2018">2018</option> <option value="2017">2017</option> <option value="2016">2016</option> <option value="2015">2015</option> <option value="2014">2014</option> <option value="2013">2013</option> <option  value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option> <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option> <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option> <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option> <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option> <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option> <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option> </select></div> </div> <div class="input"> <div class="input text"><label for="ServiceHistory'+srv_count+'NameOfPost">Name Of Post</label><input type="text" id="ServiceHistory'+srv_count+'NameOfPost" maxlength="50" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][name_of_post]"></div> </div> <div class="input"> <div class="input text"><label for="ServiceHistory'+srv_count+'NameOfCadre">Name Of Cadre</label><input type="text" id="ServiceHistory'+srv_count+'NameOfCadre" maxlength="50" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][name_of_cadre]"></div> </div> <div class="input"> <div class="input date"><label for="ServiceHistory'+srv_count+'DateOfPromotionMonth">Date Of Promotion</label><select id="ServiceHistory'+srv_count+'DateOfPromotionDay" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][date_of_promotion][day]"> <option value="01">1</option> <option value="02">2</option> <option value="03">3</option> <option value="04">4</option> <option value="05">5</option> <option value="06">6</option> <option value="07">7</option> <option value="08">8</option> <option value="09">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option  value="29">29</option> <option value="30">30</option> <option value="31">31</option> </select>-<select id="ServiceHistory'+srv_count+'DateOfPromotionMonth" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][date_of_promotion][month]"> <option value="01">January</option> <option value="02">February</option> <option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option> <option value="08">August</option> <option value="09">September</option> <option  value="10">October</option> <option value="11">November</option> <option value="12">December</option> </select>-<select id="ServiceHistory'+srv_count+'DateOfPromotionYear" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][date_of_promotion][year]"> <option  value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option> <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option> <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option> <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option> <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option> <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option> <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option> <option value="1991">1991</option> <option value="1990">1990</option> <option value="1989">1989</option> <option value="1988">1988</option> <option value="1987">1987</option> <option value="1986">1986</option> <option value="1985">1985</option> <option value="1984">1984</option> <option value="1983">1983</option> <option value="1982">1982</option> <option value="1981">1981</option> <option value="1980">1980</option> <option value="1979">1979</option> <option value="1978">1978</option> <option value="1977">1977</option> <option value="1976">1976</option> <option value="1975">1975</option> <option value="1974">1974</option> <option value="1973">1973</option> <option value="1972">1972</option> <option value="1971">1971</option> <option value="1970">1970</option> <option value="1969">1969</option> <option value="1968">1968</option> <option value="1967">1967</option> <option value="1966">1966</option> <option value="1965">1965</option> <option value="1964">1964</option> <option value="1963">1963</option> <option value="1962">1962</option> <option value="1961">1961</option> <option value="1960">1960</option> <option value="1959">1959</option> <option value="1958">1958</option> <option value="1957">1957</option> <option value="1956">1956</option> <option value="1955">1955</option> <option value="1954">1954</option> <option value="1953">1953</option> <option value="1952">1952</option> <option value="1951">1951</option> <option value="1950">1950</option> <option value="1949">1949</option> <option value="1948">1948</option> <option value="1947">1947</option> <option value="1946">1946</option> <option value="1945">1945</option> <option value="1944">1944</option> <option value="1943">1943</option> <option value="1942">1942</option> </select></div> </div> <div class="input"> <div class="input text"><label for="ServiceHistory'+srv_count+'NatureOfAppointment">Nature Of Appointment</label><input type="text" id="ServiceHistory'+srv_count+'NatureOfAppointment" maxlength="50" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][nature_of_appointment]"></div> </div> <div class="input"> <div class="input text"><label for="ServiceHistory'+srv_count+'ScaleOfPay">Scale Of Pay</label><input type="text" id="ServiceHistory'+srv_count+'ScaleOfPay" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][scale_of_pay]"></div> </div> <div class="input"> <div class="input text"><label for="ServiceHistory'+srv_count+'MonthlyPayDate">Monthly Pay Date</label><input type="text" id="ServiceHistory'+srv_count+'MonthlyPayDate" maxlength="50" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][monthly_pay_date]"></div> </div> <div class="input"> <div class="input text"><label for="ServiceHistory'+srv_count+'OtherMonthlyPay">Other Monthly Pay</label><input type="text" id="ServiceHistory'+srv_count+'OtherMonthlyPay" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][other_monthly_pay]"></div> </div> <div class="input"> <div class="input text"><label for="ServiceHistory'+srv_count+'Remarks">Remarks</label><input type="text" id="ServiceHistory'+srv_count+'Remarks" class="ui-state-default ui-corner-all" name="data[ServiceHistory]['+srv_count+'][remarks]"></div> </div> </div>';
                    
                    
                    $("#srv_info").append(srv_form); 
            });
            
            
            
            
        });
    </script>
