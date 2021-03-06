{*
/*
* @CODOLICENSE
*/
*}
{* Smarty *}
{extends file='layout.tpl'}

{block name=body}

    {"block_breadcrumbs_before"|load_block}
    <div id="breadcrumb" class="col-md-12">
        {"block_breadcrumbs_before"|load_block}

        <div class="codo_breadcrumb_list btn-breadcrumb hidden-xs">
            <a href="{$smarty.const.RURI}{$site_url}"><div><i class="glyphicon glyphicon-home"></i></div></a>

            {foreach from=$parents item=crumb}
                <a title="{$crumb.name}" data-toggle="tooltip" href="{$smarty.const.RURI}category/{$crumb.alias}"><div>{$crumb.name}</div></a>                    
                    {/foreach}
        </div>

        <select id="codo_breadcrumb_select" class="form-control hidden-sm hidden-md hidden-lg">
            <option selected="selected" value="">{_t("Where am I ?")}</option>
            {assign space "&nbsp;&nbsp;&nbsp;"}
            {assign indent "{$space}"}

            <option value="{$smarty.const.RURI}{$site_url}">{$indent}{$home_title}</option>

            {foreach from=$parents item=crumb}
                {assign indent "{$indent}{$space}"}
                <option value="{$smarty.const.RURI}category/{$crumb.alias}">{$indent}{$crumb.name}</option>                   
            {/foreach}

        </select>    
        {"block_breadcrumbs_after"|load_block}                
    </div>

    {"block_breadcrumbs_after"|load_block}

    <div class="container" id="codo_category_topics">
        <div class="row">

            {"block_category_create_topic_before"|load_block}
            {if $can_create_topic}
                <div class="codo_topics col-md-8 col-xs-12 clearfix">
                    <div id="codo_topics_create" class="codo_topics_create">

                        <div class="codo_widget">
                            <div class="codo_widget-header codo_topics_on_focus_show" id="codo_create_new_topic">
                                {_t("Create Topic")}
                            </div>

                            <div class="codo_widget-content">
                                <form id="codo_new_topic_form" method="POST" class="" role="form">

                                    <div class="form-group codo_topics_on_focus_show">
                                        <div>
                                            <input id="codo_topic_title" type="text" class="codo_input" placeholder="{_t("Give a title for your topic")}" required>
                                        </div>
                                    </div>

                                    <div class="form-group codo_tags codo_topics_on_focus_show">

                                        <div>
                                            <input id="codo_tags" data-role="tagsinput" type="text" placeholder="tags" />                               
                                        </div>

                                    </div> 
                                    <div class="form-group no-margin-bottom">
                                        <div id="codo_topic_desc_div" class="form-control">{_t("Create new topic")}</div>
                                        {*<textarea placeholder="{_t("Topic description")}" id="codo_topic_desc" class="form-control" rows="3"></textarea>*}


                                        <div id="codo_new_reply" class="codo_new_reply">

                                            <!--<div class="codo_reply_resize_handle"></div>-->

                                            <div class="codo_reply_box" id="codo_reply_box">
                                                <textarea placeholder="{_t('Describe your topic . You can use BBcode or Markdown')}" id="codo_new_reply_textarea" name="input_text"></textarea>
                                                <div class="codo_new_reply_preview" id="codo_new_reply_preview_container">
                                                    <div class="codo_editor_preview_placeholder">{_t("live preview")}</div>
                                                    <div id="codo_new_reply_preview"></div>
                                                </div>
                                                <div class="codo_reply_min_chars">{_t("enter atleast ")}<span id="codo_reply_min_chars_left">{$reply_min_chars}</span>{_t(" characters")}</div>
                                            </div>

                                            <div id="codo_non_mentionable" class="codo_non_mentionable"><b>{_t("WARNING:")} </b>{_t("You mentioned %MENTIONS%, but they cannot see this message and will not be notified")} 
                                            </div>

                                            <div class="codo_new_reply_action">
                                                <button class="codo_btn" id="codo_new_topic_btn"><i class="icon-check"></i><span class="codo_action_button_txt">{_t("Post")}</span></button>
                                                <button class="codo_btn codo_btn_def" id="codo_cancel_topic_btn"><i class="icon-times"></i><span class="codo_action_button_txt">{_t("Cancel")}</span></button>

                                                <img id="codo_new_reply_loading" src="{$smarty.const.DEF_THEME_PATH}img/ajax-loader.gif" />
                                                <button class="codo_btn codo_btn_def codo_post_preview_bg" id="codo_post_preview_btn">&nbsp;</button>
                                            </div>
                                            <input type="text" class="end-of-line" name="end_of_line" />

                                        </div>

                                    </div>

                                    <div class="codo_topics_on_focus_show">

                                        <input type="text" class="end-of-line" name="end_of_line" />
                                        <input id="codo_topic_cat" name="codo_topic_cat" type="hidden" />
                                        <input id="codo_topic_cat_alias" name="codo_topic_cat_alias" type="hidden" />
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            {/if}
            {"block_category_create_topic_after"|load_block}

            <div class="codo_categories col-md-4" id="codo_categories">

                {"block_category_desc_before"|load_block}
                <div class="codo_categories_container">
                    <a href="{$smarty.const.RURI}category/{$cat_alias}"><div class="codo_cat_title">{$cat_info.cat_name}</div></a>

                    <div class="row codo_multi_column">
                        <div class="col-sm-6 col-md-12">
                            <div class="codo_cat_imgs">
                                <div class="codo_cat_img" style="background-image:url('{$smarty.const.DURI}{$smarty.const.CAT_IMGS}{$cat_info.cat_img}')">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            {if $can_search}
                                <div class="codo_sidebar_search">
                                    <input type="text" placeholder="{_t('Search')}" class="form-control codo_topics_search_input" />
                                    <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                                </div>
                            {/if}

                            <div class="codo_cat_desc">{$cat_info.cat_description}</div>
                            {if isset($new_topics) && count($new_topics)}
                                <div class='codo_category_options'>
                                    <div id='mark_all_read' class='codo_btn codo_btn_def codo_mark_all_read'>{_t('Mark all as read')}</div>
                                </div>
                            {/if}

                            <div class="codo_cat_info row clearfix">

                                <div class="codo_cat_num col-xs-4">
                                    <div>{$no_topics}</div>
                                    {_t("Topics")}
                                </div>

                                <div class="codo_cat_num col-xs-4">
                                    <div>{$no_posts}</div>
                                    {_t("Posts")}
                                </div>
                                <div class="codo_cat_num col-xs-4">
                                    <div>{$no_followers|abbrev_no}</div>
                                    {_t("Followers")}
                                </div>

                            </div>
                            {if $logged_in}
                                {include file='forum/notification_level.tpl'}
                            {/if}
                        </div>
                    </div>
                    {if !empty($sub_cats)}
                        <div class="codo_sub_categories">


                            <div class="codo_sub_categories_txt">{_t("sub-categories")}</div>
                            <ul id="codo_categories_ul">

                                {assign var=total_topics value=0}
                                {foreach from=$sub_cats item=cat}
                                    <li>
                                        <div class="row">

                                            <div class="codo_category_img col-md-2 col-xs-2">
                                                <img draggable="false" src="{$smarty.const.DURI}{$smarty.const.CAT_ICON_IMGS}{$cat->cat_img}" />
                                            </div>

                                            <div class="codo_categories_category col-md-10">
                                                <a href="{$smarty.const.RURI}category/{$cat->cat_alias}">
                                                    <div class="codo_category_title">{$cat->cat_name}</div>
                                                </a>
                                                <span data-toggle="tooltip" data-placement="bottom" title="{_t('No. of topics')}" class="codo_category_num_topics codo_bs_tooltip">
                                                    {if $cat->granted eq 1}
                                                        {$cat->no_topics|abbrev_no}
                                                    {else} --
                                                    {/if}
                                                </span>

                                                {if isset($new_topics) && isset($new_topics[$cat->cat_id])}                                     
                                                    <a title="{_t('new topics')}"><span class="codo_new_topics_count">{$new_topics[$cat->cat_id]|abbrev_no}</span></a>
                                                    {/if}
                                            </div>
                                        </div>
                                        {get_children cat=$cat new_topics=$new_topics}
                                    </li>
                                {/foreach}
                            </ul>

                        </div>
                    {/if}
                </div>
                {"block_category_desc_after"|load_block}
                <div class="codo_categories_container">
                    <div class="codo_sidebar_fixed">

                        {if $can_search}
                            <div id="codo_sidebar_fixed_search" class="codo_sidebar_search codo_sidebar_fixed_els">
                                <input type="text" placeholder="{_t('Search')}" class="form-control codo_topics_search_input" />
                                <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                            </div>
                        {/if}

                        <div class="dropdown codo_sidebar_navigation codo_sidebar_fixed_els" id="codo_category_select">
                            <button value="" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                <span>{_t("All topics")}</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                {foreach from=$cats item=cat}

                                    <li role="presentation"><a data-alias="{$cat->cat_alias}">{$cat->cat_name}</a></li>

                                    {print_children cat=$cat}
                                {/foreach}
                            </ul>
                        </div>


                        <div class="codo_sidebar_settings">

                            <div>
                                <div id="codo_sidebar_hide_msg_switch" class="codo_switch codo_switch_off">
                                    <div class="codo_switch_toggle"></div>
                                    <span class="codo_switch_on">{_t('Yes')}</span>
                                    <span class="codo_switch_off">{_t('No')}</span>
                                </div>
                                <span>{_t("Hide topic messages")}</span>                            
                            </div>

                            <div>                           
                                <div id="codo_sidebar_inf_scroll_switch" class="codo_switch codo_switch_off">
                                    <div class="codo_switch_toggle"></div>
                                    <span class="codo_switch_on">{_t('Yes')}</span>
                                    <span class="codo_switch_off">{_t('No')}</span>
                                </div>
                                <span>{_t("Enable infinite scrolling")}</span>                             
                            </div>

                        </div>    

                    </div>
                </div>
            </div>
            <div style="display:none" id="codo_no_topics_display" class="codo_no_topics">{_t("No posts to display")}</div>

            <div class="codo_topics col-md-8 col-xs-12">

                <div id="codo_topics_list">
                    {if $cat_info.no_topics > 0}
                        {$topics}
                    {else}
                        <div class="codo_zero_topics">
                            {_t("No topics created yet!")}<br/><br/>
                            {_t("Be the first to")} <a href="#" id="codo_zero_topics">{_t("create")}</a> {_t("a topic")}
                        </div>
                    {/if}
                </div>
                {if !$load_more_hidden}
                    <a href="{$smarty.const.RURI}category/{$cat_alias}/{$curr_page+1}"
                       class="codo_topics_load_more codo_btn codo_btn_def"
                       id="codo_topics_load_more">
                        {_t("Load more")}
                    </a>
                {/if}
                <span style="display: none">
                    {*Skeleton DIV to clone in jQuery*}
                    <div id="codo_topic_page_info">
                        <span id="codo_page_info_time_spent" data-toggle="tooltip" title="{_t("time spent reading previous page")}"></span>
                        <span id="codo_page_info_page_no" data-toggle="tooltip" title="{_t("page no.")}"></span>
                        <span id="codo_page_info_pages_to_go" data-toggle="tooltip" title="{_t("pages to go")}"></span>
                    </div>
                </span>
            </div>

        </div>


    </div>
    <div id='codo_delete_topic_confirm_html'>
        <div class='codo_posts_topic_delete'>
            <div class='codo_content'>
                {_t("All posts under this topic will be ")}<b>{_t("deleted")}</b> ?
                <br/>

                <div class="codo_consider_as_spam codo_spam_checkbox">
                    <input id="codo_spam_checkbox" name="spam" type="checkbox" checked="">
                    <label class="codo_spam_checkbox" for="spam">{_t('Mark as spam')}</label>
                </div>

            </div>
            <div class="codo_modal_footer">
                <div class="codo_btn codo_btn_def codo_modal_delete_topic_cancel">{_t("Cancel")}</div>
                <div class="codo_btn codo_btn_primary codo_modal_delete_topic_submit">{_t("Delete")}</div>
            </div>
            <div class="codo_spinner"></div>
        </div>
    </div>


    {include file='forum/editor.tpl'}

    <script type="text/javascript">

        CODOFVAR = {
            cid: '{$cat_info.cat_id}',
            cat_alias: '{$cat_alias}',
            curr_page: parseInt('{$curr_page}'),
            total: {$cat_info.no_topics},
            num_posts_per_page: {$num_posts_per_page},
            smileys: JSON.parse('{$forum_smileys}'),
            reply_min_chars: parseInt({$reply_min_chars}),
            dropzone: {
                dictDefaultMessage: '{_t("Drop files to upload &nbsp;&nbsp;(or click)")}',
                max_file_size: parseInt('{$max_file_size}'),
                allowed_file_mimetypes: '{$allowed_file_mimetypes}',
                forum_attachments_multiple: {$forum_attachments_multiple},
                forum_attachments_parallel: parseInt('{$forum_attachments_parallel}'),
                forum_attachments_max: parseInt('{$forum_attachments_max}')

            },
            trans: {
                continue_mesg: '{_t("Continue")}'
            },
            login_url: '{$login_url}',
            search_data: '{$search_data}',
            last_page: '{_t("last page")}',
            no_more_posts: '{_t("No more topics to display!")}',
            no_posts: '{_t("No topics found matching your criteria!")}'

        };

    </script>


    <link rel="stylesheet" type="text/css" href="{$smarty.const.DURI}assets/dropzone/css/basic.css" />
{/block}
