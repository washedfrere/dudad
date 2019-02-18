{*
/*
* @CODOLICENSE
*/
*}
{* Smarty *}
{extends file='layout.tpl'}

{block name=body}

    <style>
        
        .container {
        
            padding-top: 60px;
        }
    </style>
    
    <div class="container" style="padding-top: 60px">
        {"block_profile_view_before"|load_block}
        <div class="row">
            {"block_view_user_info_before"|load_block}
            <div class="col-md-6 codo_profile_info" style='float: left'>
                {"block_view_user_info_start"|load_block}

                <div style="display:none" class="codo_notification codo_notification_error" id="codo_resend_mail_failed"></div>

                <div style="display:none" id="codo_mail_resent" class="codo_notification codo_notification_success">
                    {_t("A confirmation email has been sent to your email address!")}
                </div>


                {if $user_not_confirmed}

                    <div class="codo_notification codo_notification_warning">
                        {_t("You have not yet confirmed your email address.")}
                        <a id="codo_resend_mail" href="#">{_t("Resend email")}</a>
                        <img id="codo_email_sending_img" src="{$smarty.const.DEF_THEME_PATH}img/ajax-loader-orange.gif" />
                    </div>
                {/if}

                <div class='codo_user_info'>


                    <div class="codo_user_name">
                        <div>{$user->username}</div>
                        {if $can_edit}
                            <div id="codo_edit_profile" class="codo_edit_profile">
                                <img draggable="false" src="{$smarty.const.DEF_THEME_PATH}img/edit_white.png" />
                            </div>
                        {/if}
                    </div>
                    <div class="codo_minus_user_name">
                        <div class='codo_avatar'>

                            <img draggable="false" src="{$user->avatar}" />
                            <div class="codo_role_name">{$rname}</div>
                        </div>

                        <div class="codo_user_details">
                            <div>
                                <span>{_t("Joined")}: </span>{$user->created|get_pretty_time}
                            </div>
                            <div>
                                <span>{_t("Last login")}: </span>{if $user->last_access eq 0}{_t('never')}{else}{$user->last_access|get_pretty_time}{/if}
                            </div>

                            <div class="codo_topic_statistics">

                                <div class="codo_cat_num">
                                    <div id="codo_topic_views" data-number="22" style="display: block;">{$user->profile_views|abbrev_no}</div>
                                    {_t("views")}
                                </div>
                                <div class="codo_cat_num">
                                    <div>
                                        {$user->no_posts|abbrev_no}
                                    </div>
                                    {_t("posts")}
                                </div>

                            </div>                            
                        </div>
                    </div>
                </div>
                {"block_view_user_info_end"|load_block}

            </div>
            {"block_view_user_info_after"|load_block}

            {"block_user_recent_posts_before"|load_block}

            <div class="col-md-6 codo_recent_posts" style='float: right'>

                {"block_user_recent_posts_start"|load_block}

                <div class=''>

                    <div class="codo_profile_header">
                        <div>{_t('Recent posts')}</div>                        
                    </div>
                    {literal}                    
                        <div class="codo_topics_body" id="codo_topics_body">

                            <div class='codo_load_more_gif'></div>
                            <script style="display: none" id="codo_template" type="text/html">

                                {{#each topics}}
                                <article class="clearfix">

                                    <div class="codo_topics_topic_img">
                                        <a href="{{../RURI}}category/{{cat_alias}}">
                                            <img draggable="false" src="{{../DURI}}{{../CAT_IMGS}}{{cat_img}}" />
                                        </a>
                                    </div>

                                    <div class="codo_topics_topic_content">
                                        <div class="codo_topics_topic_avatar">
                                            <a href="{{../RURI}}user/profile/{{id}}">

                                                {{#if avatar}}
                                                <img draggable="false" src="{{avatar}}" />
                                                {{else}}
                                                <img draggable="false" src="{{../../DURI}}{{../../DEF_AVATAR}}" />
                                                {{/if}}

                                            </a>
                                        </div>
                                        <div class="codo_topics_topic_name">
                                            <a href="{{../RURI}}user/profile/{{id}}">{{name}}</a>
                                            <span>{{../created}} {{topic_created}}</span>
                                        </div>

                                        <div class="codo_topics_topic_title"><a href="{{../RURI}}topic/{{topic_id}}/{{safe_title}}">{{title}}</a></div>

                                    </div>

                                    {{#each contents}}
                                    <div class='codo_topics_topic_contents'>
                                        <div class="codo_topics_topic_message">{{{message}}}
                                        </div>
                                        <div class='codo_virtual_space'></div>    
                                        <div class="codo_topics_last_post">
                                            <a href="{{../../RURI}}topic/{{../topic_id}}/{{../safe_title}}/post-{{post_id}}#post-{{post_id}}">{{post_created}}</a>
                                        </div>
                                    </div>
                                    {{/each}}

                                    <div class="codo_topics_topic_foot clearfix">

                                        <div class="codo_topics_no_replies"><span>{{no_replies}}</span>{{../reply_txt}}</div>
                                        <div class="codo_topics_no_replies"><span>{{no_views}}</span>{{../views_txt}}</div>

                                    </div>


                                </article>
                                {{else}}

                                <div class="codo_no_posts">
                                    {{no_topics}}
                                    {{#if can_create}}
                                    <br/><br/>
                                    <button class="codo_btn codo_btn_primary" onclick="codo_create_topic()" href="#" >{{new_topic}}</button> 
                                    {{/if}}
                                </div>
                                {{/each}}
                                </script>
                            </div>
                        {/literal}
                    </div>

                </div>
                {"block_user_recent_posts_after"|load_block}            
            </div>
            {"block_profile_view_after"|load_block}
        </div>

        <script type="text/javascript">

                                            CODOFVAR = {

                                            userid: {$user->id}
                                            }
        </script>
    {/block}
