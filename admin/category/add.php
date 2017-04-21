<?php 


 include_once("../header.php"); 





$msg='';
$errmsg='';
$iserror=false;


if (isset($_POST["submit"])){

$category_title=$_POST['category_title'];

$category_description=$_POST['category_description'];
$type=$_POST['type'];
$alias=$_POST['alias'];
if(empty($alias)){
$alias=$category_title;
}
$alias= slugify($alias );
$parent_id=$_POST['parent_id'];
$footer_html=$_POST['footer_html'];
   $query="INSERT INTO `category`(`category_title`,`category_description`,`type`,`parent_id`,`footer_html`) VALUES ('$category_title','$category_description','$type','$parent_id','$footer_html')";

if (mysqli_query($conn,$query)){

$id=mysqli_insert_id($conn); 
 
 $query="INSERT INTO `url_aliases`( `alias`, `object_type`,`object_id` ) VALUES ('$alias','category','$id')";
	mysqli_query($conn,$query);

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

                      
<form role="form" method="post">

<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>
       Add <?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?>
     
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>     

<?php echo $msg   ?>

<div class="box box-primary">
           
            

     <div class="box-body">
            
              <div class="box-body">
                <div class="form-group <?php if($_SESSION['cat_type']=="style"){ ?> hide <?php }   ?>">
                
               <label for="parent_id"> Parent Category</label> 
                  <?php
 $categories= build_category_tree($conn,"", 0); ?>       
                       <select class="form-control " name="parent_id">
  <option value="0">This is a parent category</option> 
  <?php echo $categories ; ?>
</select>                  
                </div> 
              
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?> Title</label>
                 <input type="text" class="form-control" required name="category_title" value="">
                </div>
                  
                   <div class="form-group">
                  <label for="exampleInputEmail1"><?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?> alias <i class="text-warning">For seo</i></label>
                  <input type="text" class="form-control " name="alias" id='alias'    />
                </div>
                  
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1"><?php if($_SESSION['cat_type']=="style"){ ?> Style <?php } else{ ?>Category <?php } ?> Description</label>
                  <textarea type="text" class="form-control textarea" name="category_description" value=""></textarea>
                </div>
            
               
            <div class="form-group  <?php  if($_SESSION['cat_type']!="job") {?> hide <?php  } ?>">
                  <label for="exampleInputEmail1">Custom Footer</label>
                  <textarea type="text" class="form-control textarea editor" name="footer_html" value=""></textarea>
                </div>
             
              
                
              </div>
              
              <!-- /.box-body -->

</div>
             
                <input type="hidden"    name="type" value="<?php echo $_SESSION['cat_type']; ?>">  
                
                   </div> 
                
            </form>
            </div><!--"container">-->
       
          
 <?php   
include_once("../footer.php"); ?>
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