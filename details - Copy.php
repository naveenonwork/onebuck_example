<?php 

$id='';

if(isset($_GET['id'])){
$id=$_GET['id'];


}

 $query="SELECT * FROM `post` where `post_id`='$id'";
$result=mysqli_query($conn,$query);
while ($records=mysqli_fetch_array($result)){
$post_id=$records['post_id'];
$title=$records['title'];
$content=$records['short_description'];
$meta_title=$records["meta_title"];
$meta_description=$records["meta_description"];
$long_description=$records["long_description"];
$create_user=$records["create_user"];
$photo=$records["photo"];
$image= 'admin/post/image/' . $post_id ."." . $photo;
?>

    
    <div class="col-sm-12">
         <div class="box box">  
     <div class="box-body">
   
        
            <div class="panel">
                  <h3 class="text-center" style="margin-top: 10px;"><?php echo ucfirst( $title) ?></h3>  
                 <img class="img-responsive center-block"   id="image" src="<?php echo $image ?>"alt="User Image">
                 <h4 style="margin: 15px 0px 20px 20px;;"><?php echo $meta_title;?></h4>
				<h4 style="margin: 0px 0px 20px 20px;"><?php echo $create_user;?></h4>
                <h5 style="margin: 0px 0px 20px 20px;"><?php echo  $meta_description ?></h5>
                <h5 style="padding: 0px 0px 18px 20px;">  <em><?php echo  $long_description ?></em></h5>
           </div> <!-- panel -->

        </div><!--col-sm-10  -->
</div></div>
<?php } ?>
</div> <!-- row-->
  
  

        <div id="footer" style="float:right;">
    
        <div id="social_box" style="height:auto;">
            <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a>
            <a href="https://www.flipkart.com/"><img src="images/flickr.png" alt="flickr" /></a>
            <a href="https://myspace.com/"><img src="images/myspace.png" alt="myspace" /></a>
            <a href="https://twitter.com/login"><img src="images/twitter.png" alt="twitter" /></a>
            <a href="https://www.youtube.com/"><img src="images/youtube.png" alt="youtube" /></a>
        </div>
    
        Copyright  2048 <a href="#">Company Name</a>
		</div> <!--footer-->

</div> <!--container-->

<!--</body>
</html>
 -->
