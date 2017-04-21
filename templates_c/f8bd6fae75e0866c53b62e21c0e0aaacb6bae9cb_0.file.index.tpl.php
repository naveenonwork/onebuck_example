<?php
/* Smarty version 3.1.31, created on 2017-04-20 07:28:42
  from "D:\installedwamp\wamp64\www\onebuck_examples\templates\job1\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58f8632aaa5969_43486325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8bd6fae75e0866c53b62e21c0e0aaacb6bae9cb' => 
    array (
      0 => 'D:\\installedwamp\\wamp64\\www\\onebuck_examples\\templates\\job1\\index.tpl',
      1 => 1492673016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58f8632aaa5969_43486325 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">	

<div class="row">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['job_datas']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>

<?php $_smarty_tpl->_assignInScope('job_id', $_smarty_tpl->tpl_vars['row']->value['job_id']);
?>

<?php $_smarty_tpl->_assignInScope('photo', $_smarty_tpl->tpl_vars['row']->value['photo']);
?>


<div class="col-sm-4">
                    <div class="" style="padding:10px; border:solid 1px #ccc; border-radius: 5px;" >
<a href='#' title="<?php echo $_smarty_tpl->tpl_vars['row']->value['job_title'];?>
"><img class="img-responsive center-block image-opener"   id="image" src="<?php echo $_smarty_tpl->tpl_vars['siteurl_blog']->value;?>
/images/job/<?php echo $_smarty_tpl->tpl_vars['job_id']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
" big-data="<?php echo $_smarty_tpl->tpl_vars['siteurl_blog']->value;?>
/images/job/<?php echo $_smarty_tpl->tpl_vars['job_id']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['job_title'];?>
"></a>
                    </div>
                            <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['job_title'];?>
</h3>
                           <p class="text-center"> <?php echo $_smarty_tpl->tpl_vars['row']->value['city'];?>
</p>
                           
                           
                    <div class="text-center" style="margin-bottom:20px;">  
                        <button class="btn btn-link text-center"  data-toggle="modal" data-target="#myModal"  > email</button> -  
                    <button  class="btn btn-link" data-toggle="popover" data-placement="top" data-content="<?php echo $_smarty_tpl->tpl_vars['row']->value['short_description'];?>
">more....</button>     
                    </div>
            
                
      </div><!-- col-sm-4-->
     

        
       
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
 


</div> <!--row-->


<div class="row">
 <div class="col-sm-12"><?php echo $_smarty_tpl->tpl_vars['job_footer_html']->value;?>

 </div>
</div>

</div> <!--continear-->

<!--Preview Model-->
 <div id="previewmodal" class="modal" style="display: none;">
	    <div class="modal-dialog" >
		    <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&times;</span></button>
                    <h4 id="myModalLabel" class="modal-title">Preview</h4>
                </div>
                <div class="modal-body"   >
                
                <div>
                	<div class="col-md-3">
                   
                        <div class="well well1">
                        	<h3>Edit your exising resume using pre written text from hr professional</h3>
                        	<input type="button"  class="btn-info btn-lg redirect_resumebuilder"   value="Edit My Own" />
                        </div>
                    </div>
                	<div class="col-md-6"><img  class="img-rounded img-responsive big-src"   /></div>
                 	<div class="col-md-3"> 
                    	 <div class="well well2">
                         	<h3>Reformat your existing resume </h3>
                            <input type="button" class="btn-info btn-lg redirect_resumebuilder"  value="Re-Format My Own" /></div>
                		 </div>
                         
                    <div class="clearfix"></div>	 
                </div>
                 <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default " type="button">Close</button>
                </div>
            </div>
	    </div>
   </div>
   		</div>


<!-- Modal  email-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Email</h4>
      </div>
      <div class="modal-body">
        <table style="width:100%;_width:auto;" cellspacing="0" cellpadding="0">
            <tbody>
            <tr valign="top">
            <td class="share_email">
                <div class="email-left">
                <div class="email_job_sts"><p class="share_heading"><b>Send this job to yourself or a friend:</b></p>
                </div>
                    <form id="email_job_form3" method="post" onsubmit="sendTellAFriendEmail(this.id); return false;">
                    <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr><td>&nbsp;</td><td>
                    <p style="text-align:center;color:red;"></p></td></tr>
                    <tr>
                    <td class="col_a" valign="top"><label>From my email address</label></td>
                    <td><input class="input_text" name="fromEmail" value="" type="text"></td>
                    </tr>
                    <tr>
                    <td class="col_a" valign="top"><label>To email address</label></td>
                    <td><input class="input_text" name="toEmail" value="" type="text"></td>
                    </tr>
                   
                    <tr>
                    <td class="col_a" valign="top"><label>Comment (optional)</label></td>
                    <td><textarea class="input_textarea" rows="3" cols="40" name="comments"></textarea></td>
                    </tr>
                    <tr>
                    <td class="col_a" valign="top">&nbsp;</td>
                    <td><input name="email_job_submit_3" value="Send" type="submit"></td>
                    </tr>
                    </tbody>
                    </table>
                    </form>
                </div>
          
            </td>
            </tr>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
   


	jQuery('.image-opener').on("click",function(e){
	 	 bigimgsrc=jQuery(this).attr("big-data") 
		  title=jQuery(this).parent().attr("title") 
		
		  jQuery('#previewmodal').find(".big-src").attr("src",bigimgsrc) ;
		   jQuery('#previewmodal').find(".modal-dialog").css("width","100%") ;
		 jQuery('#previewmodal').find(".modal-dialog").css("margin","0") ;
		 jQuery('#previewmodal').find(".modal-body").css("max-height",'none') ;
		jQuery('#previewmodal').find(".modal-body").css("width","100%") ;
		 jQuery('#previewmodal').find(".modal-body").css("padding","0") ;
		  jQuery('#previewmodal').css("position","absolute") ;
		 jQuery('#previewmodal').css("overflow","visible") ;
		
		
		 jQuery('#myModalLabel').html(title) ;
		 
			 jQuery('#previewmodal').modal("show");
			     jQuery('html, body').animate({
        scrollTop: jQuery("#previewmodal").offset().top
    }, 1000);
			 //jQuery('body').scrollTo('#previewmodal');
		 e.preventDefault();
		 }
	);
	
	jQuery('.image-opener').on("click",function(e){
});		
<?php echo '</script'; ?>
>
<?php }
}
