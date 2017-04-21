<?php 
include_once("../header.php"); 

ini_set ('gd.jpeg_ignore_warning', 1);



$msg='';
$errmsg='';
$iserror=false;

if (isset($_POST["submit"])){
$title=$_POST['title'];
$alias=$_POST['alias'];
if(empty($alias)){
$alias=$title;
}
$alias= slugify($alias );
$short_description=$_POST['short_description'];
$meta_title=$_POST['meta_title'];
$meta_description=$_POST['meta_description'];

$long_description=$_POST['long_description'];

 $category_ids=$_POST['category_ids'];

$create_user=$_SESSION['admin_userid'];


if(!$iserror){
$image='';
$ext='';
if($_FILES['photo']['name']!=''){
			 $image=$_FILES['photo']['name'];
			
			$ext = pathinfo($image, PATHINFO_EXTENSION);
		}

$query="INSERT INTO `post`(`title`,`short_description`,`meta_title`,`meta_description`,`long_description`,`create_user`,`photo`) VALUES ('$title','$short_description','$meta_title','$meta_description','$long_description','$create_user','$ext')";

if (mysqli_query($conn,$query)){

$id=mysqli_insert_id($conn);

 
 $query="INSERT INTO `url_aliases`( `alias`, `object_type`,`object_id` ) VALUES ('$alias','post','$id')";
	mysqli_query($conn,$query);



	foreach($category_ids as $category_id){
		$query="INSERT INTO `category_post`(`category_id`,`post_id`) VALUES ('$category_id','$id')";
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

//var_dump($id);
	if($_FILES['photo']['name']!=''){
		if(!file_exists("../../images")){
		 mkdir("../../images");
		} 
		 if(!file_exists("../../images/thumbnails")){
		  mkdir("../..images/thumbnails");
		 }
		$image=$_FILES['photo']['name'];
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$tmp_path=$_FILES['photo']['tmp_name'];
		 $newpath="../../images/post/".$id.".".$ext;
		 move_uploaded_file($tmp_path,$newpath);
		if($ext==''){
		$image="../../images/post/no_image.png";
		$thumb_img="../../images/post/thumbnails/no_image.png";
		}
		else{
			$image= '../../images/post/' . $id ."." . $ext;
			 $thumb_img='../..images/post/thumbnails/' .$id. "." . $ext;
		}
		 make_thumb($image,$thumb_img,100);
		}
	$msg=' <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>';
		}
		else{
		$msg=' <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
  </div>';
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
<div class="container">

 <form role="form" method="post" enctype="multipart/form-data">



<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>Post Add
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>     
    
     
<?php echo $msg   ?>

     


   <div class="row">
     <div class="col-sm-8">       
            
  <div class="box box-primary">  
     <div class="box-body">
     
   <label for="">Photo:</label>
       <img src="image/no_image.png" width=100  /><br/><br/>
      <input type="file" name="photo" value="browes" />  
      <br clear="all"> 
      </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" required id='title' id='title' name="title" value="">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Alias <i class="text-warning">For seo</i></label>
                  <input type="text" class="form-control"  id='alias'  id='alias' name="alias" value="">
                </div>
                 
                
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Short Description</label>
                 <textarea type="text" class="form-control" name="short_description" cols="3" ></textarea> 
                </div>
                
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Long Description</label>
                   <textarea type="text" class="form-control textarea" required name="long_description" value=""></textarea>

                   </div>
                
                
                
            
                
              </div><!-- /.box-body -->
              
            </div><!-- /.box box-primary -->
            </div> <!--row 8-->
            
            
             <div class="col-sm-4">      
           <div class="box box-primary">  
     <div class="box-body">
     <div class="form-group">
                  <label for="exampleInputEmail1">Meta Title</label>
                  <input type="text" class="form-control" required name="meta_title" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Meta Description</label>
                  <textarea class="form-control" required name="meta_description" cols="3"></textarea>
                </div>
           
          
            </div><!-- /.box-body -->
		  </div><!-- /.box box-primary -->
        
           <div class="box box-primary">  
     <div class="box-body">
          
  <h3>Category</h3>
	 <?php 
		 $query="SELECT * FROM `Category` where `type`='post' ";
		$result=mysqli_query($conn,$query);
		while ($records=mysqli_fetch_array($result)){
		$category_title=$records["category_title"];
 			$category_id=$records["category_id"];
 
	?>
 
  <ul>
  <li>
    <label class="checkbox">
    
      <input type="checkbox" name="category_ids[]" value="<?php echo $category_id; ?>"><?php echo $category_title; ?>
    </label></li>
   
   
    </ul>
	 <?php } ?>
     </div>
		  </div>
          </div> 
                
           
	     </div> <!--row row row-->
       
         </form>
      </div><!--container">-->
          
    <?php include_once("../footer.php"); ?>
      
     <script language="javascript">
$(document).ready(function(){

	jQuery('#title,#alias').on("change",function(){
		title=jQuery(this).val();
		$.post("alias_check.php", {ajax_title: title}, function(data, status){
        
		jQuery('#alias').val(data)
		//alert("Data: " + data + "\nStatus: " + status);
    });

	
	})
});		

</script> 