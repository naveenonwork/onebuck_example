{include file='header.tpl'}



<div class="container">	
<h2>{$all_post_title}</h2>
<div class="row">

<div class="col-sm-4 pull-right">
<form  method="get">
  <div class="input-group input-group-sm">
       <input type="text" class="form-control" name="search" id="navbar-search-input" placeholder="Search" value="">
            <!--<span class="glyphicon glyphicon-search form-control-feedback"></span>-->
            <span class="input-group-btn">
            <button type="submit" value="search" class="btn btn-info btn-flat">Search</button>
            </span>
            </div>
          </form>
        </div>


</div><br/>

<div class="row">

	{foreach from=$post_data item=row}

{assign var="post_id" value=$row.post_id}
{assign var="title" value=$row.title}
{assign var="meta_description" value=$row.meta_description}
{assign var="photo" value=$row.photo}




	  <div class="col-sm-3">
    <div class="box box">  
     <div class="box-body">
                   
                    	<a style="text-decoration:none;" href="details.php?id={$post_id}">
                        
                        <div class="form-group">
                       
                            <h3 class="text-center">{$title}</h3>
                           
                            <img class="img-responsive center-block"  style="margin-top: 20px; width:80px; height:80px;" id="image" src="{$siteurl_blog}/admin/post/image/thumbnails/{$post_id}.{$photo}" width="100" height="100" alt="User Image">
                            </div>
                            </a> 
                            <p ><em>{$meta_description }</em></p>
                            
        </div>
        </div><!--box box-->
        </div>  <!--col-sm-3-->
		{/foreach}
</div>
</div>



{include file='footer.tpl'}