<?php
/* Smarty version 3.1.31, created on 2017-04-03 11:43:18
  from "C:\installedwamp\www\blogs\templates\job1\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58e23556bdf6c3_53031908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '772cf87359660338a1f57d975c6b08639595fd3a' => 
    array (
      0 => 'C:\\installedwamp\\www\\blogs\\templates\\job1\\index.tpl',
      1 => 1491219796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58e23556bdf6c3_53031908 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container"  >	
<br /></br>
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
<img class="img-responsive center-block"   id="image" src="<?php echo $_smarty_tpl->tpl_vars['siteurl_blog']->value;?>
/admin/job/image/<?php echo $_smarty_tpl->tpl_vars['job_id']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
" alt="User Image">
                    </div>
                            <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['job_title'];?>
</h3>
                           <p class="text-center"> <?php echo $_smarty_tpl->tpl_vars['row']->value['city'];?>
</p>
                           
                           
                    <div class="text-center" style="margin-bottom:20px;">  
                        <button class="btn btn-link"  data-toggle="modal" data-target="#myModal" class="text-center"> email</button> -  
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
</div> <!--continear-->


 


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

<?php }
}
