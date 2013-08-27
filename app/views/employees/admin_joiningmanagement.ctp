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
<script>
function Report(com_id)
{
	if(com_id)
		window.open('<?php echo $this->base; ?>/admin/employees/report/'+com_id,'','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	else alert('No Componenet Selected');

}
</script>
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
<div style="height:600px;width:5px;float:left;border-left:1px solid #71B1E0;margin-left:20px;">
<div style="margin: auto;height:900px;width:605px;float:left;margin-left:20px;">
<h2 align="center" style="width:600px;">Employee Report by Employee Name</h2>
<?php echo $this->Form->Create('Employee');?>
<p>&nbsp;</p>
 <fieldset><legend>Employee Info by Designation</legend>
<p>  
	<div class="input"> 
	   <?php echo $this->Form->label('Designation');  ?>   
	    <?php echo $this->Form->select('designation_id', $Designation,array('empty'=>false));?>   

     </div>
    


  <div  style="float:left;margin:10px;">
    <input type="submit" name="report" value="Staff Report" onClick="Report(EmployeeDesignationId.value);">
  </div>
  
  <?php //print_r($Report); 
  //if($Re)
  
  ?>
 <!-- 
  
<table width="859" border="0" bgcolor="#CCCCCC">
<caption>Staff List </caption>
  <tr>
    <th width="31" scope="col"><div align="center">ID</div></th>
    <th width="112" scope="col">Last_name</th>
    <th width="125" scope="col">First_name</th>
    <th width="163" scope="col">Parmanent_Address</th>
    <th width="107" scope="col">Nationality</th>
    <th colspan="3" scope="col">Contract_period</th>
  </tr>
  <tr>
    <th scope="row">1</th>
    <td width="56"><div align="center">
     
    </div></td>
    <td></td>
    <td></td>
    <td></td>
    <td width="168"></td>
    <td width="56"><div align="center">~ </div></td>
    <td width="179"></td>
  </tr>
  <tr>
    <th scope="row">1</th>
    <td width="56"><div align="center">
     
    </div></td>
    <td></td>
    <td></td>
    <td></td>
    <td width="168"></td>
    <td width="56"><div align="center">~ </div></td>
    <td width="179"></td>
  </tr>
  <tr>
    <th scope="row">1</th>
    <td width="56"><div align="center">
     
    </div></td>
    <td></td>
    <td></td>
    <td></td>
    <td width="168"></td>
    <td width="56"><div align="center">~ </div></td>
    <td width="179"></td>
  </tr>
</table>-->

	</fieldset> 
    </div>

	<div class="clear" style="height:100px;">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	
</div>
</div>