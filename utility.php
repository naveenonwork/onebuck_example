<?php
$per_page=10;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function get_Total($query,$totalcolumn='total'){

global $conn ;

$result=mysqli_query($conn,$query);
$records=mysqli_fetch_array($result);
return $records[$totalcolumn];

}

function pagination($pages = '', $range = 2)
	{  
	$showitems = ($range * 2)+1;  
	 $paged = 1;
		  
		 
				if(isset($_GET['page']))
				{
					$paged =$_GET['page']  ; 
				} 
		    
	
		 if($pages == '')
		 {
			 
			 
				 $pages = 1;
			  
		 }   
	
		 if(1 != $pages)
		 {
			 echo "<ul class='pagination pull-right'>";
			 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='index.php?page=1'>&laquo;</a></li>";
			 if($paged > 1 && $showitems < $pages) echo "<li><a href='index.php?page=".($paged - 1)."'>&lsaquo;</a></li>";
	
			 for ($i=1; $i <= $pages; $i++)
			 {
				 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				 {
					 echo ($paged == $i)? "<li  class='active'><a  href='index.php?page=".$i."'>".$i."</a></li>":"<li><a href='index.php?page=".$i."'   >".$i."</a></li>";
				 }
			 }
	
			 if ($paged < $pages && $showitems < $pages) echo "<li><a href='index.php?page=".($paged + 1)."'>&rsaquo;</a></li>";  
			 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='index.php?page=".$pages."'>&raquo;</a></li>";
			 echo "</ul>";
		 }
	}

 



function make_thumb($src, $dest, $desired_width) {

	/* read the source image */
	
	$srcarr=explode(".",$src);
	$ext=end($srcarr);
	if($ext=="jpg" || $ext=="jpeg")
	$source_image = imagecreatefromjpeg($src);
	if($ext=="png" )
	$source_image = imagecreatefrompng($src);
	if($ext=="gif" )
	$source_image = imagecreatefromgif($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	if($ext=="jpg" || $ext=="jpeg")
	imagejpeg($virtual_image, $dest);
	
	if($ext=="gif" )
	imagegif($virtual_image, $dest);
	if($ext=="png" )
	imagepng($virtual_image, $dest);
	
}












   function isEmailExisted($email,$id='') {
	  global $conn ;
	  $response= true;
	  $query="select * from example_users where Email='$email'";
		
		if(!empty($id))
		{
			$query.=" and ID!='$id' ";
		
		}
		$result=$conn->query($query);
		
		 $row=mysqli_fetch_array($result); 
	 
  		$response=array();	
		   if ( mysqli_num_rows($result)>0) {
			 
				 $response=true;
			} else {
				// user not existed
				 $response=false; 
			  
			}
		  return $response;
    }
   function isUserExisted($userid,$id='') {
	  global $conn ;
	  $response =true;
	   $query="select * from example_users where UserID='$userid'";
		
		if(!empty($userid))
		{
			$query.=" and ID!='$id' ";
		
		}
		$result=$conn->query($query);
		
		 $row=mysqli_fetch_array($result); 
	 
  		$response=array();	
		   if (mysqli_num_rows($result)>0) {
			 
				 $response=true;
			} else {
				// user not existed
				 $response=false; 
			  
			}
		  return $response;
    }
  function isValidPassword($userid,$password) {
	 
	  
	    global $conn ;
		
		$query="select * from example_users where UserID='$userid'";
		 $result=$conn->query($query);
		 $row=mysqli_fetch_array($result); 
  		 
		 $salt=$row['Salt'];
		 $email=$row['Email'];
		  
		
		  $enc=checkhashSSHA($salt, $password);
		 $query="select * from example_users where Email='$email' and password ='$enc' ";
		 
		 $result2=$conn->query($query);
		 $row2=mysqli_fetch_array($result); 
		 
  		$response=false;	
	 
		   if (mysqli_num_rows($result2)>0) {
			  $response=true; //paswword match
			 
			} else {
				 
			  $response=false; //password mismatch
			}
		  return $response;
    }


   /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
      function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
      function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }
	
	 function page_protect(){
	     global $siteurl_blog;
		 if(!isset($_SESSION['admin_userid'])){
		   redirect_to_page("admin/signin.php");
	  	 
		 }
	 
	 }
	 

  
	  function logout(){
	 
		session_destroy();
	 
		 redirect_to_page("admin/signin.php");
	 	
	 }
	 
	 function redirect_to_page($page){
	   global $siteurl_blog;
	     header("Location:".  $siteurl_blog . $page );
	 
	 }
	 
	 
	 
	function GenPwd($length = 7)
{
  $password = "";
  $possible = "0123456789bcdfghjkmnpqrstvwxyz"; //no vowels
  
  $i = 0; 
    
  while ($i < $length) { 

    
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
       
    
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  return $password;

}


function build_category_tree($conn,$output, $preselected, $parent=0, $indent=""){
  $r = mysqli_query($conn,"
    SELECT category_id, category_title FROM category WHERE parent_id = " . $parent . "
  and `type`='".$_SESSION['cat_type']."'");

  while($c = mysqli_fetch_array($r, MYSQL_ASSOC)){
    $selected = ($c["category_id"] == $preselected) ? "selected=\"selected\"" : "";
    $output .= "<option value=\"" . $c["category_id"] . "\" " . $selected . ">" . $indent . $c["category_title"] . "</option>";
    if($c["category_id"] != $parent){
     $output =build_category_tree($conn,$output, $preselected, $c["category_id"], $indent . "&nbsp;&nbsp;");
    }
  }
  return $output;
} 


function slugify($text  )
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return '';
  }
   
   
   global $conn ;
		$query="SELECT * FROM url_aliases where `alias`='$text'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0){
		$text=$text.time();
		}
   
    
	
  return $text;
  }
  
  function make_seo_url($id){
  
   global $conn ;
		$query="SELECT * FROM url_aliases where `object_id`='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0)
			{
 				$records=mysqli_fetch_array($result) ;
				
				
		}
   
  }
?>