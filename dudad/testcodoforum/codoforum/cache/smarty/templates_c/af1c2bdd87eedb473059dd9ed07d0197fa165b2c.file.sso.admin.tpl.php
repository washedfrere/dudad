<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 12:29:44
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/sites/default/plugins/sso/admin/sso.admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135072522550c12b8f388c2-97123945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af1c2bdd87eedb473059dd9ed07d0197fa165b2c' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/sites/default/plugins/sso/admin/sso.admin.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135072522550c12b8f388c2-97123945',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550c12b9042137_37281136',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550c12b9042137_37281136')) {function content_550c12b9042137_37281136($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><div class="col-md-6">
<form  action="index.php?page=ploader&plugin=sso" role="form" method="post" enctype="multipart/form-data">


SSO Name:
<input type="text" class="form-control" name="sso_name" value="<?php echo smarty_modifier_get_opt("sso_name");?>
" /><br/>
 
SSO Client ID:
<input type="text" class="form-control" name="sso_client_id" value="<?php echo smarty_modifier_get_opt("sso_client_id");?>
" /><br/>

SSO Secret:
<input type="text" class="form-control" name="sso_secret" value="<?php echo smarty_modifier_get_opt("sso_secret");?>
" /><br/>

SSO Get User Path:
<input type="text" class="form-control" name="sso_get_user_path" value="<?php echo smarty_modifier_get_opt("sso_get_user_path");?>
" /><br/>

SSO Login User Path:
<input type="text" class="form-control" name="sso_login_user_path" value="<?php echo smarty_modifier_get_opt("sso_login_user_path");?>
" /><br/>

SSO Logout User Path:
<input type="text" class="form-control" name="sso_logout_user_path" value="<?php echo smarty_modifier_get_opt("sso_logout_user_path");?>
" /><br/>

SSO Register User Path:
<input type="text" class="form-control" name="sso_register_user_path" value="<?php echo smarty_modifier_get_opt("sso_register_user_path");?>
" /><br/>

<input type="submit" value="Save" class="btn btn-primary"/>
</form>
<br/>
<br/>
</div><?php }} ?>
