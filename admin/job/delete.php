<?php 
include_once("../header.php");

$msg='';
$id='';
$delete='';

if (isset($_GET["dlt_id"])){
$id=$_GET["dlt_id"];
}
if(isset($_POST["delete"])){
$delete=$_POST["delete"];

$query="delete  from `job` where `job_id`='$id'";

if (mysqli_query($conn,$query)){
		
	$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i>Success!!</h4>
                Record has been deleted successfully.
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";
	}

	else{
	$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i>Error!!</h4>
                Record could not be deleted.
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";

	}

}

?>
<title>delete</title>
  <section class="content-header">
        <div class="box-header">
         <a class="btn btn-info pull-right" href="<?php echo $siteurl_blog; ?>admin/index.php">
         <span class="glyphicon glyphicon-arrow-left"></span> Go Back</span></a> 
        </div>

  </section>
 

<div class="col-md-12">
                          <div class="box box-default">
                   <p style="font-size:20px; color:#990000;"> <?php echo $msg; ?></p>
                        
                        <?php if(empty($delete)) {?>
                            <div class="box-body">
                              <div class="alert alert-danger alert-dismissible">
                                <h4><i class="icon fa fa-warning"></i> Confirm your action</h4>
                                Are you sure you want to delete ???
                              </div>
                              
                            </div>
                            <!-- /.box-body -->
							<div class="row">
               <div class="col-md-6">
               <form method="post">
                <button class="btn btn-danger margin pull-right" type="submit" name="yes" ><span class="fa fa-check"></span> Confirm</button>
                <input type="hidden" name="delete" value="<?php echo $id; ?>" />
                 </form>
              </div>
             <div class="col-md-6">
               <form method="post" action="../index.php">
                   <button class="btn btn-primary margin" type="submit"><span class="fa fa-remove"></span> Cancel</button>
                   </form>
                            </div>
                            </div><!--form row-->
                            <?php } ?>
          </div> <!-- /.box -->
        </div><!-- /.col -->

 
<?php include_once("../footer.php"); ?>
