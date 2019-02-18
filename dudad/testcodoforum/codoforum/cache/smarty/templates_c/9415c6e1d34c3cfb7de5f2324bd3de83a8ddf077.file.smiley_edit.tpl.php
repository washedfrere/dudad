<?php /* Smarty version Smarty-3.1.16, created on 2015-03-23 15:20:14
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/ui/smiley_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105004017255102f2e43c7e8-38440292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9415c6e1d34c3cfb7de5f2324bd3de83a8ddf077' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/ui/smiley_edit.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105004017255102f2e43c7e8-38440292',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'smiley' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55102f2e74c9c3_53397762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55102f2e74c9c3_53397762')) {function content_55102f2e74c9c3_53397762($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-laptop"></i> UI Elements</li>

        <li><a href="index.php?page=ui/smileys"><i class="fa fa-smile-o"></i>  Smileys</a></li>
        <li><i class="fa fa-edit"></i> Edit Smiley</li>
    </ol>

</section>
<?php if ($_smarty_tpl->tpl_vars['msg']->value=='') {?>
<?php } else { ?>
    <div class='row'>
        <div class="col-md-6">
            <div class="alert alert-info alert-dismissable">
                <i class="fa fa-info"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

            </div>
        </div>
    </div>
<?php }?>
<div class="col-md-6">

    <div class="box box-info">

        <div class="box-body">

            <form  action="?page=ui/smileys&action=edit" role="form" method="post" enctype="multipart/form-data">


                <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['smiley']->value['id'];?>
' />
                <div class="form-group">
                    <label>Smiley Image:</label> <br>
                    <img src='<?php echo $_smarty_tpl->tpl_vars['smiley']->value['image_name'];?>
' />
                </div>
                <hr>
                <div class="form-group">
                    <label>Smiley Code:</label>
                    <textarea name="smiley_code" required placeholder="" rows="4" class="form-control" ><?php echo $_smarty_tpl->tpl_vars['smiley']->value['symbol'];?>
</textarea>
                    <div class="callout callout-info">
                        Specify Smiley by using their smiley code. <br>Enter one Smiley variant per line.<br>  
                        Example for "Happy Face":<br> <code>:)<br>:-)<br>:smile:</code>
                    </div>
                </div>


                <div class="form-group">
                    <label>Smiley Weight/Order:</label>
                    <input type="number" name="weight"  value="<?php echo $_smarty_tpl->tpl_vars['smiley']->value['weight'];?>
" class="form-control" required />

                </div>                


                <div class="form-group">
                    <label>New Smiley Image: </label>
                    <input type="file" name="smiley_image"  value="" class="form-control"  />
                    <div class="callout callout-info">
                        Upload a new one only if you want to change the existing smiley imageF.
                    </div>
                </div>
                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                <input type="submit" value="Save Smiley" class="btn btn-success" />

            </form>
        </div>
    </div>
</div>

<?php }} ?>
