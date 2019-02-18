<?php

/*
 * @CODOLICENSE
 */

namespace Controller\Ajax\user;

class login {

    public function __construct() {
        $this->db = \DB::getPDO();
    }

    public function dologin() {

        if (isset($_GET['username']) && isset($_GET['password'])) {

            $login = new \CODOF\User\Login($this->db);
            \CODOF\Hook::add('on_user_loggedin', array($this, 'login_user'));

            $login->username = $_GET['username'];
            $login->password = $_GET['password'];
            echo $login->process_login();
        }
    }

    public function login_user() {
        
    }

    public function req_pass() {


        $errors = array();

        //assign a predictable password but it is difficult to predict it
        $new_pass = uniqid();

        $mail = new \CODOF\Forum\Notification\Mail();

        //update the user's password with the generated password
        $user = \CODOF\User\User::getByMailOrUsername($_GET['ident'], $_GET['ident']);

        if (!$user) {

            $errors[] = _t("User does not exist with the given username/mail");
        }

        if (empty($errors)) {

            if (!$user->updatePassword($new_pass)) {

                $errors[] = _t("Unable to reset password");
            }

            $body = \CODOF\Util::get_opt('password_reset_message');
            $sub = \CODOF\Util::get_opt('password_reset_subject');


            $mail->user = array(
                "password" => $new_pass
            );

            $message = $mail->replace_tokens($body);
            $subject = $mail->replace_tokens($sub);



            $mail->to = $user->mail;
            $mail->subject = $subject;
            $mail->message = $message;

            $mail->send_mail();

            if (!$mail->sent) {

                $errors[] = $mail->error;
            }
        }
        $resp = array("status" => "success", "msg" => "E-mail sent successfully");
        if (!empty($errors)) {

            $resp = array("status" => "fail", "msg" => $errors);
        }

        echo json_encode($resp);
    }

}
