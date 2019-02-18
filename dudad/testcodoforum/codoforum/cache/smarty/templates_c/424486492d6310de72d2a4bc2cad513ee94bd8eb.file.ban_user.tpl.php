<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 11:26:28
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/moderation/ban_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1621877231550c03e481d918-46920029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '424486492d6310de72d2a4bc2cad513ee94bd8eb' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/moderation/ban_user.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1621877231550c03e481d918-46920029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'self' => 0,
    'token' => 0,
    'bans' => 0,
    'ban' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550c03e49a4e15_65535455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550c03e49a4e15_65535455')) {function content_550c03e49a4e15_65535455($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class=""><i class="fa"></i> Moderation</li>            
        <li class="active"><i class="fa fa-ban"></i> Ban user</li>    </ol>
</section>

<style type="text/css">
    table .btn{
        padding: 1px 5px 1px;
        font-size: 11px;
        margin-right: -3px;
    }


    .one_line {

        margin-bottom: 30px;
    }


    .one_line > input, .one_line > select {

        display: inline-block;
        width: 40%;
        margin: 0px 4px;
    }
</style>

<?php if ($_smarty_tpl->tpl_vars['msg']->value=='') {?>
<?php } else { ?>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

    </div>
<?php }?>


<div class="row col-md-12">


    <div id="ban" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ban user</h4>
                </div>
                <form action="<?php echo $_smarty_tpl->tpl_vars['self']->value;?>
?page=moderation/ban_user" method="POST">
                    <div class="modal-body">

                        <label>Ban type</label>
                        <select id="ban_type" name="ban_type" class="form-control">
                            <option value="name">Name</option>
                            <option value="mail">Mail</option>
                            <option value="ip">IP address</option>
                        </select>
                        <br/>    

                        <label>Ban UID (Name/Mail/IP)</label>
                        <input type="text" name="ban_uid" id="ban_uid" class="form-control" placeholder="enter username or email or ip address" required/>
                        <br/>

                        <label>Ban Reason</label>
                        <input type="text" name="ban_reason" id="ban_reason" class="form-control"/>                        
                        <br/>

                        <label>Ban length</label>

                        <div class="one_line">
                            <input type="number" name="ban_expires" id="ban_expires" class="col-md-6 form-control" value="24"/>
                            <select name="ban_expires_type" id="ban_expires_type" class="col-md-6 form-control">
                                <option value="hour">hour(s)</option>
                                <option value="day">day(s)</option>
                                <option value="month">month(s)</option>
                                <option value="forever">forever</option>                            
                            </select>
                        </div>

                        <input type="hidden" disabled="disabled" id="ban_id" name="id"/>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                </form>
            </div>
        </div>  
    </div>

    <form id="remove_ban" style="display: none" action="<?php echo $_smarty_tpl->tpl_vars['self']->value;?>
?page=moderation/ban_user" method="POST">

        <input type="text" name="remove_ban" />
        <input type="number" name="id" id="ban_remove_id" />
        <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

    </form>                

    <p>
        <button class="btn btn-primary" id="add_ban"><i class="fa fa-plus"></i> Add ban record</button>       
    </p>

    <table class="table" style="background: #fff;box-shadow: 1px 1px 1px #ccc">
        <tr>
            <th>UID</th>
            <th>Type</th>
            <th>Banned by</th>
            <th>Banned on</th>
            <th>Ban reason</th>
            <th>Lift Ban on</th>
            <th></th>
        </tr>

        <tbody>

            <?php  $_smarty_tpl->tpl_vars['ban'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ban']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bans']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ban']->key => $_smarty_tpl->tpl_vars['ban']->value) {
$_smarty_tpl->tpl_vars['ban']->_loop = true;
?>
                <tr>
                    <td id="uid_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ban']->value['uid'];?>
</td>
                    <td id="type_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ban']->value['ban_type'];?>
</td>
                    <td id="by_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ban']->value['ban_by'];?>
</td>
                    <td id="on_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ban']->value['ban_on'];?>
</td>
                    <td id="reason_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ban']->value['ban_reason'];?>
</td>
                    <td id="_expires_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ban']->value['ban_expires'];?>
</td>


                    <td>
                        <div id="edit_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
" class="btn btn-default edit">edit</div> &nbsp;|&nbsp; 
                        <div id="remove_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
" class="btn btn-danger remove"> remove</div>
                        <span style="display:none" id="expires_<?php echo $_smarty_tpl->tpl_vars['ban']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ban']->value['ban_real_expires'];?>
</span>
                    </td>

                <?php } ?>            
        </tbody>
    </table>
</div>
<script type="text/javascript">

    jQuery(document).ready(function ($) {

        $('#add_ban').click(function () {

            //reset form
            $('#ban_type').val('name');
            $('#ban_uid').val('');
            $('#ban_reason').val('');
            $('#ban_expires').val('24');
            $('#ban_expires_type').val('hour');
            $('#ban').modal();

            setTimeout(function () {
                $('#ban_uid').focus();
            }, 200);
        });

        $('.edit').click(function () {

            var id = $(this).attr('id').replace("edit_", "");
            $('#ban_id').val(id).prop('disabled', false);
            //set form
            $('#ban_type').val($('#type_' + id).html().toLowerCase());
            $('#ban_uid').val($('#uid_' + id).html());
            $('#ban_reason').val($('#reason_' + id).html());
            var expires = $('#expires_' + id).html();
            var _exp = expires.split('#');
            $('#ban_expires').val(_exp[0]);
            $('#ban_expires_type').val(_exp[1]);
            $('#ban').modal();

            setTimeout(function () {
                $('#ban_uid').focus();
            }, 200);
        });

        $('.remove').click(function () {

            $('#ban_remove_id').val($(this).attr('id').replace("remove_", ""));
            $('#remove_ban').submit();
        });

    });
</script><?php }} ?>
