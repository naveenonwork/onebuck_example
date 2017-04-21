<?php 


 include_once("../header.php"); 





$msg='';
$errmsg='';
$iserror=false;




if (isset($_POST["submit"])){

$old_url=$_POST['old_url'];

$new_url=$_POST['new_url'];


$query="INSERT INTO `url_manager`(`old_url`,`new_url`) VALUES ('$old_url','$new_url')";

if (mysqli_query($conn,$query)){


$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>			 
              <div class='alert alert-success alert-dismissible'>
			   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i>Success!!</h4>
                Record has been saved.
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";

}else{
$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-danger alert-dismissible'>
			  	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i>Error!!</h4>
                Record could not be saved...
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";
}

}

?>


     

                     


           
            <form role="form" method="post">
            
            <div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2> Add Url Manager
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>
 
 
 
 <?php echo $msg   ?>

 
 
 
 
<div class="box box-primary">
     <div class="box-body">
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Url</label>
                  <input type="text" class="form-control" required name="old_url" value="">
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">New Url</label>
                  <input type="text" class="form-control" name="new_url" value="">
                </div>
               
            
                
              </div>
              <!-- /.box-body -->

</div>
              </div>  
                 
            </form>
            
        
          
 
<?php include_once("../footer.php"); ?>
