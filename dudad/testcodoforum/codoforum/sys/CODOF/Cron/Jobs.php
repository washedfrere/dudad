<?php

/*
 * @CODOLICENSE
 */

/**
 * 
 * This contains all the core jobs that are responsible for 
 * maintenance, updates, indexing, etc
 * 
 * 
 */

namespace CODOF\Cron;

class Jobs {

    public function run_jobs() {

        $this->unban_users();
    }

    public function add_core_hooks() {

        \CODOF\Hook::add('on_cron_notify', array(new \CODOF\Forum\Notification\Notifier, 'dequeueNotify'));
        \CODOF\Hook::add('on_cron_daily_digest', array(new \CODOF\Forum\Notification\Digest\Digest, 'sendDailyDigest'));
        \CODOF\Hook::add('on_cron_weekly_digest', array(new \CODOF\Forum\Notification\Digest\Digest, 'sendWeeklyDigest'));
        
    }

    //Unbans all usernames/emails/ips that have passed the time limit
    //for ban period 
    private function unban_users() {

        $qry = 'DELETE FROM ' . PREFIX . 'codo_bans WHERE ban_expires<' . time() . ' AND ban_expires<>0';
        $this->db->query($qry);
    }

}
