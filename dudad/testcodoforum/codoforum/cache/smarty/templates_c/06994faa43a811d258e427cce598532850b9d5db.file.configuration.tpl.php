<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 11:47:35
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/mail/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1643845371550c08d7dc3233-18618125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06994faa43a811d258e427cce598532850b9d5db' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/mail/configuration.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1643845371550c08d7dc3233-18618125',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550c08d7e40008_57888130',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550c08d7e40008_57888130')) {function content_550c08d7e40008_57888130($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class=""><i class="fa fa-envelope"></i> Mail Settings</li>
         <li class="active"><i class="fa fa-gear"></i> Configuration</li>
    </ol>
    
</section>
<div class="col-md-6">
<div  class="box box-info">
<form class="box-body" action="?page=mail/configuration" role="form" method="post" enctype="multipart/form-data">



Mail Type:


<select name='mail_type' class="form-control">
    <option value='smtp' <?php if (smarty_modifier_get_opt("mail_type")=='smtp') {?> selected <?php }?>>SMTP</option>
    <option value='mail'  <?php if (smarty_modifier_get_opt("mail_type")=='mail') {?> selected <?php }?>>mail()</option>
    
</select><br>

<hr>
<span style="font-size:smaller">The below settings are required only if you have selected SMTP above.</span>

<br><br>
SMTP Protocol:
<input type="text" class="form-control" name="smtp_protocol" value="<?php echo smarty_modifier_get_opt("smtp_protocol");?>
" />

<br/>

SMTP Server:
<input type="text" class="form-control" name="smtp_server" value="<?php echo smarty_modifier_get_opt("smtp_server");?>
" /><br/>

SMTP Port:
<input type="text" class="form-control" name="smtp_port" value="<?php echo smarty_modifier_get_opt("smtp_port");?>
" /><br/>

SMTP username:
<input type="text" class="form-control" name="smtp_username" value="<?php echo smarty_modifier_get_opt("smtp_username");?>
" /><br/>

SMTP Password:
<input type="text" class="form-control" name="smtp_password" value="<?php echo smarty_modifier_get_opt("smtp_password");?>
" /><br/>


<input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

<input type="submit" value="Save" class="btn btn-primary"/>
</form>
 
<?php }} ?>
