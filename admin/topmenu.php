<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $siteurl_blog; ?>admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OnebuckResume</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Onebuck</b>resume</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
     

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       <li  class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Job Manager</a>
       
       <ul class="dropdown-menu">
              <li ><a href="<?php echo $siteurl_blog; ?>admin/index.php">Jobs</a></li>
               <li ><a href="<?php echo $siteurl_blog; ?>admin/job/upload.php">Upload</a></li>
              <li><a href="<?php echo $siteurl_blog; ?>admin/category/index.php?type=job">Category</a> </li>
             <li><a href="<?php echo $siteurl_blog; ?>admin/category/index.php?type=style">Style</a> </li>
            </ul>
       
       </li>
        <li><a href="<?php echo $siteurl_blog; ?>admin/users/index.php">Users</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Article</a>
            
            
              <ul class="dropdown-menu">
              <li ><a href="<?php echo $siteurl_blog; ?>admin/post/index.php">Post</a></li>
              <li><a href="<?php echo $siteurl_blog; ?>admin/category/index.php?type=post">Category</a> </li>
             
            </ul>
            
            </li>
             
        
           

        <li><a href="<?php echo $siteurl_blog; ?>admin/url_manager/index.php">Url Manager</a></li>
        
        <li><a href="<?php echo $siteurl_blog; ?>admin/users/profile.php" >Profile</a></li>
          <li><a href="<?php echo $siteurl_blog; ?>admin/logout.php" >Sign out</a></li>
        
           
        
        </ul>
      </div>
    </nav>
  </header>