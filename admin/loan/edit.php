<?php include_once("../header.php"); ?>
<?php

$dayly='';
$weekly='';
$monthly='';
$yearly='';
$active='';
$deactive='';
$msg='';
$id='';
if(isset($_GET['edit_id'])){
 $id=$_GET["edit_id"];
	}
if (isset($_POST['submit'])){	
	

	$loan_id=$_POST["loan_id"];
	$user_id=$_POST["user_id"];
	$amount=$_POST["amount"];
	$priod=$_POST["priod"];
	$start_date=$_POST["start_date"];
	$end_date=$_POST["end_date"];
	$installment_amount=$_POST["installment_amount"];
	$payment_frequency=$_POST["payment_frequency"];
	$status=$_POST["status"];
	$purpose=$_POST["purpose"];	
	$loan_guaranteer=$_POST["loan_guaranteer"];
	$guaranteer_address=$_POST["guaranteer_address"];
	$guaranteer_no=$_POST["guaranteer_no"];
		
		
	   $query=" UPDATE `loan_table`SET`loan_id`='$loan_id',`user_id`='$user_id',`amount`='$amount',`priod`='$priod',`start_date`='$start_date',`end_date`='$end_date',
	   `installment_amount`='$installment_amount',`payment_frequency`='$payment_frequency',`status`='$status',`purpose`='$purpose',`loan_guaranteer`='$loan_guaranteer',`guaranteer_address`
	   ='$guaranteer_address',`guaranteer_no`='$guaranteer_no'
	    where `loan_id`='$id'";
	
	if (mysqli_query($conn,$query))
	{
		$msg="<font color='#00FF00'>Record has been updated</font>";
		
		
	 } else {
		 $msg="<u><font color='#FF0000'>Record has been not updated</font></u>";
				
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

<div class="container">

<h2 class="page-header" style="color:#060;margin:auto;">Edit Documents<a class="btn btn-info pull-right" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span></a></h2><br />
<?php echo $msg; ?>

<?php

$query="select * from `loan_table` where `loan_id`='$id' ";
$result=mysqli_query($conn,$query);
while($records=mysqli_fetch_array($result)){
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

<form class="form-group" method="post" enctype="multipart/formdata">
<div class="row">
<div class="col-sm-6">

<div class="form-group">
 <label for="loan_id">Loan Id:</label>
<input class="form-control" type="text" name="loan_id" readonly="readonly" value="<?php echo $loan_id ?>" />
</div>

<div class="form-group">
 <label for="user_id">User Id:</label>
<input class="form-control" type="text" readonly="readonly" name="user_id" value="<?php echo $user_id ?>" />
</div>

<div class="form-group">
 <label for="amount">Amount:</label>
<input class="form-control" type="text" name="amount" value="<?php echo $amount ?>" />
</div>


<div class="form-group">
 <label for="priod">priod:</label>
<input class="form-control" type="text" name="priod" value="<?php echo $priod ?>" />
</div>

<div class="form-group">
 <label for="start_date">Start Date:</label>
<input class="form-control" type="text" name="start_date" value="<?php echo $start_date ?>" />
</div>

<div class="form-group">
 <label for="end_date">End Date:</label>
<input class="form-control" type="text" name="end_date" value="<?php echo $end_date ?>" />
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
 <label for="installment_amount">Installment Amount:</label>
<input class="form-control" type="text" name="installment_amount" value="<?php echo $installment_amount ?>" />
</div>


<div class="form-group">
 <label for="payment_frequency">payment Frequency:</label>
<select class="form-control" name="payment_frequency">
<option value=''>Choose Payment Frequency</option>
    <option <?php if($dayly=='dayly') { echo " selected='selected' " ;} ?>   value='dayly'>Dayly</option>
    <option <?php if($weekly=='weekly') { echo " selected='selected' " ;} ?>  value='weekly'>Weekly</option>
    <option <?php if($monthly=='monthly') { echo " selected='selected' " ;} ?>  value='monthly'>Monthly</option>
    <option <?php if($yearly=='yearly') { echo " selected='selected' " ;} ?>  value='yearly'>Yearly</option>
</select>
</div>

<div class="form-group">
 <label for="status">Status:</label>
<select class="form-control" name="status">
<option value=''>Choose A Statua</option>
    <option <?php if($active=='active') { echo " selected='selected' " ;} ?>   value='active'>Active</option>
    <option <?php if($deactive=='deactive') { echo " selected='selected' " ;} ?>  value='deactive'>Deactive</option>
    </select>
    </div>

<div class="form-group">
 <label for="purpose">Purpose:</label>
<textarea class="form-control" type="text" name="purpose" value="<?php echo $purpose ?>" ></textarea>
</div>

<div class="form-group">
 <label for="loan_guaranteer">Loan guaranteer:</label>
<input class="form-control" type="text" name="loan_guaranteer" value="<?php echo $loan_guaranteer ?>" />
</div>


<div class="form-group">
 <label for="guaranteer_address">guaranteer Address:</label>
<input class="form-control" type="text" name="guaranteer_address" value="<?php echo $guaranteer_address ?>" />
</div>


<div class="form-group">
 <label for="guaranteer_no">Guaranteer No.:</label>
<input class="form-control" type="text" name="guaranteer_no" value="<?php echo $guaranteer_no ?>" />
</div>

<input class="btn btn-info pull-right" type="submit"name="submit" value="Update" />


</div>
</div>
</form>
<?php  } ?>


</div>
<?php include_once("../footer.php"); ?>
</body>
</html>
