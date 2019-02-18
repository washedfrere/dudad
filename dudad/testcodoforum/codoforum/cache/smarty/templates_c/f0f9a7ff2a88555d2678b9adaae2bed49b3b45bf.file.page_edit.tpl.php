<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 11:27:12
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/pages/page_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171777695550c04101e1180-87203662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0f9a7ff2a88555d2678b9adaae2bed49b3b45bf' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/pages/page_edit.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171777695550c04101e1180-87203662',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'err' => 0,
    'mode' => 0,
    'pid' => 0,
    'current_page' => 0,
    'roles' => 0,
    'role' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550c041046e976_48512505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550c041046e976_48512505')) {function content_550c041046e976_48512505($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?page=pages/pages"><i class="fa fa-file-powerpoint-o"></i> Pages</a></li>
        <li class="active"><i class="fa fa-edit"></i> Edit Page</li>

    </ol>

</section>


<div class="row" id="msg_cntnr">
    <div class="col-lg-12">
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
<form class="box-body" action="?page=pages/pages&action=add" role="form" method="post" enctype="multipart/form-data">


    <div class="row" id="add_cat" style="">
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-body">
                    <input type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mode']->value)===null||$tmp==='' ? 'add' : $tmp);?>
" name="mode"/>
                    <input type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pid']->value)===null||$tmp==='' ? '0' : $tmp);?>
" name="pid"/>

                    <div class="form-group">
                        <label>Page Title:</label>

                        <input type="text" name="page_title"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['current_page']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" placeholder="Page Title" required />
                    </div>

                   
                        <label>Page URL:(only alphabets, numbers and dashes are allowed)</label>
                       
                   

                    <div class="input-group form-group col-md-12" >
                                             
                        <span class="input-group-addon no-radius" style="width:110px">website.com/page/</span>
                        <input type="text" name="page_url"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['current_page']->value['url'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control no-radius" placeholder="page-url" required="required">

                    </div>
         


                    <div class="form-group"  id="block_html" > 
                        <label>Page HTML:</label><br>
                        <textarea rows="5" id="block_html_tarea" name="page_html" placeholder="<!-- HTML CODE -->" class="form-control" ><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['current_page']->value['content'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</textarea>


                        <div id="editor" style=" position: relative;height: 300px;"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['current_page']->value['content'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</div>

                    </div>




                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="box box-info">
                <div class="box-body">
                    Visiblility & Permissions:
                    <br><br>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li  class="active"><a href="#profile" role="tab" data-toggle="tab">Roles</a></li>

                        </ul>

                        <div class="tab-content">
                        
                            <div class="tab-pane active" id="profile">
                                <div class="form-group">
                                    <label>Show page for specific roles</label>
                                </div>
                                <?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
?>
                                    <div class="form-group">
                                        <input type="checkbox" name="roles[]" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['rid'];?>
" class="form-control" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['role']->value['checked'])===null||$tmp==='' ? '' : $tmp);?>
 /> <?php echo $_smarty_tpl->tpl_vars['role']->value['rname'];?>

                                    </div>
                                <?php } ?>

                                <div class="callout callout-info">
                                    Show this page only for the selected role(s).<br>
                                    If you do not select any role, the page will be visible to all users.
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="//cdn.jsdelivr.net/ace/1.1.7/min/ace.js" type="text/javascript" charset="utf-8"></script>
        <script>

            try {
                var editor = ace.edit("editor");
                editor.setTheme("ace/theme/chrome");
                editor.getSession().setMode("ace/mode/html");

                $('#block_html_tarea').hide();
                editor.getSession().on('change', function () {
                    $('#block_html_tarea').val(editor.getSession().getValue());
                });

            }
            catch (e) {

                $('#editor').hide();
                $('#block_html_tarea').show();

            }
        </script>

    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-body">
                    <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

                    <input type="submit" value="Save" class="btn btn-success" />
                    <a href="index.php?page=pages/pages" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</form>


<br/> 
<?php }} ?>
