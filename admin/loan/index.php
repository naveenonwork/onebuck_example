<?php include_once("../header.php"); ?>


 

    <!-- Main content -->
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

  <link rel="stylesheet" href="style.css">

<title>index</title>
</head>

<body>
<div class="container">
 <div class="table-responsive">

<h2 class="page-header" style="color:#060;margin:auto;"> Loan Management System <a class="btn btn-info pull-right" href="add.php"><span class="glyphicon glyphicon-plus-sign"></span> Add  </a></h2>

<?php
$query="select * from `loan_table`";	
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
<div class="row">
<div class="col-sm-3">
 <a href="<?php echo $siteurl_loan?>/loan/edit.php?edit_id=<?php echo $loan_id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
 <a href="<?php echo $siteurl_loan?>/loan/delete.php?delete_id=<?php echo $loan_id;?>"><span class="glyphicon glyphicon-trash"></span></a>
<label for="ammount">Amount</label><?php echo $amount; ?>
<label for="period">Period</label><?php echo $priod; ?>
<label for="start_date">Start Date</label><?php echo $start_date; ?>
<label for="end_date">End Date</label><?php echo $end_date; ?>
<label for="installment_amount">Installment Amount</label><?php echo $installment_amount; ?>
<label for="payment_frequency">Payment Frequency</label><?php echo $payment_frequency; ?>
<label for="status">Status</label><?php echo $status; ?>
<label for="purpose">Purpose</label><?php echo $purpose; ?>
<label for="loan_guaranteer">Loan Guaranter</label><?php echo $loan_guaranteer; ?>
<label for="guaranteer_address">Guaranter Address</label><?php echo $guaranteer_address; ?>
<label for="guaranteer_no">Guaranter No.</label><?php echo $guaranteer_no; ?>
</div>
<?php } ?>

</div>
</div>
</div>

<script>
  $(function () {
    $("#example1").DataTable();
	    $("#table__").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php include_once("../footer.php"); ?>
</body>
</html>
