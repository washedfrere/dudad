{*
/*
* @CODOLICENSE
*/
*}
{* Smarty *}
{extends file='layout.tpl'}

{block name=body}
    <div id="breadcrumb" class="col-md-12">

        <div class="codo_breadcrumb_list btn-breadcrumb hidden-xs">
            {"block_breadcrumbs_before"|load_block}
            <a href="{$smarty.const.RURI}{$site_url}"><div><i class="glyphicon glyphicon-home"></i></div></a>
            <!--<div>_t("New topic")}</div>-->
            {"block_breadcrumbs_after"|load_block}
        </div>
    </div>

    <div class="container">

        <div class="row">


            {"block_create_topic_before"|load_block}

            <div class="codo_widget">

                <div class="codo_widget-header">
                    {_t("Create Topic")}
                </div>

                <div class="codo_widget-content">
                    <form id="codo_new_reply_post"  method="POST" class="" role="form">

                        <div class="form-group">
                            <label for="title">{_t("Title")}</label>
                            <div>
                                <input id="codo_topic_title" type="text" class="codo_input" value="{$topic.title}" placeholder="{_t('Give a title for your topic')}" required>
                            </div>

                        </div>

                        <div class="form-group codo_tags">

                            <label for="tags">{_t("Tags")}</label>
                            <div>
                                <input id="codo_tags" data-role="tagsinput" type="text" value="{$tags}" />
                            </div>
                            {*<div class="dropdown" id="codo_category_select">
                            <button value="" class="btn dropdown-toggle btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            <span>{_t("Add tag")}</span>
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                            {foreach from=$cats item=cat}

                            <li role="presentation"><a id="{$cat->cat_id}" data-alias="{$cat->cat_alias}">{$cat->cat_name}</a></li>
                            {/foreach}


                            </ul>
                            </div>
                            *}

                        </div>

                        <div class="form-group">
                            <label for="category">{_t('Category')}</label>

                            <div>
                                <div class="dropdown" id="codo_category_select">
                                    <button value="" class="btn dropdown-toggle btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                        <span>{_t("Select a category")}</span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul id="codo_select_category" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                        {foreach from=$cats item=cat}

                                            <li role="presentation"><a id="{$cat->cat_id}" data-alias="{$cat->cat_alias}">{$cat->cat_name}</a></li>

                                            {print_children cat=$cat}
                                        {/foreach}


                                    </ul>
                                </div>
                                <div class="codo_move_sep">
                                </div>
                                <div class="well codo_move">

                                    <span id="codo_move_text">{_t("You are moving this topic from %fromCategoryName% to %toCategoryName%")}.</span>
                                    <div class="checkbox">
                                        <label>
                                            <input id="move_notify" type="checkbox"> {_t("Notify any followers of the topic about this change ?")}
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input id="move_reason" type="hidden" class="form-control" placeholder="{_t('reason - leave blank if not required')}" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="codo_new_reply" class="codo_new_reply">

                            <!--<div class="codo_reply_resize_handle"></div>-->

                            <div class="codo_reply_box" id="codo_reply_box">
                                <textarea placeholder="{_t('Describe your topic . You can use BBcode or Markdown')}" id="codo_new_reply_textarea" name="input_text">{$topic.imessage}</textarea>
                                <div class="codo_new_reply_preview" id="codo_new_reply_preview_container">
                                    <div class="codo_editor_preview_placeholder">{_t("live preview")}</div>
                                    <div id="codo_new_reply_preview"></div>
                                </div>
                                <div class="codo_reply_min_chars">{_t("enter atleast ")}<span id="codo_reply_min_chars_left">{$reply_min_chars}</span>{_t(" characters")}</div>                                    
                            </div>

                            <div id="codo_non_mentionable" class="codo_non_mentionable"><b>{_t("WARNING:")} </b>{_t("You mentioned %MENTIONS%, but they cannot see this message and will not be notified")} 
                            </div>

                            <div class="codo_new_reply_action">

                                <button class="codo_btn" id="codo_new_reply_action_post"><i class="icon-check"></i><span class="codo_action_button_txt">{_t("Post")}</span></button>
                                <button onclick="window.history.back()" class="codo_btn codo_btn_def" id="codo_new_reply_action_cancel"><i class="icon-times"></i><span class="codo_action_button_txt">{_t("Cancel")}</span></button>

                                <img id="codo_new_reply_loading" src="{$smarty.const.DEF_THEME_PATH}img/ajax-loader.gif" />
                                <button class="codo_btn codo_btn_def codo_post_preview_bg" id="codo_post_preview_btn">&nbsp;</button>
                                <button class="codo_btn codo_btn_def codo_post_preview_bg" id="codo_post_preview_btn_resp">&nbsp;</button>
                                <div class="codo_draft_status_saving">{_t("Saving...")}</div>
                                <div class="codo_draft_status_saved">{_t("Saved")}</div>

                            </div>
                            <input type="text" class="end-of-line" name="end_of_line" />

                        </div>

                        <input type="text" class="end-of-line" id="end_of_line" name="end_of_line" />
                        <input id="codo_topic_cat" name="codo_topic_cat" type="hidden" />
                        <input id="codo_topic_cat_alias" name="codo_topic_cat_alias" type="hidden" />
                        <input type="hidden" name="token" value="{$CSRF_token}" />

                    </form>
                </div>

            </div>
            {"block_create_topic_after"|load_block}

        </div>

        {include file='forum/editor.tpl'}
    </div>
    <script type="text/javascript">

        CODOFVAR = {
            smileys: JSON.parse('{$forum_smileys}'),
            reply_min_chars: parseInt({$reply_min_chars}),
            trans: {
                continue_mesg: '{_t("Continue")}'
            },
            dropzone: {
                dictDefaultMessage: '{_t("Drop files to upload &nbsp;&nbsp;(or click)")}',
                max_file_size: parseInt('{$max_file_size}'),
                allowed_file_mimetypes: '{$allowed_file_mimetypes}',
                forum_attachments_multiple: {$forum_attachments_multiple},
                forum_attachments_parallel: parseInt('{$forum_attachments_parallel}'),
                forum_attachments_max: parseInt('{$forum_attachments_max}')

            }

        };

        function on_codo_loaded() {

            CODOF.inTopic = true;


            setTimeout(function () {
                $('#codo_topic_title').focus();
            }, 500);

            $('html, body').animate({
                scrollTop: $(".codo_widget-header").offset().top
            }, 500);
            CODOF.editor_form = $('#codo_new_reply_post');
            CODOF.editor_preview_btn = $('#codo_post_preview_btn');
            CODOF.editor_reply_post_btn = $('#codo_new_reply_action_post');

            $('#codo_new_reply_textarea').putCursorAtEnd();
            $('#codo_category_select li  a').on('click', function () {

                var cid = $(this).attr('id');
                $('#codo_category_select > button > span:first-child').text($.trim($(this).text()));
                $('#codo_topic_cat').val(cid);
                $('#dropdownMenu1').val(cid);
                $('#codo_topic_cat_alias').val($(this).data('alias'));

                //return false;
                CODOFVAR.cid = cid;
                CODOF.mentions.updateSpec(cid);
                CODOF.mentions.checkForNonMentions();

                CODOF.newCatName = $('#codo_category_select > button > span:first-child').text();
                if (CODOF.oldCatName) {

                    if (CODOF.oldCatName == CODOF.newCatName) {

                        $('.codo_move, .codo_move_sep').slideUp();

                    } else {

                        $('#codo_move_from_category_name').text(CODOF.oldCatName);
                        $('#codo_move_to_category_name').text(CODOF.newCatName);
                        $('.codo_move, .codo_move_sep').slideDown()
                    }
                }

            });

            $('#codo_tags').tagsinput({
                maxTags: 5,
                maxChars: 15,
                trimValue: true
            });

            var str = $('#codo_non_mentionable').html();
            $('#codo_non_mentionable').html(str.replace('%MENTIONS%', '<span id="codo_nonmentionable_users"></span>'));

            CODOF.selectCat = function (cat_id) {

                $('#codo_category_select li  a').each(function () {

                    if (parseInt($(this).attr('id')) === cat_id) {

                        $('#codo_category_select > button > span:first-child').text($.trim($(this).text()));
                        $('#codo_topic_cat').val($(this).attr('id'));
                        $('#dropdownMenu1').val($(this).attr('id'));
                        $('#codo_topic_cat_alias').val($(this).data('alias'));
                        //$('#codo_category_select li  a').off();
                        $('#codo_new_reply_action_post').html('{_t("Save")}');
                        //$('#codo_category_select button').css('background','#eee');

                        CODOFVAR.cid = cat_id;
                    }
                });

            }
            ;


            //should be called ONLY after tagsinput() init
            CODOF.restoreFromDraft = function () {

                var obj = JSON.parse(localStorage.getItem('reply_' + codo_defs.uid));

                if (obj === null)
                    return;
                if (obj.title !== "") {
                    //add title
                    $('#codo_topic_title').val(obj.title);
                }

                if (obj.tags.length > 0) {
                    //add tags
                    var i, len = obj.tags.length;

                    for (i = 0; i < len; i++) {

                        $('#codo_tags').tagsinput('add', obj.tags[i]);
                    }

                }

                //add message
                $("#codo_new_reply_textarea").val(obj.text);

                if (obj.cat) {
                    //add cat
                    CODOF.selectCat(parseInt(obj.cat));
                    CODOF.mentions.checkForNonMentions();
                }
            };

            if (window.location.hash === '#draft') {

                CODOF.restoreFromDraft();
            }
            else if (window.location.hash === '#draftEdit') {

                var y = confirm('aa');
            } else {

                if (localStorage.getItem('reply_' + codo_defs.uid) !== null) {

                    var obj = JSON.parse(localStorage.getItem('reply_' + codo_defs.uid));
                    $('#codo_draft_topic_title').html(obj.title);
                    $('#codo_draft_pending').modal();
                }
            }


            function select_curr_cat() {


                var cat_id = parseInt('{$topic.cat_id}');

                CODOF.edit_topic_id = false;

                if (cat_id !== 0) {

                    CODOF.edit_topic_id = parseInt('{$topic.topic_id}');
                    CODOF.selectCat(cat_id);
                    CODOF.oldCatName = $('#codo_category_select > button > span:first-child').text();

                    $('#codo_move_text').html(
                            $('#codo_move_text').text()
                            .replace('%fromCategoryName%', '<span id="codo_move_from_category_name"></span>')
                            .replace('%toCategoryName%', '<span id="codo_move_to_category_name"></span>')
                            );
                }

            }
            ;

            select_curr_cat();



            CODOF.submitted = function () {
                //$('#codo_reply_replica').val($('#codo_new_reply_preview').html());

                var warned = false;
                if (CODOF.editor_reply_post_btn.hasClass('codo_btn_primary') && !CODOF.is_error()) {

                    if (!warned) {

                        if (CODOF.mentions.warnForNonMentions()) {

                            warned = true;
                            return false;
                        }
                    }
                    CODOF.editor_reply_post_btn.removeClass('codo_btn_primary');
                    $('#codo_new_reply_loading').show();

                    var action = 'create';
                    if (CODOF.edit_topic_id) {

                        action = 'edit';
                    }

                    $('#codo_reply_box').append('<div id="codo_reply_html_playground"></div>');

                    $('#codo_reply_html_playground').html($('#codo_new_reply_preview').html());

                    $('#codo_reply_html_playground .codo_embed_container').remove();
                    $('#codo_reply_html_playground .codo_embed_placeholder').remove();


                    $('#codo_reply_html_playground .codo_oembed').each(function () {

                        var href = $(this).attr('href');
                        $(this).html(href);
                    });


                    var title = $.trim($('#codo_topic_title').val());
                    CODOF.req.data = {
                        title: title,
                        cat: $.trim($('#codo_topic_cat').val()),
                        imesg: $('#codo_new_reply_textarea').val(),
                        omesg: $('#codo_reply_html_playground').html().replace(/\</g, 'STARTCODOTAG'),
                        end_of_line: $('#end_of_line').val(),
                        token: codo_defs.token,
                        tid: CODOF.edit_topic_id,
                        notify: $('#move_notify').prop('checked'),
                        reason: $('#move_notify').val(),
                        tags: $('#codo_tags').tagsinput('items')
                    };

                    CODOF.hook.call('before_req_send');

                    $.post(
                            codo_defs.url + 'Ajax/topic/' + action,
                            CODOF.req.data,
                            function (response) {

                                var obj;
                                try {
                                    obj = JSON.parse(response);
                                } catch (e) {
                                    obj = response;
                                }
                                if (obj.tid) {

                                    CODOF.autoDraft.remove();
                                    window.location.href = codo_defs.url + 'topic/' + obj.tid + '/' + title;
                                } else {
                                    alert(response);
                                    CODOF.editor_reply_post_btn.addClass('codo_btn_primary');
                                }

                                $('#codo_new_topic_loader').hide();
                            }
                    );


                }

                return false;
            };

            CODOF.is_error = function () {

                var error = false;

                var val = $.trim($('#dropdownMenu1').val());

                if (val === "") {

                    $('#dropdownMenu1').addClass('boundary-error').focus();
                    error = true;
                } else {

                    $('#dropdownMenu1').removeClass('boundary-error');
                }

                $('#codo_new_reply_post :input[required=""],#codo_new_reply_post :input[required]').each(function () {

                    var val = $(this).val();

                    if ($.trim(val) === "") {

                        $(this).addClass('boundary-error').focus();
                        error = true;
                        return false;
                    } else {
                        $(this).removeClass('boundary-error')
                    }
                });

                return error;
            };
        }
        ;

    </script>

    <link rel="stylesheet" type="text/css" href="{$smarty.const.DURI}assets/markitup/highlight/styles/github.css" />
    <link rel="stylesheet" type="text/css" href="{$smarty.const.DURI}assets/dropzone/css/basic.css" />


{/block}
