<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 11:23:30
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1890715875550c0332b58a25-62862376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3521b11976c5a0db3b4c90684e4a86decf3298b1' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/config.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1890715875550c0332b58a25-62862376',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550c0332c4cb95_52633526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550c0332c4cb95_52633526')) {function content_550c0332c4cb95_52633526($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class="active"><i class="fa fa-wrench"></i> Global Settings</li>
    </ol>
    
</section>
<div class="col-md-6">
<div  class="box box-info">
<form class="box-body" action="?page=config" role="form" method="post" enctype="multipart/form-data">
<!--
    Site URL: 
<input type="text" class="form-control" name="site_url" value="<?php echo smarty_modifier_get_opt("site_url");?>
" /><br/>
-->

Site Title:
<input type="text" class="form-control" name="site_title" value="<?php echo smarty_modifier_get_opt("site_title");?>
" /><br/>
 
Site Description:
<input type="text" class="form-control" name="site_description" value="<?php echo smarty_modifier_get_opt("site_description");?>
" /><br/>

Admin Email:
<input type="text" class="form-control" name="admin_email" value="<?php echo smarty_modifier_get_opt("admin_email");?>
" /><br/>
<!--
Captcha Public Key:
<input type="text" class="form-control" name="captcha_public_key" value="<?php echo smarty_modifier_get_opt("captcha_public_key");?>
" /><br/>

Captcha Private Key:
<input type="text" class="form-control" name="captcha_private_key" value="<?php echo smarty_modifier_get_opt("captcha_private_key");?>
" /><br/>
-->
Password Min Length:
<input type="text" class="form-control" name="register_pass_min" value="<?php echo smarty_modifier_get_opt("register_pass_min");?>
" /><br/>

Num of posts(All topics Page):
<input type="text" class="form-control" name="num_posts_all_topics" value="<?php echo smarty_modifier_get_opt("num_posts_all_topics");?>
" /><br/>

Num of posts(while viewing a category):
<input type="text" class="form-control" name="num_posts_cat_topics" value="<?php echo smarty_modifier_get_opt("num_posts_cat_topics");?>
" /><br/>

Num of posts(While viewing a topic)
<input type="text" class="form-control" name="num_posts_per_topic" value="<?php echo smarty_modifier_get_opt("num_posts_per_topic");?>
" /><br/>

Forum attachment path:
<input type="text" class="form-control" name="forum_attachments_path" value="<?php echo smarty_modifier_get_opt("forum_attachments_path");?>
" /><br/>

Allowed Upload types(comma separated):
<input type="text" class="form-control" name="forum_attachments_exts" value="<?php echo smarty_modifier_get_opt("forum_attachments_exts");?>
" /><br/>

Max Upload size(MB):
<input type="text" class="form-control" name="forum_attachments_size" value="<?php echo smarty_modifier_get_opt("forum_attachments_size");?>
" /><br/>

Allowed Mimetypes:
<input type="text" class="form-control" name="forum_attachments_mimetypes" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>

<!--
<input type="text" class="form-control" name="forum_attachments_multiple" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>

<input type="text" class="form-control" name="forum_attachments_parallel" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>
<input type="text" class="form-control" name="forum_attachments_max" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>
-->
Min characters for a post:
<input type="text" class="form-control" name="reply_min_chars" value="<?php echo smarty_modifier_get_opt("reply_min_chars");?>
" /><br/>

<!--
Captcha:
<input type="text" class="form-control" name="captcha" value="<?php echo smarty_modifier_get_opt("captcha");?>
" /><br/>
-->
<input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
<input type="submit" value="Save" class="btn btn-primary"/>
</form>
<br/>
<br/>
</div>
</div><?php }} ?>
