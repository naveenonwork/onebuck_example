<?php 

include_once("../header.php"); 


$msg='';
$category_id='';

if(isset($_GET['edit_id'])){
$category_id=$_GET['edit_id'];
}


if (isset($_POST["submit"])){
$category_title=$_POST['category_title'];
$alias=$_POST['alias'];
if(empty($alias)){
$alias=$category_title;
}
$alias= slugify($alias );


$category_description=$_POST['category_description'];
$parent_id=$_POST['parent_id'];
$footer_html_text='';
if(isset($_POST['footer_html'])){
$footer_html=mysqli_escape_string($conn,$_POST['footer_html']);
$footer_html_text=" ,`footer_html`='$footer_html' ";

}

$query="UPDATE `category` SET `category_title`='$category_title' ,`category_description`='$category_description' ,`parent_id`='$parent_id' $footer_html_text WHERE `category_id`='$category_id'";

if (mysqli_query($conn,$query)){
 
  $query="select * from `url_aliases` where `alias`='$alias' and `object_type`='category'";
  $result_alias=mysqli_query($conn,$query);
  if(mysqli_num_rows($result_alias)>0){
  	   
		   $query="update   `url_aliases` set `alias`='$alias' 
		   where   `object_type`='category' and `object_id`='$category_id'  ";
			mysqli_query($conn,$query);
  }else{
  
		  $query="INSERT INTO `url_aliases`( `alias`, `object_type`,`object_id` ) VALUES ('$alias','category','$category_id')";
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
                Record could not be updated...
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>";

}
}

?>
<section class="content-header">
     
     </section>
     <br clear="all" />

 
<!--<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
-->
<?php
 $query="SELECT * FROM `category` WHERE `category_id`='$category_id'";
$result=mysqli_query($conn,$query); 
while ($records=mysqli_fetch_array($result)){
$category_id=$records['category_id'];
$category_title=$records['category_title'];
 	$query="select * from `url_aliases` where `object_id`='$category_id' and `object_type`='category'";
 	 $result_alias=mysqli_query($conn,$query);
	 $records_alias=mysqli_fetch_array($result_alias);
	 
$alias=$records_alias['alias'];
$category_description=$records['category_description'];
$parent_id=$records['parent_id'];
$footer_html=$records['footer_html'];
?>
     <div class="container">
          
            <form role="form" method="post" >
            
            
             <div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"> <h2>
       Update <?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?>
    
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Update</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>   
            
     <?php echo $msg   ?>       
            
            
            
          
         <div class="box box-primary">  
              <div class="box-body">
              
              
                 <div class="form-group  <?php if($_SESSION['cat_type']=="style"){ ?> hide <?php }   ?>">
                
               <label for="parent_id"> Parent Category</label> 
                  <?php
 $categories= build_category_tree($conn,"", $parent_id); ?>       
                       <select class="form-control " name="parent_id">
  <option value="0">This is a parent category</option> 
  <?php echo $categories ; ?>
</select>                  
                </div> 
              
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?> Title</label>
                  <input type="text" class="form-control" id='title' name="category_title" value="<?php echo $category_title ?>">
                </div>
                  <div class="form-group">
                  <label  ><?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?> alias <i class="text-warning">For seo</i></label>
                  <input type="text" class="form-control " name="alias" id='alias'  value="<?php echo $alias ?>" />
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?> Description</label>
                  <textarea type="text" class="form-control textarea" name="category_description"  > <?php echo $category_description ?></textarea>
                </div>
                 <?php  if($_SESSION['cat_type']=="job") {?>
               
            <div class="form-group">
                  <label for="exampleInputEmail1">Custom Footer</label>
                  <textarea type="text" class="form-control textarea editor" name="footer_html"  ><?php echo $footer_html; ?></textarea>
                </div>
              <?php  } ?>
              
                
              </div>
              <!-- /.box-body -->
</div>
             

            </form>
            </div><!--container">-->
            <?php }?>
          
 
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
