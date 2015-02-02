<?php

if (!function_exists('robot_email')) {

  function robot_email($params) {
    $host = isset($params['host']) ? $params['host'] : '';
    $user = isset($params['user']) ? $params['user'] : '';
    $pass = isset($params['pass']) ? $params['pass'] : '';
    $from_email = isset($params['from_email']) ? $params['from_email'] : '';
    $from_name = isset($params['from_name']) ? $params['from_name'] : '';
    $to_email = isset($params['to_email']) ? $params['to_email'] : '';
    $cc_email = isset($params['cc_email']) ? $params['cc_email'] : FALSE;
    $bcc_email = isset($params['bcc_email']) ? $params['bcc_email'] : FALSE;
    $subject = isset($params['subject']) ? $params['subject'] : '';
    $message = isset($params['message']) ? $params['message'] : '';
    
    $ci = & get_instance();
    $ci->load->library('email');

    $ci->email->initialize(array(
      'smtp_host'=>$host,
      'smtp_user'=>$user,
      'smtp_pass'=>$pass
    ));

    $ci->email->from($from_email, $from_name);
    $ci->email->to($to_email);
    if($cc_email!==FALSE)
      $ci->email->cc($cc_email);
    if($bcc_email!==FALSE)
      $ci->email->bcc($bcc_email);

    $ci->email->subject($subject);
    $ci->email->message($message);

    $ci->email->send();
  }

}

