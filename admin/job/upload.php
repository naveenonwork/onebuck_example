<?php 
include_once("../header.php"); 
set_time_limit ( 0 );
ini_set ('gd.jpeg_ignore_warning', 1);

$msg='';
$errmsg='';
$iserror=false;

if (isset($_POST["submit"])){

   if ( isset($_FILES["file"])) {

		    //if there was an error uploading the file
	  
	    if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details
            
              
			$name = $_FILES['file']['name'];
			
			$file_parts=explode('.', $_FILES['file']['name']);
			$ext =end($file_parts);
			$ext = strtolower($ext);
			$type = $_FILES['file']['type'];
			$tmpName = $_FILES['file']['tmp_name'];

    			// check the file is a csv
    		if($ext === 'csv'){
      			  if(($handle = fopen($tmpName, 'r')) !== FALSE) {
           		 // necessary if a large csv file
				set_time_limit(0);

           		 $row = 0;

            		while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // number of fields in the csv
                $col_count = count($data);

			 
					//Title	category	style	Url	short_desc	desc	job_type	Job Status	City	State
					
					$job_title= $data[0];
					$category_name=$data[1];
					$query="select * from category where `category_title`='$category_name' and `type`='job'";
					$rs=mysqli_query($conn,$query);
					$category=0;
					while($rcd=mysqli_fetch_assoc($rs)){
						$category=$rcd['category_id'];
					}
					 
					$style_name=$data[2];
					$query="select * from category where `category_title`='$style_name' and `type`='style'";
					$rs2=mysqli_query($conn,$query);
					
					$style=0;
					while($rcd2=mysqli_fetch_assoc($rs2)){
						$style=$rcd2['category_id'];
					} 
					//$style=$data[2];
					$url=$data[3];
					$short_description=$data[4];
					$description=$data[5];
					$job_type=$data[6];
					$job_status=$data[7];
					
					$city=$data[8];
					$state=$data[9];
					
					$create_date=date('Y-m-d');
					$create_by=$_SESSION['admin_userid'];
					
					
					
					$image='';
					$ext='';


				  $query="INSERT INTO `job`(`job_title`,`photo`,`category`,`url`,`short_description`,`description`,`job_type`,`style`,`create_date`,
				`create_by`,`job_status`,`city`,`state`) VALUES ('$job_title','$ext','$category','$url','$short_description','$description','$job_type','$style','$create_date',
				'$create_by','$job_status','$city','$state')";
				
					mysqli_query($conn,$query);

					
                // inc the row
                $row++;
            	}
           	 		fclose($handle);
       			 }
    		}//if csv
			else{
			
			$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i>Error!!</h4>
                Only csv type of file can be uploaded
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";
			}  
            
			
            
        }
		
		
		
		
     } else {
            $msg= "<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i>Error!!</h4>
                No file selected 
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";
     }
 

}//submit


 
?>


 

<div class="container">
<section class="content-header">
<a class="btn btn-info pull-right" href="<?php echo $siteurl_blog; ?>admin/index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
      <h2>
       Add Job
      </h2>
     </section>
    
     
<?php echo $msg   ?>

      <form role="form" method="post" enctype="multipart/form-data"> 
            
     <div class="panel panel-default">
<div class="panel-body"><div class="form-group">
<label>Upload Csv data </label>
			<input type="file"  name="file" value="Browse" />
            <a href='sample.csv'>Sample csv format </a>
            </div>
           <div class="form-group">
              
                              <input type="submit" class="btn btn-info pull-right" name="submit" value="Upload" /> 
                </div></div></div> 
            
         </form>
            
 </div>         
          
          
<?php include_once("../footer.php"); ?>
      
          
          
          
          

