<?php 
include_once("../header.php"); 

$msg='';
$id='';
$edit_id='';
if(isset($_GET['edit_id'])){
$id=$_GET['edit_id'];
}


if (isset($_POST["submit"])){
$job_title=$_POST['job_title'];
$category=$_POST['category'];

$url=$_POST['url'];
$short_description=$_POST['short_description'];
$description=$_POST['description'];
$job_type=$_POST['job_type'];
$style=$_POST['style'];
 
$job_status=$_POST['job_status'];

$city=$_POST["city"];
$state=$_POST["state"];


$photo=$_POST["photo"];
 
 

$extstr='';
$ext='';

if($_FILES['photo']['name']!=''){
		
			$image=$_FILES['photo']['name'];
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$tmp_path=$_FILES['photo']['tmp_name'];
		 	$newpath="../../images/job/".$id.".".$ext;
			
			
			 if(!file_exists("../../images")){
		  
		   mkdir("../../images","707");
		
		 }// if
		 
		  if(!file_exists("../../images/job/")){
		  
		   mkdir("../../images/job/","707");
		
		 }// if
		 
		 move_uploaded_file($tmp_path,$newpath);
			
		 
		 
		 if(!file_exists("../../images/job/thumbnails")){
			
		  mkdir("../../images/job/thumbnails" ,"707");
		 }//
				if($ext==''){
					$image="../../images/job/no_image.png";
					$thumb_img="../../images/job/thumbnails/no_image.png";
				}else{
					$image= '../../images/job/' . $id ."." . $ext;
					 $thumb_img='../../images/job/thumbnails/' .$id. "." . $ext;
				}
				 
				 make_thumb($image,$thumb_img,100);
				 $extstr=",`photo`='$ext' ";
				 
		}

   $query="UPDATE `job` SET `job_title`='$job_title',`category`='$category',`url`='$url',`short_description`='$short_description',`description`='$description',`job_type`='$job_type',`style`='$style', 
`job_status`='$job_status',`city`='$city',
`state`='$state' $extstr WHERE `job_id`='$id'";

if (mysqli_query($conn,$query)){
$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
			  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i>Success!!</h4>
                Record has been updated.
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
                <h4><i class='icon fa fa-check'></i> Error!!</h4>
                Record could not be updated...
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";

}
}

?> 


<?php
$query="SELECT * FROM `job` where `job_id`='$id'";
$result=mysqli_query($conn,$query);
$records=mysqli_fetch_array($result);
$job_id=$records["job_id"];
$job_title=$records["job_title"];
$photo=$records["photo"];
$category=$records["category"];

$url=$records["url"];
$short_description=$records["short_description"];
$description=$records["description"];
$job_type=$records["job_type"];
$style=$records["style"];
$create_date=$records["create_date"];
$create_by=$records["create_by"];
$job_status=$records["job_status"];

$city=$records["city"];
$state=$records["state"];


$photo=$records["photo"];
?>
     

     <div class="container">      
         
     <form role="form" method="post" enctype="multipart/form-data">
     
     
      <div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>Job Update
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Update</button> 
<a class="btn btn-info pull-right" href="../index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>   
     
     <?php echo $msg ;  ?>
     
     <div class="row">

		 <div class="col-sm-6">
           <div class="box box-primary">
           
            <div class="box-body">
    <label for="">Photo</label>
    <?php $image= '../../images/job/thumbnails/' . $job_id ."." . $photo; ?>
    <img src="<?php if($photo==''){echo $image="../../images/job/thumbnails/no_image.png";}else{ echo $image; }?>"width=100 /><br/><br/>
          <input type="file" name="photo" value="browes" /> 
        <input type="hidden" id="photo" name="photo" value="<?php echo $job_id; ?>" />
      </div>
           
             
                
               <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Title</label>
                  <input type="text" class="form-control" required name="job_title" value="<?php echo $job_title  ?>">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                   
                   <?php
						 $_SESSION['cat_type']="job";
 							$categories= build_category_tree($conn,"", $category); ?>       
                       <select class="form-control " name="category">
                      <option value="0">Select category</option> 
                      <?php echo $categories ; ?>
                    </select>  
                </div>
                  
                 <div class="form-group">
                  <label for="exampleInputEmail1">Url</label>
                   <input type="text" class="form-control" required name="url" value="<?php echo $url  ?>">
                   </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Short Description</label>
                  <textarea type="text" class="form-control" required name="short_description" ><?php echo $short_description  ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea  type="text" class="form-control" required name="description" ><?php echo $description  ?></textarea>
                </div>
               
 
              </div><!--box-body-->
           </div> <!-- /box box-primary -->
           </div> <!--col-sm-->
           
           <div class="col-sm-6">
           <div class="box box-primary">
            <div class="box-body">
            
           <div class="form-group">
                <label for="user_type">Job Type</label>
                 <select class="form-control" name="job_type">
                 <option value="">select</option>
                 <option <?php if($job_id==$job_id){ ?> selected="selected" <?php }?> value=""><?php echo $job_type;  ?></option>
                 <option  value="full Time">full Time</option>
                  <option  value="intrensip">intrensip</option>
                <option  value="part Time">part Time</option>
                 </select> 
                  </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Style</label>
                 
                 <?php
						 $_SESSION['cat_type']="style";
 							$categories= build_category_tree($conn,"", $style); ?>       
                       <select class="form-control " name="style">
                      <option value="0">Select Style</option> 
                      <?php echo $categories ; ?>
                    </select>
                 
                   
                </div>
                 
                 
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Status</label>
                  
                       <select class="form-control" name="job_status">
                 <option value="">select</option>
                 <option   <?php if($job_status=="Pending") {?> selected="selected"  <?php } ?> value="Pending">Pending</option>
                  <option   <?php if($job_status=="Approve") {?> selected="selected"  <?php } ?> value="Approve">Approve</option>
                  <option   <?php if($job_status=="Reject") {?> selected="selected"  <?php } ?> value="Reject">Reject</option>
            
                 </select> 
                  
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" required name="city" value="<?php echo $city  ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  <input type="text" class="form-control" required name="state" value="<?php echo $state  ?>">
                </div>
           
</div><!--box-body-->
</div><!--box box-primary-->
</div><!--col-sm-->          
           
                  
  </div><!-- row form-->
        
           
         
     
            </form> 
       </div>   <!--< ccontainer">-->
         
 
<?php include_once("../footer.php"); ?>
