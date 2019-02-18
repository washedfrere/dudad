<?php /* Smarty version Smarty-3.1.16, created on 2015-03-20 11:09:26
         compiled from "/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/permission/role_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1878283560550bffe6d22e39-66406624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ca5a7d3631c402cc13d3f10d800fdbf6c98bd6b' => 
    array (
      0 => '/homepages/7/d276964803/htdocs/dudad/testcodoforum/codoforum/admin/layout/templates/permission/role_edit.tpl',
      1 => 1426334122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1878283560550bffe6d22e39-66406624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'role' => 0,
    'msg' => 0,
    'permissions' => 0,
    'permission' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_550bffe7108a52_21747950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550bffe7108a52_21747950')) {function content_550bffe7108a52_21747950($_smarty_tpl) {?><style type='text/css'>

    .toggle {

        float: right;
        margin-right: 20px;
    }

    .helphead {

        text-align: center;
        padding: 20px;
        background: #eee;
    }

    .helphead i {
        font-size: 50px;
        text-shadow: 0px 1px 0px #fff;
    }

    .help-content {

        border-top: 1px solid #ccc;
        padding: 20px;
    }
</style>

<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?page=permission/roles"><i class="fa fa-users"></i> Roles</a></li>
        <li class='active'><i class='fa fa-edit'></i> <?php echo $_smarty_tpl->tpl_vars['role']->value['rname'];?>
</li>
    </ol>

</section>

<?php if ($_smarty_tpl->tpl_vars['msg']->value=='') {?>
<?php } else { ?>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

    </div>
<?php }?>


<div class="row" id="add_cat">

    <div class="col-lg-12">
        <h4>Editing permissions of role: <b><?php echo $_smarty_tpl->tpl_vars['role']->value['rname'];?>
</b></h4><hr/>

    </div>
    <div class="col-lg-6"> 

        <div class="box box-info ">

            <form class="box-body form" action="index.php?page=permission/role_edit&role_id=<?php echo $_smarty_tpl->tpl_vars['role']->value['rid'];?>
" role="form" id="add_user_form" method="post">

                <fieldset>
                    <legend>General</legend>
                    <?php  $_smarty_tpl->tpl_vars['permission'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['permission']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permissions']->value['general']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['permission']->key => $_smarty_tpl->tpl_vars['permission']->value) {
$_smarty_tpl->tpl_vars['permission']->_loop = true;
?>

                        <?php if ($_smarty_tpl->tpl_vars['permission']->value['permission']=='view forum'&&$_smarty_tpl->tpl_vars['role']->value['rid']!=1) {?>
                        <?php } else { ?>
                            <div class="form-group">
                                <label for="<?php echo $_smarty_tpl->tpl_vars['permission']->value['permission'];?>
"><?php echo $_smarty_tpl->tpl_vars['permission']->value['permission'];?>
</label>
                                <input id='<?php echo $_smarty_tpl->tpl_vars['permission']->value['id'];?>
'
                                       class="simple form-control" name="<?php echo $_smarty_tpl->tpl_vars['permission']->value['pid'];?>
" 
                                       data-permission='<?php echo $_smarty_tpl->tpl_vars['permission']->value['permission'];?>
'
                                       <?php if ($_smarty_tpl->tpl_vars['permission']->value['granted']=='1') {?> checked="checked" <?php }?>
                                       type="checkbox"  data-toggle="toggle"
                                       data-size="mini"
                                       data-on="GRANTED" data-off="DENIED"
                                       data-onstyle="success" data-offstyle="danger">
                            </div>
                        <?php }?>
                    <?php } ?>
                    <legend>Forum</legend>
                    <?php  $_smarty_tpl->tpl_vars['permission'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['permission']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permissions']->value['forum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['permission']->key => $_smarty_tpl->tpl_vars['permission']->value) {
$_smarty_tpl->tpl_vars['permission']->_loop = true;
?>
                        <div class="form-group">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['permission']->value['permission'];?>
"><?php echo $_smarty_tpl->tpl_vars['permission']->value['permission'];?>
</label>
                            <input id='<?php echo $_smarty_tpl->tpl_vars['permission']->value['id'];?>
'
                                   class="simple" name="<?php echo $_smarty_tpl->tpl_vars['permission']->value['pid'];?>
" 
                                   data-permission='<?php echo $_smarty_tpl->tpl_vars['permission']->value['permission'];?>
'                                   
                                   <?php if ($_smarty_tpl->tpl_vars['permission']->value['granted']=='1') {?> checked="checked" <?php }?>
                                   type="checkbox"  data-toggle="toggle"
                                   data-size="mini"
                                   data-on="GRANTED" data-off="DENIED"
                                   data-onstyle="success" data-offstyle="danger">
                        </div>
                    <?php } ?>

                </fieldset>
                <hr/>
                <div>
                    <input type="submit" name='save' class="btn btn-primary" value="save permissions">  

                </div>

                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

            </form>

        </div>

    </div>
    <div class="col-lg-6" style='position: fixed;
right: 0;
top: 191px;
width: 42%;'>
        <div class="box box-default ">

            <div class="helphead">
                <i class="fa fa-question-circle"></i>
            </div>

            <div class="help-content">
                <ul>
                    <li>
                        You can click on the switches at the left to change the permission to either <b>GRANTED</b> 
                        or <b>DENIED</b>

                    </li>
                    <li>
                        The permissions in Codoforum are additive. For example. Consider a user has been assigned multiple roles.
                        If <b>atleast one</b> of the role says that the user can do something, then the user is allowed to do so.                        
                    </li>
                    <li>
                        Since the permissions are additive, if you want to restrict a user from doing something, then make sure
                        that for all the roles of that user the required permission is set to DENIED.
                    </li>
                    <li>
                        All the categories will by default inherit these permissions unless you explicitly set them in the <a href="index.php?page=permission/categories">category permissions</a>.
                    </li>
                    <li>
                        The 'view my topics' permission can be changed <b>only when</b> the 'view all topics' permission is set to DENIED.
                    </li>
                </ul>

            </div>
        </div>
    </div>


</div>
<script type='text/javascript'>

    jQuery('docuement').ready(function ($) {

        var defHelp = $('.help-content').html();

        $('#view_all_topics').on('change', function () {

            if ($(this).prop('checked')) {

                $('#view_my_topics').bootstrapToggle('on').bootstrapToggle('disable');
            } else {
                $('#view_my_topics').bootstrapToggle('enable');

            }
        });


        var pHelps = {
            'view user profiles': {
                granted: 'The users assigned to this role can view everyone\'s user profiles',
                denied: [
                    'The users of this role <b>can</b> still view thier own profiles',
                    'The users of this roles <b>cannot</b> view others\' profiles'
                ]
            },
            'use search': {
                granted: 'The users assigned to this role <b>can</b> use the search feature',
                denied: 'The users assigned to this role <b>cannot</b> use the search feature'
            },
            'view all topics': {
                granted: 'The users of this role can view all topics i.e topics created by them as well as others',
                conditions: {
                    title: 'When a topic is not viewable for a user',
                    items:
                            [
                                'They cannot perform any action on the topics for eg. reply, edit, delete, increment views, upload, get posts, moderate etc.',
                                'The topics will not be included in the search results.',
                                'They cannot be mentioned in the topic.',
                                'They will not recieve any notifications for these topics'
                            ]
                }
            },
            'view my topics': {
                granted: 'The users of this role will only be able to view their <b>own</b> topics'
            },
            'create new topic': {
                granted: 'The users of this role can create a new topic'
            },
            'reply to all topics': {
                granted: 'The users assigned to this role can reply to all topics in the forum',
                denied: [
                    'The users can <b>still</b> reply to their own topics',
                    'The users <b>cannot</b> reply to topics created by others '
                ]
            },
            'edit my topics': {
                granted: 'The users will be able to edit their own topics'
            },
            'edit all topics': {
                granted: 'The users will be able to edit all topics in the forum'
            },
            'delete my topics': {
                granted: 'The users will be able to delete their own topics'
            },
            'delete all topics': {
                granted: 'The users will be able to delete all topics in the forum'
            },
            'view forum': {
                granted: 'The users of this group will be able to access your forum'
            },
            'edit my posts': {
                granted: 'The users will be able to edit their own posts/replies'
            },
            'edit all posts': {
                granted: 'The users will be able to edit all posts/replies in the forum'
            },
            'delete my posts': {
                granted: 'The users will be able to delete their own posts/replies'
            },
            'delete all posts': {
                granted: 'The users will be able to delete all posts/replies in the forum'
            }

        };

        pHelps['view my topics'].conditions = pHelps['view all topics'].conditions;
        function generateHelp(permission) {

            var help = "<h4>" + permission + "</h4>";
            var info = pHelps[permission];

            help += '<br/><br/>';

            if (info.granted) {

                help += '<b>When GRANTED</b><br/>';

                if (info.granted.constructor === Array) {

                    help += "<ul>";
                    for (var i = 0; i < info.granted.length; i++) {

                        help += "<li>" + info.granted[i] + "</li>";
                    }
                    help += "</ul>";
                } else {

                    help += info.granted;
                }

                help += "<br/><hr/><br/>";
            }
            if (info.denied) {

                help += '<b>When DENIED</b><br/>';

                if (info.denied.constructor === Array) {

                    help += "<ul>";
                    for (var i = 0; i < info.denied.length; i++) {

                        help += "<li>" + info.denied[i] + "</li>";
                    }
                    help += "</ul>";
                } else {

                    help += info.denied;
                }
            }

            if (info.conditions) {


                help += "<b>" + info.conditions.title + "</b>";

                help += "<ul>";

                for (var i = 0; i < info.conditions.items.length; i++) {

                    help += "<li>" + info.conditions.items[i] + "</li>";
                }

                help += "</ul>";
            }


            return help;
        }

        setTimeout(function () {
            $('.toggle').on('mouseenter', function () {
                var permission = $(this).find('input').data('permission');

                var help = generateHelp(permission);
                $('.help-content').html(help);
            }).on('mouseleave', function () {

                $('.help-content').html(defHelp);
            });
        }, 100);
    });

</script>
<?php }} ?>
