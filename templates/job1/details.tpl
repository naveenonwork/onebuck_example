{include file='header.tpl'}

<div class="container">	

<div class="row">
 
{assign var="post_id" value=$post_data.post_id} 
{assign var="photo" value=$post_data.photo} 

<div class="col-sm-12">
                    <h2  >{$post_data.title}</h2>  
                 <img class="img-responsive center-block"   id="image" src="{$siteurl_blog}images/post/{$post_id}.{$photo}" alt="{$post_data.title}">
                  
				 
               
                <p>{$post_data.long_description}</p>
            
                
      </div><!-- col-sm-12-->
     

        
      
 


</div> <!--row-->
</div> <!--continear-->

 

 


{include file='footer.tpl'}
 
