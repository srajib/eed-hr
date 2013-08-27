<style>
.formBG {
    -moz-background-clip: border;
    -moz-background-origin: padding;
    -moz-background-size: auto auto;
    -moz-border-radius-bottomleft: 8px;
    -moz-border-radius-bottomright: 8px;
    -moz-border-radius-topleft: 8px;
    -moz-border-radius-topright: 8px;
    background-attachment: scroll;
    background-color: #F4F4F4;
    background-image: none;
    background-position: 0 0;
    background-repeat: repeat;
    margin-top: -5px;
    padding-bottom: 4px;
    padding-left: 0;
    padding-right: 0;
    padding-top: 4px;
    width: 1000px;
}

.formContainer {
    -moz-background-clip: border;
    -moz-background-origin: padding;
    -moz-background-size: auto auto;
    background-attachment: scroll;
    background-color: #E4E4E4;
    background-image: none;
    background-position: 0 0;
    background-repeat: repeat;
    line-height: 1.2;
    margin-bottom: 15px;
    margin-left: 0;
    margin-right: 0;
    margin-top: 5px;
    padding-bottom: 3px;
    padding-left: 3px;
    padding-right: 3px;
    padding-top: 3px;
    width: 969px;
}


.formContainer table.tableHeader th {
    -moz-background-clip: border;
    -moz-background-origin: padding;
    -moz-background-size: auto auto;
    background-attachment: scroll;
    background-color: transparent;
    background-image: url("<?php echo $this->base;?>/img/admin/dark-table-head.gif");
    background-position: left top;
    background-repeat: repeat-x;
    color: #42424C;
    font-size: 13px;
	font-weight:bold;
    padding-bottom: 21px;
    padding-left: 6px;
    padding-right: 6px;
    padding-top: 11px;
    text-shadow: 1px 1px 0 #FFFFFF;
}

</style>


<?Php if($logrecords){?>
<div class="formBG"> 			
								<div id="accountDetails">
									<h3>&nbsp;&nbsp;&nbsp;Login Records 
									</h3>
									<div class="formContainer" style="margin-left:10px;">
											<table width="970" class="tableHeader">
												<tr>
												<th width="104">First Name</th>
												<th width="115">Last Name</th>
												<th width="100">Email</th>
												<th width="88">Login Time</th>
												<th width="88">Logout Time</th>
												<th width="40">Duration</th>
												<th width="40">Status</th>
												<th width="280">Work Hour Status</th>
											    </tr>
								      </table>  
											<table class="grid" cellpadding="0" cellspacing="0" width="970" style="margin-top:-13px;">   
											
											<?php foreach ($logrecords as $logrecord): ?>
											<tr <?php if($logrecord['Time']['status']==1){?>style="background:#FFCDCD none repeat scroll 0 0;" <?php } ?>
												<td width="124">&nbsp;&nbsp;<?php echo $logrecord['Employee']['first_name'];?></td>
												<td width="115"><?php echo $logrecord['Employee']['last_name'];?></td>
												<td width="80" style="margin-left:-50px;"><?php echo $logrecord['Employee']['email'];?></td>
												<td width="100">&nbsp;&nbsp;<?php echo $logrecord['Time']['loginTime'];?></td>
												<td width="100">&nbsp;&nbsp;<?php echo $logrecord['Time']['logoutTime'];?></td>
												<td width="80"><?php echo $logrecord['Time']['duration'];?></td>
											  <td  width="80"><?php if($logrecord['Time']['status']==1) { echo $msg="&nbsp;&nbsp;<font color='red'><b>Late</b></font>"; echo $html->image('admin/bigAlert.gif', array('escape' => false,'align'=>'absmiddle', 'height'=>'20','width'=>'20','title'=>$logrecord['Time']['loginmessage'], 'alt'=>$logrecord['Time']['loginmessage'])); ?><?php } else  { echo $msg="OK";} ?></td>
											<td><?php if($logrecord['Time']['workhour_status']==1) { echo $msg="<font color='red'><b>Less average working hour<b></font>";}else{echo $msg="Ok";}?></td>
											</tr>
										   <?PHP endforeach; ?>
										</table>
									</div>
								</div>
		    </div>						
 <?php } else echo "<br><br><font color=red>There are no log records available for this Employee.</font><br><br><br><br><br><br>";?>