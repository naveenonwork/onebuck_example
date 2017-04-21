<?php 
include_once("../header.php"); 

$msg='';
$id='';

if(isset($_GET['edit_id'])){
$id=$_GET['edit_id'];
}



    
  $query2="SELECT * FROM `category_post` WHERE   post_id='$id' ";

	$result2=mysqli_query($conn,$query2);
	
	$category_post=array();
		 while ($record=mysqli_fetch_array($result2)){
				 $category_post[]=$record["category_id"];
		 } 
	
	    

if (isset($_POST["submit"])){
$title=$_POST['title'];
$post_id=$_POST['post_id'];

$alias=$_POST['alias'];

if(empty($alias)){
$alias=$title;
}
$alias= slugify($alias );
$short_description=mysqli_escape_string($conn,$_POST['short_description']);
$meta_title=$_POST['meta_title'];
$meta_description=mysqli_escape_string($conn,$_POST['meta_description']);
$long_description=mysqli_escape_string($conn,$_POST['long_description']);

 
 $posted_category_ids=array();
 if(isset($_POST["category_ids"])){
 $posted_category_ids=$_POST['category_ids'];
 }
 
 
 
	//delete the category id if posted category id does not exist in saved category ids 
  foreach($category_post as $category_id){
 	
	if(!in_array($category_id,$posted_category_ids)){
 		  $query="delete from `category_post` where `category_id`='$category_id' and `post_id`='$post_id' ";

		 if (mysqli_query($conn,$query)){
			 
		
		}//if
		else{
			$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
			  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Error!!</h4>
                 Record could not be updated...
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";
		
		}//else
	} //if not existing category
 }//foreach
 
 
 foreach($posted_category_ids as $category_id){
 	
	
	if(!in_array($category_id,$category_post)){
 		$query="INSERT INTO `category_post`(`category_id`,`post_id`) VALUES ('$category_id','$post_id')";

		 if (mysqli_query($conn,$query)){
			 
		
		}//if
		else{
			$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
			  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Error!!</h4>
                 Record could not be updated...
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";
		
		}//else
	} //if not existing category
 }//foreach


$category_post=$posted_category_ids;//over_write past categoryid with new one
$extstr='';
$ext='';

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
		
			 $extstr=",`photo`='$ext' ";
		}
		
		

 $query="UPDATE `post` SET `title`='$title',`alias`='$alias',`short_description`='$short_description',`meta_title`='$meta_title',`meta_description`='$meta_description',
`long_description`='$long_description' $extstr WHERE `post_id`='$post_id'";

if (mysqli_query($conn,$query)){

 $query="select * from `url_aliases` where `alias`='$alias' and `object_type`='post'";
  $result_alias=mysqli_query($conn,$query);
  if(mysqli_num_rows($result_alias)>0){
  	   
		   $query="update   `url_aliases` set `alias`='$alias' 
		   where   `object_type`='post' and `object_id`='$post_id'  ";
			mysqli_query($conn,$query);
  }else{
  
		  $query="INSERT INTO `url_aliases`( `alias`, `object_type`,`object_id` ) 
		  VALUES ('$alias','post','$post_id')";
		mysqli_query($conn,$query);
  }


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
                Record could not be updated.... 
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
$query="SELECT * FROM `post` where post_id='$id'";
$result=mysqli_query($conn,$query);
$records=mysqli_fetch_array($result);
$title=$records['title'];

 
	$query="select * from `url_aliases` where `object_id`='$id' and `object_type`='post'";
 	 $result_alias=mysqli_query($conn,$query);
	 $records_alias=mysqli_fetch_array($result_alias);
	$alias=$records_alias['alias'];
$short_description=$records['short_description'];
$meta_title=$records["meta_title"];
$meta_description=$records["meta_description"];
$long_description=$records["long_description"];

$photo=$records["photo"];
?>
     

        <div class="container">   
         
            <form role="form" method="post" enctype="multipart/form-data">
            
         <div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>Post Update
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Update</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>   
            
      <?php echo $msg ;  ?>      
            
            <div class="row">
<div class="col-sm-8">

           <div class="box box-primary">
            <div class="box-body">
           

    <label for="">Photo</label>
    <?php $image= '../../images/post/thumbnails/' . $id ."." . $photo; ?>
    <img src="<?php if($photo==''){echo $image="../../images/post/thumbnails/no_image.png";}else{ echo $image; }?>"width=100 /><br/><br/>
          <input type="file" name="photo" value="browes" /> 
        <input type="hidden" id="photo" name="photo" value="<?php echo $id; ?>" />

      </div>
           
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id='title' value="<?php echo $title ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Alias <i class="text-warning">For seo</i></label>
                  <input type="text" class="form-control" name="alias" id='alias' value="<?php echo $alias ?>">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Short Description</label>
                  <textarea type="text" class="form-control" name="short_description" cols="3" ><?php echo $short_description ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Long Description</label>
                  <textarea type="text" class="form-control textarea" name="long_description" value=""><?php echo $long_description ?></textarea>
                </div>
                
                
                
                
              
              </div><!--box-body-->
           </div> <!-- /box box-primary -->
           </div><!-- row-->
           
           
           
           
          <div class="col-sm-4">      
           <div class="box box-primary">  
     <div class="box-body">
     		<div class="form-group">
                  <label for="exampleInputEmail1">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title"  value="<?php echo $meta_title ?>">
                </div>
     
    <div class="form-group">
                  <label for="exampleInputEmail1">Meta Description</label>
                  <textarea  class="form-control" name="meta_description" cols="3" ><?php echo $meta_description ?></textarea>
                </div>
                
                
          
            </div>
		  </div>
          
           
           
         
   <div class="box box-primary">        
<div class="box-body">
			
             
  <h3>Category</h3>
	 <?php 
	 
		 $query="SELECT * FROM `Category` where `type`='post'  ";
		$result=mysqli_query($conn,$query);
		

	?>
 
  <ul>
  
  <?php 
  while ($records=mysqli_fetch_array($result)){
		$category_title=$records["category_title"];
  			 $category_id=$records["category_id"];
			 ?>
  <li>
    <label class="checkbox">
    
           <input <?php if( in_array($category_id,$category_post)){ echo ' checked="checked" ' ;} ?>  type="checkbox" name="category_ids[]" value="<?php echo $category_id; ?>"><?php echo $category_title; ?>


    </label></li>
   
    
 <?php } ?>
 
 </ul>
     </div>
</div>
</div> <!--col-sm-4-->
 </div>
 
 

              <input type="hidden"  name="post_id" value="<?php echo $id; ?>" />
                             
 
 
 
 
 
 
            </form> 
       
         </div><!--"container">-->


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

