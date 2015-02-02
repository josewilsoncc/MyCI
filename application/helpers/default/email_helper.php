<?php

if (!function_exists('robot_email')) {

  /**
   * 
   * Permite enviar un email de manera automatica.
   * 
   * @param array $params Son los parametros para enviar el email como:
   * 
   * string <b>'host'</b> Es el host que brinda el servicio SMTP
   * 
   * string <b>'user'</b> Es el usuario para autentificarse de manera automatica en el servicio SMTP
   * 
   * string <b>'password'</b> Es la contraseña para autenticarse de manera automatica en el servicio SMTP
   * 
   * string <b>'from_email'</b> Es el email desde donde se envia el correo.
   * 
   * string <b>'from_name'</b> Es el nombre de quien envia el correo.
   * 
   * string <b>'to_email'</b> Es el nombre de a quien se le envia el correo.
   * 
   * string <b>'cc_email'</b> Es el email que recibira una copia del correo. [Opcional]
   * 
   * string <b>'bcc_email'</b> Es el email que recibira una copia oculta del correo. [Opcional]
   * 
   * string <b>'subject'</b> Es el asunto del email que se enviará.
   * 
   * string <b>'message'</b> Es el email/mensaje que se enviará.
   * 
   * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 2015/02/05
   */
  function robot_email($params) {
    $host = isset($params['host']) ? $params['host'] : '';
    $user = isset($params['user']) ? $params['user'] : '';
    $password = isset($params['password']) ? $params['password'] : '';
    
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
      'smtp_pass'=>$password
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

