<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 11:51:24
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/system/cron.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2081095671550c09bc245172-90035466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '851c6c652e37a8676c67e9ed31a9f21bc55efbf7' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/system/cron.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2081095671550c09bc245172-90035466',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'self' => 0,
    'token' => 0,
    'crons' => 0,
    'cron' => 0,
    'home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550c09bc624536_03440525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550c09bc624536_03440525')) {function content_550c09bc624536_03440525($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class=""><i class="fa fa-desktop"></i> System</li>            
        <li class="active"><i class="fa fa-clock-o"></i> Cron</li>
    </ol>

</section>

<style type="text/css">
    table .btn{
        padding: 1px 5px 1px;
        font-size: 10px;
        margin-right: -3px;
    }
</style>

<div class="row col-md-12">

    <p>Cron takes care of scheduling periodic tasks . </p>

    <div id="edit_cron" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editing cron</h4>
                </div>
                <form action="<?php echo $_smarty_tpl->tpl_vars['self']->value;?>
?page=system/cron" method="POST">
                    <div class="modal-body">

                        <label>Cron Name</label>
                        <input type="text" name="name" id="cron_name" class="form-control" readonly="readonly"/>
                        <br/>
                        <label>Cron type</label>
                        <input type="text" name="type" id="cron_type" class="form-control" readonly="readonly"/>

                        <br/>
                        <label>Cron Interval</label>
                        <select class="form-control" name="e_interval">
                            <option value="3600">hourly</option>
                            <option value="86400">daily</option>
                            <option value="604800">weekly</option>
                            <option value="2592000">monthly</option>
                        </select><br/>
                        <p><b><u>Or</u></b> specify a custom value in seconds</p>
                        <input class="form-control" type="number" name="interval">
                        <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>    </div>

    <table class="table" style="background: #fff;box-shadow: 1px 1px 1px #ccc">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Interval</th>
            <th>Last started</th>
            <th>Last ended</th>
            <th>Status</th>
            <th></th>
        </tr>

        <tbody>

            <?php  $_smarty_tpl->tpl_vars['cron'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cron']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['crons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cron']->key => $_smarty_tpl->tpl_vars['cron']->value) {
$_smarty_tpl->tpl_vars['cron']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
</td>
                    <td id="type_<?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_type'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_interval'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_started'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_last_run'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_status'];?>
</td>
                    <td><div id="edit_<?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
" class="btn btn-default edit">edit</div> &nbsp;|&nbsp; 
                        <div id="run_<?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
" class="btn btn-primary run"> run</div>
                    </td>

                <?php } ?>            
        </tbody>
    </table>
</div>
<script type="text/javascript">

    jQuery(document).ready(function ($) {

        $('.edit').click(function () {

            var name = $(this).attr('id').replace("edit_", "");
            $('#cron_name').val(name);
            $('#cron_type').val($('#type_' + name).html());

            $('#edit_cron').modal();
        });

        $('.run').click(function () {

            var name = $(this).attr('id').replace("run_", "");

            setTimeout(function () {
                window.location.reload(true)
            }, 1000);

            $.get('<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
Ajax/cron/run/' + name, {
                token: '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
'
            }, function (data) {

                if (data != '') {

                    alert(data);
                }
            });


        });
    });
</script><?php }} ?>
