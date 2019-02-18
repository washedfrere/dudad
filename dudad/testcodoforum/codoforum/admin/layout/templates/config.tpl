<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class="active"><i class="fa fa-wrench"></i> Global Settings</li>
    </ol>
    
</section>
<div class="col-md-6">
<div  class="box box-info">
<form class="box-body" action="?page=config" role="form" method="post" enctype="multipart/form-data">
<!--
    Site URL: 
<input type="text" class="form-control" name="site_url" value="{"site_url"|get_opt}" /><br/>
-->

Site Title:
<input type="text" class="form-control" name="site_title" value="{"site_title"|get_opt}" /><br/>
 
Site Description:
<input type="text" class="form-control" name="site_description" value="{"site_description"|get_opt}" /><br/>

Admin Email:
<input type="text" class="form-control" name="admin_email" value="{"admin_email"|get_opt}" /><br/>
<!--
Captcha Public Key:
<input type="text" class="form-control" name="captcha_public_key" value="{"captcha_public_key"|get_opt}" /><br/>

Captcha Private Key:
<input type="text" class="form-control" name="captcha_private_key" value="{"captcha_private_key"|get_opt}" /><br/>
-->
Password Min Length:
<input type="text" class="form-control" name="register_pass_min" value="{"register_pass_min"|get_opt}" /><br/>

Num of posts(All topics Page):
<input type="text" class="form-control" name="num_posts_all_topics" value="{"num_posts_all_topics"|get_opt}" /><br/>

Num of posts(while viewing a category):
<input type="text" class="form-control" name="num_posts_cat_topics" value="{"num_posts_cat_topics"|get_opt}" /><br/>

Num of posts(While viewing a topic)
<input type="text" class="form-control" name="num_posts_per_topic" value="{"num_posts_per_topic"|get_opt}" /><br/>

Forum attachment path:
<input type="text" class="form-control" name="forum_attachments_path" value="{"forum_attachments_path"|get_opt}" /><br/>

Allowed Upload types(comma separated):
<input type="text" class="form-control" name="forum_attachments_exts" value="{"forum_attachments_exts"|get_opt}" /><br/>

Max Upload size(MB):
<input type="text" class="form-control" name="forum_attachments_size" value="{"forum_attachments_size"|get_opt}" /><br/>

Allowed Mimetypes:
<input type="text" class="form-control" name="forum_attachments_mimetypes" value="{"forum_attachments_mimetypes"|get_opt}" /><br/>

<!--
<input type="text" class="form-control" name="forum_attachments_multiple" value="{"forum_attachments_mimetypes"|get_opt}" /><br/>

<input type="text" class="form-control" name="forum_attachments_parallel" value="{"forum_attachments_mimetypes"|get_opt}" /><br/>
<input type="text" class="form-control" name="forum_attachments_max" value="{"forum_attachments_mimetypes"|get_opt}" /><br/>
-->
Min characters for a post:
<input type="text" class="form-control" name="reply_min_chars" value="{"reply_min_chars"|get_opt}" /><br/>

<!--
Captcha:
<input type="text" class="form-control" name="captcha" value="{"captcha"|get_opt}" /><br/>
-->
<input type="hidden" name="CSRF_token" value="{$token}" />
<input type="submit" value="Save" class="btn btn-primary"/>
</form>
<br/>
<br/>
</div>
</div>