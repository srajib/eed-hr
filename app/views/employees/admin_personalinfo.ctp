<?php 
$this->Html->addCrumb('Data', '/admin/loans'); 
$this->Html->addCrumb('Employees', ''); 
?>

<div class="actions" style="width:130px;float:left;margin-left:16px;margin-top:9px;">
<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'employees','action' => 'index')); ?></li>
 </ul>
</div>	



<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:900px;width:605px;float:left;margin-left:20px;">


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
  </script>
</head>
<body style="font-size:62.5%;">

<h2> Employee Info</h2>
	

	 
<div id="tabs">
    <ul>
        <li><a href="#fragment-1"><span>Personal Info</span></a></li>
        <li><a href="#fragment-2"><span>Contact Info</span></a></li>
		<li><a href="#fragment-3"><span>Academic Qualifications</span></a></li>
        <li><a href="#fragment-4"><span>Service Info.</span></a></li>
    </ul>
    <div id="fragment-1"  style="height:250px;">
	   
	   <div style="margin-left:50px;float:left;width:400px;"><h3> Personal Info</h3></div>
	
	  <div style="float:left;display:inline;">
      
	  <div class="input" style="padding:5px;"> 
      <?php echo '<b>Name: </b> '.$employees['Employee']['first_name'].' '.$employees['Employee']['last_name'];  ?>   
	  </div>
	  
	  <div class="input" style="padding:5px;"> 
      <?php echo '<b>Father Name: </b> '.$employees['Employee']['father_name'];  ?>   
	  </div>
	  
	  <div class="input" style="padding:5px;"> 
      <?php echo '<b>Mother Name: </b>'.$employees['Employee']['mother_name'];  ?>   
	  </div>
	
	  
	   <div class="input" style="padding:5px;"> 
      <?php echo '<b>Designation:</b>'.$employees['Designation']['designation'];  ?>   
	  </div>
	  
	  <div class="input" style="padding:5px;"> 
      <?php echo '<b>Date of birth: </b>'.date('d-M-Y',strtotime($employees['Employee']['date_of_birth']));  ?>   
	  </div>
       
       <div class="input" style="padding:5px;"> 
        <?php echo '<b>Gender: </b>'.$employees['Employee']['gender'];  ?>   
	  </div>
	  
	  <div class="input" style="padding:5px;"> 
	  <?php echo '<b>Blood Group: </b>'; if($employees['Employee']['blood_group']) {echo $employees['Employee']['blood_group']; } else echo "N/A"; ?>   
	   </div>
	   
	   <div class="input" style="padding:5px;"> 
        <?php echo '<b>Join Date: </b>';
		if($employees['Employee']['join_date'] && $employees['Employee']['join_date']!='0000-00-00' ){
		date('d-M-Y',strtotime($employees['Employee']['join_date']));} else echo 'N/A';  ?>   
	  </div>
	  
	  </div> 
	  
	   <div style="float:left;display:inline;margin-left:40px;">
	      <img name="" src="<?php echo $this->base;?>/img/employees/<?php echo $employees['Employee']['content'];?>" width="100" height="100" alt="" align="right"/>
	   </div>
	   
    
    </div>
    <div id="fragment-2">
	   <div style="margin-left:50px;float:left;width:600px;"><h3>Contact Info</h3></div>
      <div class="input" style="padding:5px;"> 
        <?php echo '<b>Nationality: </b>'.$employees['Employee']['nationality'];  ?>   
	  </div>
	
	<div class="input" style="padding:5px;"> 
	 <?php echo '<b>District: </b>'.$employees['Employee']['living_area'];  ?>   
	
	</div>
	
	<div class="input" style="padding:5px;"> 
	 <?php echo '<b>Area: </b>'.$employees['Employee']['prefecture'];  ?>   
	</div>
	
	<div class="input" style="padding:5px;"> 
	 <?php echo '<b>Present Address: </b>'.$employees['Employee']['present_address'];  ?>   
	</div>
	
    <div class="input" style="padding:5px;"> 
	 <?php echo '<b>Parmanent  Address: </b>'.$employees['Employee']['parmanent_address'];  ?>   
	</div>
    </div>
	
	<div id="fragment-3" style="height:auto;">
	
	  <div style="margin-left:50px;float:left;width:600px;"><h3>Educational Qualification</h3></div>

	<?php
        $i = 1 ;
          foreach ($employees['EducationalQualification'] as $edu_quals) {
              ?>
          <h5>#<?php echo $i; $i++; ?></h5>
              <div class="input" style="padding:5px;"> 
                   <?php echo '<b> Degree: </b>'.$edu_quals['name_of_degree'];  ?>   
                  </div>


              <div class="input" style="padding:5px;"> 
                   <?php echo '<b> Name of Institution: </b>'.$edu_quals['name_of_institution'];  ?>   
                  </div>

                  <div class="input" style="padding:5px;"> 
                   <?php echo '<b>Board: </b>'.$edu_quals['board'];  ?>   
                  </div>
                  <div class="input" style="padding:5px;"> 
                   <?php echo '<b>Country: </b>'.$edu_quals['country'];  ?>   
                  </div>
                  <div class="input" style="padding:5px;"> 
                   <?php echo '<b>Passing Year: </b>'.$edu_quals['year_of_passing'];  ?>   
                  </div>
                    
                  <div class="input" style="padding:5px;"> 
                   <?php echo '<b>Result: </b>'.$edu_quals['result'];  ?>   
                  </div>
                    <?php
          }
            
        ?>

	
	</div>
	
	
    <div id="fragment-4" style="height:350px;">
	 
        <div style="margin-left:50px;float:left;width:600px;"><h3>Service Information</h3></div>
	
	<div style="float:left;">
	
	<div style="float:left;display:inline;'">
       <div class="input" style="padding:5px;"> 
        <?php echo '<b> Present Post: </b>'.$employees['Employee']['present_post'];  ?>   
       </div>
       <div class="input" style="padding:5px;"> 
        <?php echo '<b>Present Posting Place: </b>'.$employees['Employee']['present_posting_place'];  ?>   
       </div>

       <div class="input" style="padding:5px;"> 
        <?php echo '<b>Join Date in Present Post: </b>'.date("d-m-Y",strtotime($employees['Employee']['join_date_in_present_post']));  ?>   
       </div>
       <div class="input" style="padding:5px;"> 
        <?php echo '<b>Pay Scale: </b>'.$employees['Employee']['pay_scale'];  ?>   
       </div>
       <div class="input" style="padding:5px;"> 
        <?php echo '<b>Basic Pay: </b>'.$employees['Employee']['basic_pay'];  ?>   
       </div>
	
            
            
        <div style="margin-left:50px;float:left;width:600px;"><h3>Service History</h3></div>
	<?php        
        $i = 1 ;
          foreach ($employees['ServiceHistory'] as $sh) {
              ?>
          <h5>#<?php echo $i; $i++; ?></h5>
              <div class="input" style="padding:5px;"> 
                <?php echo '<b> Join Date: </b>'.$sh['join_date'];  ?>   
               </div>
               <div class="input" style="padding:5px;"> 
                <?php echo '<b> Name of Post: </b>'.$sh['name_of_post'];  ?>   
               </div>

               <div class="input" style="padding:5px;"> 
                <?php echo '<b> Name of Cadre: </b>'.$sh['name_of_cadre'];  ?>   
               </div>
               <div class="input" style="padding:5px;"> 
                <?php echo '<b>Date of Promotion: </b>'.date('m-Y',strtotime($sh['date_of_promotion']));  ?>   
               </div>
               <div class="input" style="padding:5px;"> 
                <?php echo '<b>Nature of Appoinment: </b>'.$sh['nature_of_appoinment'];  ?>   
               </div>

               <div class="input" style="padding:5px;"> 
                <?php echo '<b>Scale of Pay: </b>'.$sh['scale_of_pay'];  ?>   
               </div>
               <div class="input" style="padding:5px;"> 
                <?php echo '<b>Monthly Pay Date: </b>'.$sh['monthly_pay_date'];  ?>   
               </div>
               <div class="input" style="padding:5px;"> 
                <?php echo '<b>Monthly Pay: </b>'.$sh['monthly_pay'];  ?>   
               </div>

               <div class="input" style="padding:5px;"> 
                <?php echo '<b>Other Monthly Pay: </b>'.$sh['other_monthly_pay'];  ?>   
               </div>
                 <?php
          }
            
        ?>
		
	
	</div>
	
	
       </div>
    </div>
</div>
     
	
</div>
</div>
 </div>
