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
body{
font-family:arial;
font-size:11px;
}
</style>


<div class="actions" style="width:130px;float:left;margin-top:9px;">
<!--<ul>
 <li><?php echo $this->Html->link(__('Cancel', true), array('controller'=>'employees','action' => 'index')); ?></li>
 </ul>-->
</div>	
<div style="height:600px;width:5px;float:left;">
<div style="height:900px;width:605px;float:left;">
<h2 align="center" style="width:600px;"> Employee Report by Employee Name</h2>
<?php echo $this->Form->Create('Employee');?>


  <?php 
  if($Report)
  {
  ?>
  
<div class="Employees index" > 
<table width="600" border="0">


  <tr>
    <th width="31" scope="col"><div align="center">ID</div></th>
    <th width="112" scope="col">Last_name</th>
    <th width="125" scope="col">First_name</th>
    <th width="163" scope="col">Living Area</th>
    <th width="107" scope="col">Nationality</th>
    <th colspan="3" scope="col">Contract period</th>
  </tr>
  
  	<?php
	$i = 0;
	foreach ($Report as $Employee):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
  <tr<?php echo $class;?>>
    <th scope="row"><?php echo $i; ?></th>
    <td width="56"><div align="center">
     <?php echo $Employee['employees']['first_name'];?>
    </div></td>
    <td><?php echo $Employee['employees']['last_name'];?></td>
    <td><?php echo $Employee['employees']['living_area']; ?></td>
    <td><?php echo $Employee['employees']['nationality']; ?></td>
    <td width="168"><?php echo $Employee['employees']['join_date']; ?></td>
    <td width="56"><div align="center">~ </div></td>
    <td width="179"></td>
  </tr>
 <?php endforeach; ?>
</table>
</div>
<?php } ?>

	</fieldset> 
    </div>

	<div class="clear" style="height:100px;">&nbsp;</div>
    <div class="clear">&nbsp;</div>
	
</div>
</div>