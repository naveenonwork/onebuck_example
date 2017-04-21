<?php
 include_once("../header.php");
$err='';
$errmsg='';
$msg='';

if (isset($_POST['submit'])){
 $update=true;
 
$UserID=$_POST['UserID'];
$Password=$_POST['pwd'];
$confirm=$_POST['confirm'];
$Email=$_POST['Email'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$Address=$_POST['Address'];
$ZipCode=$_POST['ZipCode'];
$State=$_POST['State'];
$Phone=$_POST['Phone'];

if($Password!=$confirm){
	$update=false;
	$msg="<font color='red'>Password and confirm password does not match.</font>";
}
if(isUserExisted($UserID,"")){
	$update=false;
	$msg="<font color='red'>This userid already taken ,try another</font>";
}

if(isEmailExisted($Email,"")){
	$update=false;
	$msg="<font color='red'>This email already exsts ,try another</font>";
}

if($Password!=""){
		$update=true;
		$hash=hashSSHA($Password)	;
		$Salt= $hash['salt'];
		$Password=$hash['encrypted'];
			//get hash of password
}



if($update){
$query="insert into `example_users`(`Salt`,`UserID`,`Password`,`Email`,`FirstName`,`LastName`,`Address`,`ZipCode`,`State`,`Phone`) values ('$Salt','$UserID','$Password','$Email','$FirstName','$LastName','$Address','$ZipCode','$State','$Phone')";
		
		if ($conn->multi_query($query)===TRUE){
		$msg="<div class='alert alert-success' color='green'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Records has been inserted</strong></div>";
	}else{
	$errmsg="<div class='alert alert-warning' color='red'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Records could not be inserted</strong></div>";
	}
	}	
}
?>





<div class="container">

<form method="post" role="form">


<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>User Manager
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>

<br/>
<?php echo $msg; ?>
<?php echo $errmsg; ?>
 
   <div class="box box-primary">
            <div class="box-body">

<div class="form-group">
<label for="UserID">UserID</label>
<input type="text" class="form-control" required name="UserID" value=""  />
</div>

<div class="form-group">
<label for="Password">Password</label>
<input type="password" class="form-control" required  name="pwd" value=""  /></div>
<div class="form-group">
<label for="Password">Confirm Password</label>
<input type="password" class="form-control" required name="confirm" value=""  /></div>

<div class="form-group">
<label for="Email">Email</label>
<input type="text" class="form-control" required name="Email" value=""  />
</div>

<div class="form-group">
<label for="FirstName">First Name</label>
<input type="text" class="form-control" required name="FirstName" value=""  />
</div>

<div class="form-group">
<label for="LastName">Last Name</label>
<input type="text" class="form-control" required name="LastName" value=""  />
</div>

<div class="form-group">
<label for="Address">Address</label>
<textarea  cols="3" class="form-control"   name="Address"    ></textarea>
</div>

<div class="form-group">
<label for="ZipCode">ZipCode</label>
<input type="text" class="form-control"   name="ZipCode" value=""  />
</div>

<div class="form-group">
<label for="State">State</label>
<input type="text" class="form-control" name="State" value=""  />
</div>

<div class="form-group">
<label for="Phone">Phone</label>
<input type="text" class="form-control" required name="Phone"  value="" />
</div>



<div class="form-group">
<label for="Phone">User Level</label>
<select class="form-control" name="user_level">
		<option value="0">Member</option>
        <option value="5">Admin</option>
</select>
</div>



</div>
</div>
 


</form>
</div>
 
<?php include_once("../footer.php"); ?>
