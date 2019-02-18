<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 11:14:14
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/category_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2126292150550c0106b61a15-55700492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '170e5ae0a87035df29f473492a24f9a5872df7ed' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/category_edit.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2126292150550c0106b61a15-55700492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'err' => 0,
    'cat_id' => 0,
    'cat' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550c0106c328a0_69280230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550c0106c328a0_69280230')) {function content_550c0106c328a0_69280230($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?page=categories"><i class="fa fa-table"></i> Categories</a></li>
        <li class="active"><i class="fa fa-edit"></i> Edit Category</li>

    </ol>

</section>



<div class="row" id="msg_cntnr">
    <div class="col-lg-6">
        <?php if ($_smarty_tpl->tpl_vars['msg']->value=='') {?>

        <?php } elseif ($_smarty_tpl->tpl_vars['err']->value==1) {?>
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

            </div>
        <?php } else { ?>   
            <div class="alert alert-info alert-dismissable">
                <i class="fa fa-info"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

            </div>
        <?php }?>

    </div>
</div>


<div class="row" id="add_cat" style="">
    <div class="col-lg-6">
        <div class="box box-info">
            <form class="box-body" action="?page=categories&action=edit&cat_id=<?php echo $_smarty_tpl->tpl_vars['cat_id']->value;?>
" role="form" method="post" enctype="multipart/form-data">
                <input type="hidden" value="edit" name="mode"/>
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cat_id']->value;?>
" name="id"/>
                <input type="text" name="cat_name"  value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
" class="form-control" placeholder="Category name" required />
                <br/>

                Category Image(Upload a new one to change it):<br/>
                <img width="200px" draggable="false" src="<?php echo @constant('A_DURI');?>
<?php echo @constant('CAT_IMGS');?>
<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_img'];?>
" />
                <br>
                <input type="file" name="cat_img" class="form-control"   />
                <br/>
                <textarea name="cat_description" placeholder="Category Description" class="form-control" ><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_description'];?>
</textarea>
                <br/>

                <input type="submit" value="Save" class="btn btn-success" />
                <a href="index.php?page=categories" class="btn btn-default">Back</a>
                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
            </form>
        </div>
    </div>

</div>
<br/><?php }} ?>
