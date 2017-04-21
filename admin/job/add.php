<?php 
include_once("../header.php"); 
set_time_limit ( 0 );
ini_set ('gd.jpeg_ignore_warning', 1);

$msg='';
$errmsg='';
$iserror=false;

if (isset($_POST["submit"])){
$job_title=$_POST['job_title'];
$category=$_POST['category'];

$url=$_POST['url'];
$short_description=$_POST['short_description'];
$description=$_POST['description'];
$job_type=$_POST['job_type'];
$style=$_POST['style'];
$create_date=date('Y-m-d');
$create_by=$_SESSION['admin_userid'];
$job_status=$_POST['job_status'];

$city=$_POST["city"];
$state=$_POST["state"];

if(!$iserror){
$image='';
$ext='';
if($_FILES['photo']['name']!=''){
			 $image=$_FILES['photo']['name'];
			
			$ext = pathinfo($image, PATHINFO_EXTENSION);
		}

 $query="INSERT INTO `job`(`job_title`,`photo`,`category`,`url`,`short_description`,`description`,`job_type`,`style`,`create_date`,
`create_by`,`job_status`,`city`,`state`) VALUES ('$job_title','$ext','$category','$url','$short_description','$description','$job_type','$style','$create_date',
'$create_by','$job_status','$city','$state')";

if (mysqli_query($conn,$query)){

$id=mysqli_insert_id($conn);


//var_dump($id);
	if($_FILES['photo']['name']!=''){
		 
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
              <div class='alert alert-success alert-dismissible'>
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
}
?>

<div class="container">
 
      <form role="form" method="post" enctype="multipart/form-data">
      


<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>Job Add
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button> 

<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>     
    <div class="row">
     
<?php echo $msg   ?>


<div class="col-sm-6">
  <div class="box box-primary">  
     <div class="box-body">
     
   <label for="">Photo:</label>
       <img src="../../images/job/no_image.png" width=100  /><br/><br/>
      <input type="file" name="photo" value="browes" />  
      <br clear="all"> 
      </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Title</label>
                  <input type="text" class="form-control" required name="job_title" value="">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                 
                         <?php
						 $_SESSION['cat_type']="job";
 							$categories= build_category_tree($conn,"", 0); ?>       
                       <select class="form-control " name="category">
                      <option value="0">Select category</option> 
                      <?php echo $categories ; ?>
                    </select>  
                 
                 
                 
                </div>
                 
                 <div class="form-group">
                  <label for="exampleInputEmail1">Url</label>
                   <input type="text" class="form-control" required name="url" value="">
                   </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Short Description</label>
                 <textarea type="text" class="form-control" required name="short_description" value=""></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea type="text" class="form-control " required name="description" value=""></textarea>
                </div>
                
              </div><!-- /.box-body -->
            </div><!-- /.box box-primary -->
            </div> <!--col-sm-->
            
            <div class="col-sm-6">
            <div class="box box-primary">  
     <div class="box-body">
            
           <div class="form-group">
                <label for="user_type">Job Type</label>
                 <select class="form-control" name="job_type">
                 <option value="">select</option>
                 <option  value="full Time">full Time</option>
                  <option  value="part Time">part Time</option>
                  <option  value="intrensip">intrensip</option>
            
                 </select> 
                  </div>
                
                <div class="form-group">
                  <label for="style">Style</label>
                  
                  <?php
						 $_SESSION['cat_type']="style";
 							$categories= build_category_tree($conn,"", 0); ?>       
                       <select class="form-control " name="style">
                      <option value="0">Select Style</option> 
                      <?php echo $categories ; ?>
                    </select>  
                  
                  
                  
                </div>
               
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Status</label>
                   <select class="form-control" name="job_status">
                 <option value="">select</option>
                 <option  value="Pending">Pending</option>
                  <option  value="Approve">Approve</option>
                  <option  value="Reject">Reject</option>
            
                 </select> 
                  
                 
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Footer</label>
                  <input type="text" class="form-control" required name="customer_footer" value="">
                </div>
            
                 <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" required name="city" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  <input type="text" class="form-control" required name="state" value="">
                </div>
            
            
         </div><!--box-body-->
         </div><!--box box-primary-->
         </div> <!--col-sm-->   
            
     </div> <!--row form-->
            
    
            
         </form>
            
          
          
  </div><!--container-->        
<?php include_once("../footer.php"); ?>
      
          
          
          
          

