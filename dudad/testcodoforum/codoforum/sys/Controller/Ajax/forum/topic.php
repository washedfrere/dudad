<?php

/*
 * @CODOLICENSE
 */

namespace Controller\Ajax\forum;

class topic {

    public function __construct() {

        $this->db = \DB::getPDO();
    }

    public function get_posts($tid, $from, $topic_info) {

        $post = new \CODOF\Forum\Post($this->db);

        $posts = array();
        $num_pages = 'not_passed';
        $posts_per_page = \CODOF\Util::get_opt("num_posts_per_topic");

        if (isset($_GET['str'])) {

            $num_pages = 'calc_count';
        }


        if (isset($_GET['str']) && $_GET['str'] != "") {

            $user = \CODOF\User\User::get();
            if (!$user->can('use search')) {

                exit('permission denied');
            }
            $search = new \CODOF\Search\Search();
            $search->str = $_GET['str'];
            $search->num_results = $posts_per_page;
            $search->from = $from * $search->num_results;

            if ($num_pages == 'calc_count') {

                $search->count_rows = true;
            }

            $search->tid = $tid;
            $search->match_titles = 'No';
            $search->order = $_GET['order'];
            $search->sort = $_GET['sort'];
            $search->time_within = $_GET['search_within'];

            $res = $search->search();

            if ($num_pages == 'calc_count') {

                $num_pages = $post->get_num_pages($search->get_total_count(), $search->num_results);
            }

            $posts = $post->gen_posts_arr($res, $search);

            //var_dump($topics);
        } else {

            $topic = new \CODOF\Forum\Topic($this->db);
            $title = \CODOF\Filter::URL_safe($topic_info['title']);
            $num_pages = $topic->get_num_pages(
                    $topic_info['no_posts'], $posts_per_page
            );

            $post->topic_post_id = $topic_info['post_id'];
            $post->tuid = $topic_info['uid'];
            $post->cat_id = $topic_info['cat_id'];
            $post->tid = $tid;
            $post->safe_title = $title;
            $posts = $post->get_posts($tid, $from);
        }



        return array(
            "posts" => $posts,
            "num_pages" => $num_pages
        );
    }

    public function inc_view() {

        $tid = (int) $_GET['topic_id'];
        $topic = new \CODOF\Forum\Topic($this->db);

        $topic_info = $topic->get_topic_info($tid);

        if (!$topic->canViewTopic($topic_info['uid'], $topic_info['cat_id'], $tid)) {

            exit('access denied');
        }
        //TODO: Keep on checking if this becomes reusable 
        $query = "UPDATE codo_topics SET no_views=no_views+1 WHERE topic_id=$tid";
        $res = $this->db->query($query);

        if ($res) {
            echo 'success';
        } else {
            echo 'failure';
        }
    }

    public function reply() {

        //hacking attempt
        if ($_POST['end_of_line'] != "") {
            exit;
        }

        /** TODO::::
          if (!\CODOF\User\CurrentUser\CurrentUser::loggedIn()) {
          echo _t("You must be logged in to reply");
          }
         */
        $topic = new \CODOF\Forum\Topic($this->db);
        $tid = (int) $_POST['tid'];

        $info = $topic->get_catid_title_tuid($tid);
        $catid = $info['cat_id'];

        if (!$topic->canViewTopic($info['tuid'], $catid, $tid) || !$topic->canReplyTopic($info['tuid'], $catid, $tid)) {
            echo _t("You do not have permission to ") . _t("reply");
            exit;
        }

        if (isset($_POST['input_txt']) && isset($_POST['output_txt']) && isset($_POST['tid'])) {

            $post = new \CODOF\Forum\Post($this->db);

            $in = $_POST['input_txt'];
            $out = $_POST['output_txt'];

            $filter = new \CODOF\SpamFilter();
            $needsModeration = false;

            if ($filter->isSpam($in)) {

                $needsModeration = true;
            }

            $pid = $post->ins_post($catid, $tid, $in, $out, $needsModeration);

            $user = \CODOF\User\User::get();

            if (!$needsModeration) {
                $options = array(
                    ":pid" => $pid,
                    ":uid" => $user->id,
                    ":name" => $user->name,
                    ":time" => time(),
                    ":tid" => $tid
                );

                $topic->update_last_post_details($options);
            }
            
            $notifier = new \CODOF\Forum\Notification\Notifier();
            $subscriber = new \CODOF\Forum\Notification\Subscriber();

            //get any @mentions from the topic post
            $mentions = $subscriber->getMentions($_POST['input_txt']);

            //get userids from mentions that actually exists in the database
            $ids = $subscriber->getIdsThatExisits($mentions);

            if (!$subscriber->existsForTopic($catid, $tid, $user->id)) {
                //subscribe self to topic as a Subscriber::FOLLOWING
                $subscriber->toTopic($catid, $tid, \CODOF\Forum\Notification\Subscriber::$FOLLOWING);
            }

            //if post was inserted successfully
            if ($pid) {

                $title = $info['title'];
                $topicData = array(
                    "label" => 'New reply',
                    "cid" => $catid,
                    "tid" => $tid,
                    "tuid" => $info['tuid'], //OPTIONAL 
                    "message" => \CODOF\Util::start_cut(\CODOF\Format::imessage($_POST['input_txt']), 120), //OPTIONAL
                    "pid" => $pid,
                    "mentions" => $ids, //OPTIONAL
                    "notification" => "%actor% replied to <b>%title%</b>",
                    "bindings" => array("title" => \CODOF\Util::start_cut($title, 100))
                );

                $notifier->queueNotify('new_reply', $topicData);
                \CODOF\Hook::call('after_reply_insert', $topicData);
            }

            echo json_encode(array("pid" => $pid, "spam" => $needsModeration)); //TODO: error logging and checks !
        }
    }

    public function upload() {

        if (!isset($_FILES)) {
            return;
        }
        $errors = array();
        $file_info = array();

        if (is_array($_FILES['file']['name'])) {

            $images = \CODOF\Util::re_array_files($_FILES['file']);
        } else {

            $images = array($_FILES['file']);
        }


        foreach ($images as $image) {
            if (
                    !\CODOF\File\Upload::valid($image) OR ! \CODOF\File\Upload::not_empty($image) OR ! \CODOF\File\Upload::size($image, (int) \CODOF\Util::get_opt('forum_attachments_size')) OR ! \CODOF\File\Upload::type($image, explode(",", \CODOF\Util::get_opt('forum_attachments_exts')))) {
                $errors[] = "Error While uploading the image.";
            } else {

                $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
                $file_info[] = \CODOF\File\Upload::save($image, uniqid() . "." . $ext, DATA_PATH . \CODOF\Util::get_opt('forum_attachments_path'), 0777);
            }
        }

        echo json_encode($file_info);
    }

    public function create() {

        //hacking attempt
        if ($_POST['end_of_line'] != "") {
            exit;
        }




        if (isset($_POST['title']) && isset($_POST['cat']) && isset($_POST['imesg']) && isset($_POST['omesg'])) {

            $catid = (int) ($_POST['cat']);

            $category = new \CODOF\Forum\Category($this->db);

            if (!$category->exists($catid) || !$category->canCreateTopicIn($catid)) {

                exit(_t("No such category exists!"));
            }


            $post = new \CODOF\Forum\Post($this->db);
            $topic = new \CODOF\Forum\Topic($this->db);

            $notifier = new \CODOF\Forum\Notification\Notifier();
            $subscriber = new \CODOF\Forum\Notification\Subscriber();

            $title = \CODOF\Format::title($_POST['title']);

            $filter = new \CODOF\SpamFilter();
            $needsModeration = false;

            if ($filter->isSpam($_POST['imesg'])) {

                $needsModeration = true;
            }

            $tid = $topic->ins_topic($catid, $title, $needsModeration);
            $pid = $post->ins_post($catid, $tid, $_POST['imesg'], $_POST['omesg']);
            $topic->link_topic_post($pid, $tid);


            //get any @mentions from the topic post
            $mentions = $subscriber->getMentions($_POST['imesg']);

            //get userids from mentions that actually exists in the database
            $ids = $subscriber->getIdsThatExisits($mentions);


            //subscribe self to topic as a Subscriber::NOTIFIED
            $subscriber->toTopic($catid, $tid, \CODOF\Forum\Notification\Subscriber::$NOTIFIED);

            //if post was inserted successfully
            if ($pid) {

                $user = \CODOF\User\User::get();
                $topicData = array(
                    "label" => 'New topic',
                    "cid" => $catid,
                    "tid" => $tid,
                    "tuid" => $user->id,
                    "pid" => $pid,
                    "mentions" => $ids,
                    "message" => \CODOF\Util::start_cut(\CODOF\Format::imessage($_POST['imesg']), 120),
                    "notification" => "%actor% created <b>%title%</b>",
                    "bindings" => array("title" => \CODOF\Util::start_cut($title, 100))
                );

                $notifier->queueNotify('new_topic', $topicData);
                //$notifier->dequeueNotify();
                \CODOF\Hook::call('after_topic_insert', $topicData);
            }


            //insert tags if any present in the topic
            if (isset($_POST['tags'])) {

                //the method does the filtering
                $topic->insertTags($tid, $_POST['tags']);
            }

            echo json_encode(array('tid' => $tid));
        }
    }

    public function edit() {

        //hacking attempt
        if ($_POST['end_of_line'] != "") {
            exit;
        }


        $tid = (int) $_POST['tid'];
        $topic = new \CODOF\Forum\Topic($this->db);

        $topic_info = $topic->get_topic_info($tid);
        //i have come to edit the topic

        $tuid = $topic_info['uid'];
        $cid = $topic_info['cat_id'];
        $req_cid = (int) $_POST['cat'];

        $topicNeedsToBeMoved = $cid != $req_cid;

        $has_permission = $topic->canViewTopic($tuid, $cid, $tid) &&
                $topic->canEditTopic($tuid, $cid, $tid);

        $user = \CODOF\User\User::get();

        if ($topicNeedsToBeMoved) {

            $has_permission = $has_permission && $user->can('move topics', $req_cid);
        }

        if ($has_permission) {

            if (isset($_POST['title']) && isset($_POST['cat']) && isset($_POST['imesg']) && isset($_POST['omesg'])) {

                if ($topicNeedsToBeMoved) {

                    \DB::table(PREFIX . 'codo_notify_subscribers')
                            ->where('tid', '=', $tid)
                            ->update(array('cid' => $req_cid));

                    //above also checks whether category exists

                    \DB::table(PREFIX . 'codo_categories')
                            ->where('cat_id', $cid)
                            ->update(array(
                                'no_topics' => \DB::raw('no_topics-1'),
                                'no_posts' => \DB::raw('no_posts-' . $topic_info['no_posts'])
                                    )
                    );

                    \DB::table(PREFIX . 'codo_categories')
                            ->where('cat_id', $req_cid)
                            ->update(array(
                                'no_topics' => \DB::raw('no_topics+1'),
                                'no_posts' => \DB::raw('no_posts+' . $topic_info['no_posts'])
                                    )
                    );

                    $cid = $req_cid;

                    if ($_POST['notify'] === 'true') {

                        $categoryName = $topic->getCatNameFromId($cid);
                        $topicData = array(
                            "label" => 'Topic moved',
                            "cid" => $req_cid,
                            "tid" => $tid,
                            "pid" => $topic_info['post_id'],
                            "notification" => "%actor% moved <b>%title%</b> to %category%",
                            "bindings" => array("title" => \CODOF\Util::start_cut($topic_info['title'], 100),
                                "category" => $categoryName)
                        );

                        $notifier = new \CODOF\Forum\Notification\Notifier();
                        $notifier->queueNotify('ofTopic', $topicData);
                    }
                }

                $topic->edit_topic($cid, $tid, $topic_info['post_id'], $_POST['title'], $_POST['imesg'], $_POST['omesg']);
            }

            if (isset($_POST['tags'])) {

                $tags = $_POST['tags'];

                $dbTags = $topic->getTags($tid);
                $_tags = $topic->getTagStatus($dbTags, $tags);
                $topic->insertTags($tid, $_tags['toInsert']);
                $topic->removeTags($tid, $_tags['toDelete']);
            }

            echo json_encode(array('tid' => $tid));
        } else {

            echo _t("You do not have permission to ") . _t("edit this topic");
        }
    }

    public
            function delete($id) {

        //post id
        $tid = (int) $id;

        $topic = new \CODOF\Forum\Topic($this->db);

        $topic_info = $topic->get_topic_info($tid);
        $cid = $topic_info['cat_id'];
        $tuid = $topic_info['uid'];

        if ($topic->canViewTopic($tuid, $cid, $tid) && $topic->canDeleteTopic($tuid, $cid, $tid)) {
            $isSpam = $_POST['isSpam'];

            if ($isSpam == 'yes') {

                $text = \DB::table(PREFIX . 'codo_posts AS p')
                        ->join(PREFIX . 'codo_topics AS t', 'p.topic_id', '=', 't.topic_id')
                        ->where('t.topic_id', '=', $tid)
                        ->pluck('p.imessage');

                $filter = new \CODOF\SpamFilter();
                $filter->spam($text);
            }
            //Set topic as deleted
            $topic->delete($cid, $tid);

            //update all posts linked with this topic as deleted

            $post = new \CODOF\Forum\Post($this->db);
            $post->deleteOfTopic($cid, $tid);

            echo 'success';
        } else {
            exit('access denied');
        }
    }

}
