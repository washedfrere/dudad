<?php

/*
 * @CODOLICENSE
 */

namespace Controller\Ajax\forum;

class topics {

    public function __construct() {
        $this->db = \DB::getPDO();
    }

    private $ids = array();

    /**
     *
     * Creates array of all children of passed $parents array
     *
     * @staticvar array $ids
     * @param type $branch
     * @param type $parents
     *
     */
    function get_children($branch, $parents) {

        if (property_exists($branch, 'children') && in_array($branch->cat_id, $parents)) {

            foreach ($branch->children as $child) {
                $this->ids[] = $child->cat_id;
                $parents = array_merge($parents, array($child->cat_id));
                $this->get_children($child, $parents);
            }
        }
    }

    /**
     * 
     * Ajax/topics/get_topics/:page/filter=[str=:str,]/sort=[title,created]
     * 
     */
    public function get_topics($from, $search = false) {

        $from = (int) $from;
        $num_pages = 0;
        $num_posts = \CODOF\Util::get_opt('num_posts_all_topics');
        
        /* if(!$from) {

          $from = \CODOF\Util::get_opt('num_posts_all_topics');
          } */

        $topic = new \CODOF\Forum\Topic($this->db);
        $topic->ajax = true;

        $topics = array();

        if ($search) {

            $user = \CODOF\User\User::get();
            if(!$user->can('use search')) {
                
                exit('permission denied');
            }
            $search = new \CODOF\Search\Search();
            $search->str = $_GET['str'];
            $search->from = $from;
            $search->num_results = $num_posts;
            $search->count_rows = true;

            //include sub categories ?
            /* if ($_GET['search_subcats'] == 'Yes') {

              $cat = new \CODOF\Forum\Category($this->db);
              //get sub categories of all selected categories
              $tree = $cat->generate_tree($cat->get_categories());
              foreach ($tree as $branch) {

              $this->get_children($branch, $_GET['cats']);
              }
              } */

            //$cat_ids = array_merge($this->ids, $_GET['cats']);
            //$cats = implode(",", $cat_ids);
            $search->cats = null;
            $search->match_titles = $_GET['match_titles'];
            $search->order = $_GET['order'];
            $search->sort = $_GET['sort'];
            $search->time_within = $_GET['search_within'];

            $res = $search->search($from);
            $num_pages = $search->get_total_count();

            $topics = $topic->gen_topic_arr_all_topics($res, $search);

            //var_dump($topics);
        } else {

            $_topics = $topic->get_all_topics($from);

            $tids = array();
            foreach ($_topics as $one_topic) {

                $tids[] = $one_topic['topic_id'];
            }

            if (\CODOF\User\CurrentUser\CurrentUser::loggedIn()) {

                $tracker = new \CODOF\Forum\Tracker($this->db);

                //0.76 = 3 queries
                $topic->new_topic_ids = $tracker->get_all_new_topic_ids($tids);
                $topic->new_replies = $tracker->get_new_reply_counts($tids);
            }

            $topic->tags = $topic->getAllTags($tids);
            $topics = $topic->gen_topic_arr_all_topics($_topics);
        }


        return array(
            "topics" => $topics,
            "page_no" => ($from) ? $from / $num_posts : 1,
            "num_posts" => $num_posts,
            "num_pages" => $num_pages
        );
    }

    public function getTaggedTopics($tag, $from) {

        $new_topic_ids = array();
        $new_replies = array();

        $topic = new \CODOF\Forum\Topic($this->db);
        $topic->ajax = true;

        $topics = $topic->getTaggedTopics($tag, $from);

        $tids = array();
        foreach ($topics as $one_topic) {

            $tids[] = $one_topic['topic_id'];
        }

        if (\CODOF\User\CurrentUser\CurrentUser::loggedIn()) {

            $tracker = new \CODOF\Forum\Tracker($this->db);

            //0.76 = 3 queries
            $new_topic_ids = $tracker->get_all_new_topic_ids($tids);
            $new_replies = $tracker->get_new_reply_counts($tids);
        }


        //echo json_encode(
        return array(
            "topics" => $topics,
            "tags" => $topic->getAllTags($tids),
            "new_topic_ids" => $new_topic_ids,
            "find_topics_tagged" => _t("find topics tagged"),
            "new_replies" => $new_replies,
            "new" => _t("new"),
            "new_topic" => _t("new topic"),
            "new_replies_txt" => _t("new replies"),
            "RURI" => RURI,
            "DURI" => DURI,
            "CAT_IMGS" => CAT_IMGS,
            "CURR_THEME" => CURR_THEME,
            "reply_txt" => _t("replies"),
            "views_txt" => _t("views"),
            "recent_txt" => _t('recent by'),
            "num_posts" => \CODOF\Util::get_opt('num_posts_all_topics')
        );
        //);
    }

}
