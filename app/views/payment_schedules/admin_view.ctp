<?php 
$this->Html->addCrumb('Fund Management ', '/admin/funds'); 
$this->Html->addCrumb('Fund Expenditure', '/admin/fund_expenditures'); 
$this->Html->addCrumb('View ', ''); 
?>

<div class="Loan index" style="border: none; float:left;margin:auto; width:600px;padding: 0">

<?php 
/*echo "<pre>";
 print_r($FundExpenditure);
 echo "</pre>";*/
?>
<h2> Fund Expenditures Detail </h2>

<table width="120%">

<tr>
<th nowrap="nowrap"> Credit No:</th>
<td><?php echo $FundExpenditure[0]['FundExpenditure']['creditno']?></td>
</tr>
<tr>
<th nowrap="nowrap"> Name of the month :</th>
<td><?php echo $FundExpenditure[0]['FundExpenditure']['name_of_month']?></td>
</tr>

<tr>
<th nowrap="nowrap">Withdrawal App Number:</th>
<td><?php echo $FundExpenditure[0]['FundExpenditure']['withdrawl_app_number']?></td>
</tr>

<tr>
<th nowrap="nowrap">Category Name :</th>
<td><?php echo $FundExpenditure[0]['ExpenditureCategory']['category_name'];?></td>
</tr>

<tr>
<th nowrap="nowrap">Payment Type:</th>
<td><?php echo $FundExpenditure[0]['FundExpenditure']['payment_type']?></td>
</tr>

<tr>
<th nowrap="nowrap">Remarks:</th>
<td><?php echo $FundExpenditure[0]['FundExpenditure']['remarks']?></td>
</tr>

	

</table>
</div>

