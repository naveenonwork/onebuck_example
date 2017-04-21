<?php include_once("../header.php"); ?>
<?php
$dayly='';
$weekly='';
$monthly='';
$yearly='';
$inactive='';
$running='';
$close='';
$msg='';

if (isset($_POST['submit'])){
	
	$amount=$_POST['amount'];
	$priod=$_POST['priod'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	$installment_amount=$_POST['installment_amount'];
	$payment_frequency=$_POST['payment_frequency'];
	$status=$_POST['status'];
	$purpose=$_POST['purpose'];
	$loan_guaranteer=$_POST['loan_guaranteer'];
	$guaranteer_address=$_POST['guaranteer_address'];
	$guaranteer_no=$_POST['guaranteer_no'];


			
$query="insert into`loan_table`(`amount`,`priod`,`start_date`,`end_date`,`installment_amount`,`payment_frequency`,`status`,`purpose`,`loan_guaranteer`,`guaranteer_address`,
`guaranteer_no`)
	 values('$amount','$priod','$start_date','$end_date','$installment_amount','$payment_frequency','$status',
	 '$purpose','$loan_guaranteer','$guaranteer_address','$guaranteer_no')";

		if(mysqli_query($conn,$query)){
			
			$msg="<font color='#00FF00'>Record has been inserted</font>";
			
			}
		
		  else{
		   $msg="<u><font color='#FF0000'>Record has been not inserted</font></u>";
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

<?php echo $msg; ?>



<form method="post">
<h2 class="page-header" style="color:#060;margin:auto;"> Add New Documents <a class="btn btn-info pull-right" href="index.php">
<span class="glyphicon glyphicon-arrow-left"></span> Go Back</a></h2><br />
<div class="row">
<div class="col-sm-6">


<div class="form-group">
 <label for="amount">Amount:</label>
<input class="form-control" required="please input this fild" type="text" name="amount" value="" />
</div>
<div class="form-group">
 <label for="priod">Priod:</label>
 <input class="form-control"  required="please input this fild" type="text" name="priod" value="" />

 </div>
<div class="form-group">
 <label for="start_date">Start Date:</label>
 <input class="form-control" required="please input this fild" type="text" name="start_date" value="" />
</div>

<div class="form-group">
 <label for="end_date">End Date:</label>
<input class="form-control" required="please input this fild" type="text" name="end_date" value="" />
</div>
<div class="form-group">
<label for="installment_amount">Installment Amount:</label>
<input class="form-control" required="please input this fild" type="text" name="installment_amount" value="" />
</div>

<div class="form-group">
<label for="payment_frequency">payment Frequency:</label>
<select class="form-control" name="payment_frequency" required="please input this fild">
<option value=''>Select</option>
    <option <?php if($dayly=="dayly") { echo " selected='selected' " ;} ?>   value="dayly" >Dayly</option>
    <option <?php if($weekly=="weekly") { echo " selected='selected' " ;} ?>  value="weekly">Weekly</option>
    <option <?php if($monthly=="monthly") { echo " selected='selected' " ;} ?>  value="monthly">Monthly</option>
    <option <?php if($yearly=="yearly") { echo " selected='selected' " ;} ?>  value="yearly">Yearly</option>
</select>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">

<label for="status">Status:</label>
<select class="form-control" name="status" required="please input this fild">
<option value=''>Select</option>
    <option <?php if($inactive=="inactive") { echo " selected='selected' " ;} ?>   value="active">Inactive</option>
    <option <?php if($running=="running") { echo " selected='selected' " ;} ?>  value="deactive">Running</option>
    <option <?php if($close=="close") { echo " selected='selected' " ;} ?>  value="close">Close</option>

    </select>
    </div>
    
<div class="form-group">
<label for="purpose">Purpose:</label>
<textarea  class="form-control" rows="3"  type="text"  name="purpose" value="" required="please input this fild"></textarea>
</div>


<div class="form-group">
<label for="loan_guaranteer">Loan guaranteer:</label>
<input class="form-control"   type="text"  name="loan_guaranteer" value="" required="please input this fild"/>
</div>


<div class="form-group">
<label for="guaranteer_address">Guaranteer Address:</label>
<input  class="form-control"   type="text"  name="guaranteer_address" value="" required="please input this fild"/>
</div>


<div class="form-group">
<label for="guaranteer_no">Guaranteer No.:</label>
<input  class="form-control"   type="text"  name="guaranteer_no" value="" required="please input this fild"/>
</div>

<div class="form-group">

<input class="btn btn-info pull-right" type="submit" name="submit" value="Submit" />
</div>



</div>
</div>
</form>

</div>
<?php include_once("../footer.php"); ?>
</body>
</html>
