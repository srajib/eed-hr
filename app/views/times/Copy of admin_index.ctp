<style>
.formErrorContainer {-moz-background-clip:border;-moz-background-inline-policy:continuous;-moz-background-origin:padding;background:#FFCDCD none repeat scroll 0 0;line-height:1.2;margin:5px 0 15px;padding:6px;} 
.formErrorContainer label {float:left;font-size:11px;padding:7px 0 0;}
.formErrorContainer span {float:right;font-size:11px;margin-top:-20px;padding-left:2px;}

input{
 width:auto;border:none;
}

</style>
<script type="text/javascript">

function checkNewsletterRegistration(){
	   
		document.getElementById('TimeLoginmessage').style.display   = '';
		document.getElementById('messageError').style.display    = 'none';
		document.getElementById('failure').style.display    = 'none';
		
		var re = /^[a-zA-Z0-9\s]+_[a-zA-Z0-9_]+$/i;
		var re1 = /^[a-zA-Z0-9\s]+$/i;
		var listErroMessage = "";
		var flag = false;
	
		if((document.getElementById('TimeLoginmessage').value)==''){
			document.getElementById('messageError').style.display = 'inline';
			document.getElementById('F3').className = 'formErrorContainer';
			listErroMessage = "Please enter the reason of your late.<br/>";
			flag = true;
		}else{
			document.getElementById('F3').className = 'formContainer';
		}
		
		
		if(flag){
			document.getElementById('failure').style.display    = 'block';
			document.getElementById('dynamicMessage').innerHTML  = listErroMessage;
			window.location.hash = "#leftcol";
			return false;
		}
		return true;
		
}
</script>
		<?php if($tdayflag==0){ ?>
					<div id="leftcol">
		 			<div class="clear"></div>
		 			<div id="failure" style="margin-bottom: 10px;width:750px;display:none;">			
					<h3>Fill up the form with appropriate data</h3>
					<p class="light" id="dynamicMessage"></p>
					</div>	
					<div class="clear"></div>
					<?php 	echo $form->create('Time', array('url' => array('controller'=>'times','action'=>'admin_index')));
					?>	
			
									<div class="formBGCSS" style="margin-top: 5px;">
										<div class="formWrapper">	
										<div class="formContainer" id="F1">	
										<div class="clearfix" style="height:20px;">	
												<div style="width: 150px;float:left;"><b>Current Date :</b></div>
												<div style="width: 150px;float:left;"><?php echo $currentdate;?></div>
										</div>
										</div>
										</div>
										<div class="formWrapper">	
										<div class="formContainer" id="F2">	
										<div class="clearfix" style="height:90px;">	
												<div style="width: 150px;float:left;"><b>Current time :</b></div>
												<div style="width: 350px;float:left;"><script src="http://24timezones.com/js/swfobject.js" language="javascript"></script>
												<script src="http://24timezones.com/timescript/maindata.js.php?city=236156" language="javascript"></script>
												<table><tr><td><div id="flash_container_tt4c2c5f8c44c14"></div><script type="text/javascript">
												 var flashMap = new SWFObject("http://24timezones.com/timescript/clock_digit_12.swf", "main", "120", "60", "7.0.22", "#FFFFFF", true)
												 flashMap.addParam("movie",      "http://24timezones.com/timescript/clock_digit_12.swf");
												 flashMap.addParam("quality",    "high");
												 flashMap.addParam("wmode",      "transparent");
												 flashMap.addParam("flashvars",  "color=0099FF&logo=1&city=236156");
												 flashMap.write("flash_container_tt4c2c5f8c44c14");
												</script></td></tr><tr><td style="text-align: center; font-weight: bold"><a href="http://24timezones.com/world_directory/dhaka_local_time.php" target="_blank" title=" Dhaka" style="text-decoration: none">Dhaka</a></td></tr></table>
												</div>
												<br>
										</div>
										</div>
										</div>
											<?php //echo $timeflag;
											if($timeflag==1 || $timeflag==2 ){ ?>
											<div class="formWrapper">	
											<div class="formContainer" id="F3">	
											<div class="clearfix">	
											<div style="font-weight:bold;">Message :</div>	
											<div style="margin-left:150px;">
											<?php echo $form->textarea('loginmessage',array('cols'=>"50",'rows'=>"8"));?> 
											<span id="messageError" style="width:200px;float:left;font-size:11px;display:none; color:red;">Please enter the reason of your late.</span>
										 	</div>
											</div>
											</div>
											</div>
											<?php } else {}?>
							<br>
							<input id="submitButton" tabindex="6"  src="<?php echo $this->base;?>/img/admin/login.png"  border="0" value="Login" class="greybutton" type="image" height="40" width="85" onclick="javascript: return checkNewsletterRegistration();">
							<?php echo $form->end();?>
							<?php }	?>
							
						<?Php if($logrecords){?>					
						<?php  if($logoutflag==1){ ?>
						<?php echo $form->create('Times',array('controller'=>'Times','action'=>'admin_savelogout'));?>	 
						<?php echo $form->hidden( 'Time.id', array( 'value' => $logrecords[0]['Time']['id'] ) );?>
						<?php echo $form->submit('/img/admin/logout.png');?>
						<?php echo $form->end(); echo "<br><br>"; } } ?>
						
						<br>
						<?Php if($logrecords){?>
						<div class="formBG" style="width:930px;"> 			
								<div id="accountDetails" style="margin-left:10px;">
									<h3><?php echo $user['User']['username']."'s";?> Login Records 
									</h3>
									<div class="formContainer" style="width:900px;">
												<table class="tableHeader" width="100%">
												<tr>
												<th style="width: 400px;">Date</th>
												<th style="width: 450px;">Login </th>
												<th style="width: 450px;">Logout Time</th>
												<th style="width: 400px;">Duration</th>
												<th style="width: 400px;">Status</th>
												<th style="width: 400px;">Work Hour Status</th>
											    </tr>
											    </table>  
											<table class="grid" cellpadding="0" cellspacing="0" width="100%" style="margin-top:-13px;">   
											<?php foreach ($logrecords as $logrecord): ?>
											<tr <?php if($logrecord['Time']['status']==1) { ?> style="background:#FFCDCD none repeat scroll 0 0;height:10px;" <?php } ?>>
												<td><?php echo $logrecord['Time']['loginDate'];?></td>
												<td><?php echo $logrecord['Time']['loginTime'];?></td>
												<td><?php echo $logrecord['Time']['logoutTime'];?></td>
												<td><?php echo $logrecord['Time']['duration'];?></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($logrecord['Time']['status']==1) { echo $msg="&nbsp;&nbsp;<font color='red'><b>Late</b></font>"; echo $html->image('admin/bigAlert.gif', array('escape' => false,'align'=>'absmiddle', 'height'=>'20','width'=>'20','title'=>$logrecord['Time']['loginmessage'], 'alt'=>$logrecord['Time']['loginmessage'])); ?><?php } else  { echo $msg="OK";} ?></td>
												<td><?php if($logrecord['Time']['workhour_status']==1) { echo $msg="<font color='red'><b>Less average working hour<b></font> ";}else{echo $msg="Ok";}?></td>
											</tr>
										   <?PHP endforeach; ?>
										</table>
									</div>
								</div>
								<?php   if(!empty($average_work_hour)){?>
								<div id="accountDetails" style="margin-left:10px;">
									<h3> Average Work Hours (This Month)
									</h3>
									<div class="formContainer" style="width:300px;">
												<table class="tableHeader" width="100%">
												<tr>
												<th style="width: 400px;">Average Work Hour</th>
												<th style="width: 400px;">No .of day</th>
											    </tr>
											    </table>  
											<table class="grid" cellpadding="0" cellspacing="0" width="100%" style="margin-top:-13px;">   
											<?php //foreach ($logrecords as $logrecord): ?>
												<td>&nbsp;&nbsp;&nbsp;<?php if(!empty($average_work_hour)) {echo $average_work_hour;} else {}?></td>
												<td>&nbsp;&nbsp;&nbsp;<?php if(!empty($no_of_day) ){echo $no_of_day;}?></td>
											</tr>
										   <?PHP //endforeach; ?>
										</table>
									</div>
								</div><?php } ?>
		    			</div>						
 						<?php } ?>
 						<br>
					
				