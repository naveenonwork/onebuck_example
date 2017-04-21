<?php include_once("../header.php"); ?>
<?php

$msg='';
$del='';
$form=true;


if(isset($_GET['delete_id'])){
 $del=$_GET["delete_id"];
	}
if(isset($_POST["delete"])){
$delete=$_POST["delete"];

 $query="delete  from `loan_table` where `loan_id`='$delete'";

if (mysqli_query($conn,$query)){
	
		$form=false;
	$msg= "<font color='#00FF00'>'Record has been deleted'</font>";
	
}
	
	
}
?>

 

    <!-- Main content -->
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

  <link rel="stylesheet" href="style.css">
<!--  <script src="http://localhost/test/bootstrap/js/jquery.min.js"></script>
  <script src="http://localhost/test/bootstrap/js/bootstrap.min.js"></script>-->
<title>index</title>
</head>

<body>
<?php echo $msg; ?>
<div class="container">

<a href="index.php" class="btn btn-info pull-right"><span class="glyphicon glyphicon-arrow-left"></span> </a>
 
 <div class="table-responsive">
 <table class="table table-striped table-bordered">
<thead>
	<tr>
   
    <th>Loan Id</th>
	<th>User Id</th>
	<th>Amount</th>
	<th>Priod</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th>Installment Amount</th>
	<th>payment Frequency</th>
	<th>Status</th>
	<th>Purpose</th>
    <th>Loan guaranteer</th>
    <th>Guaranteer Address</th>
    <th>Guaranteer No.</th>
	</tr>
<?php
$query="select * from `loan_table` where `loan_id`='$del'";	
$result=mysqli_query($conn,$query);

while ($records=mysqli_fetch_array($result)){
	$loan_id=$records["loan_id"];
	$user_id=$records["user_id"];
	$amount=$records["amount"];
	$priod=$records["priod"];
	$start_date=$records["start_date"];
	$end_date=$records["end_date"];
	$installment_amount=$records["installment_amount"];
	$payment_frequency=$records["payment_frequency"];
	$status=$records["status"];
	$purpose=$records["purpose"];
	$loan_guaranteer=$records["loan_guaranteer"];
	$guaranteer_address=$records["guaranteer_address"];
	$guaranteer_no=$records["guaranteer_no"];
?>
</thead>
<tbody>
<tr>

	<td><?php echo $loan_id; ?></td>
	<td><?php echo $user_id; ?></td>
	<td><?php echo $amount; ?></td>
	<td><?php echo $priod; ?></td>
    <td><?php echo $start_date; ?></td>
	<td><?php echo $end_date; ?></td>
	<td><?php echo $installment_amount; ?></td>
	<td><?php echo $payment_frequency; ?></td>
	<td><?php echo $status; ?></td>
	<td><?php echo $purpose; ?></td>
    
    <td><?php echo $loan_guaranteer; ?></td>
	<td><?php echo $guaranteer_address; ?></td>
	<td><?php echo $guaranteer_no; ?></td>
</tr>
</tbody>


</table>
</div>
 <table>
<tr>
<td>Are you sure to delete this record?</td>
<td>
<form method="post" action="delete.php"    >
<input type="submit" name="yes" action="index.php" value="yes"/>
<input type="hidden" name="delete" value="<?php echo $del; ?>" /> 
</form>
</td>
<td>
<form method="post" action="index.php">
<input type="submit" name="no" value="no" />
</form>
</td>
</tr>
</table>
</div>
<?php }?>


<?php include_once("../footer.php"); ?>
</body>
</html>
