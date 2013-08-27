
			<h3>For Office Use Only</h3>
			
			<table width="800" border="1" align="center">
			
			  <tr>
			   <th>  <div align="center">Type of Leave</div></td>
				<th>
				  <div align="center">Entitled for the year</div></th>
				<th><strong>&nbsp;
				  </strong>
				  <div align="center">Enjoyed so far</div></th>
				<th><strong>&nbsp;
				  </strong>
				  <div align="center">Immediate Past Leave status</div></th>
				<th><strong>&nbsp;
				  </strong>
				  <div align="center">Present Balance</div></th>
				<th><strong>&nbsp;
				  </strong>
				  <div align="center">Applied for No. of Day</div></th>
				<th><strong>&nbsp;
				  </strong>
				  <div align="center">Remarks</div></th>
			  </tr>
			  <tr>
				<th>&nbsp;CL</th>
				<td><div align="center">15</div></th>
				<td><div align="center"><?php $CL = round($CL[0][0]['total_count']); if($CL) echo $CL; else echo 0;?></div></td>
				<td><div align="center"><?php if($CL_past) echo  'Date: '.$CL_past[0]['Leave']['leave_end'];else echo "-";?></div>
				     <div align="center"><?php if($CL_past) echo  'No. of Days: '.round($CL_past[0]['Leave']['leave_length_days']);else echo '';?></div></td>
				<td><div align="center"><?php echo $enj_CL=(15-$CL);?></div></td>
				<td><div align="center"><?php //print_r($CL_past);?> </div></td>
				<td><div align="center"><?php echo $leave_comments;?></div></td>
			  </tr>
			  <tr>
				<th>&nbsp;EL</td>
				<td><div align="center">30</div></th>
				<td><div align="center"><?php $EL = round($EL[0][0]['total_count']); if($EL) echo $EL; else echo 0;?></div></td>
				<td><div align="center"><?php if($EL_past) echo  'Date: '.$EL_past[0]['Leave']['leave_end'];else echo "-";?></div>
				     <div align="center"><?php if($EL_past) echo  'No. of Days: '.round($EL_past[0]['Leave']['leave_length_days']);else echo '';?></div></td>
				<td><div align="center"><?php echo $enj_EL=(30-$EL);?></div></td>
				<td><div align="center"><?php //print_r($CL_past);?> </div></td>
				<td><div align="center"><?php echo $leave_comments;?></div></td>
			  </tr>
			  <tr>
				<th>&nbsp;Others</td>
				<td><div align="center">--</div></td>
		         <td><div align="center"><?php $OT = round($OT[0][0]['total_count']); if($OT) echo $OT; else echo 0;?></div></td>
				<td><div align="center"><?php if($OT_past) echo  'Date: '.$OT_past[0]['Leave']['leave_end'];else echo "-";?></div>
				     <div align="center"><?php if($OT_past) echo  'No. of Days: '.round($OT_past[0]['Leave']['leave_length_days']);else echo '';?></div></td>
				<td><div align="center"><?php echo $enj_OT=(30-$OT);?></div></td>
				<td><div align="center"><?php //print_r($CL_past);?> </div></td>
				<td><div align="center"><?php echo $leave_comments;?></div></td>
			  </tr>
			</table>

