<?php
if (!function_exists('validate_date')) {
  /**
   * Verifica si una fecha coincide con un formato dado
   * @param string $date fecha a verificar.
   * @param string $formato fortamto que deberia cumplir la fecha. Ejemplo 'Y-m-d H:i:s'.
   * ejemplos de uso y retornos:
   * 
   * validateDate('2012-02-28 12:12:12'); # true
   * 
   * validateDate('2012-02-30 12:12:12'); # false
   * 
   * validateDate('2012-02-28', 'Y-m-d'); # true
   * 
   * validateDate('28/02/2012', 'd/m/Y'); # true
   * 
   * validateDate('30/02/2012', 'd/m/Y'); # false
   * 
   * validateDate('14:50', 'H:i'); # true
   * 
   * validateDate('14:77', 'H:i'); # false
   * 
   * validateDate(14, 'H')); # true
   * 
   * validateDate('14', 'H'); # true
   * 
   * validateDate('2012-02-28T12:12:12+02:00', 'Y-m-d\TH:i:sP'); # true
   * 
   * validateDate('2012-02-28T12:12:12+02:00', DateTime::ATOM); # true
   * 
   * validateDate('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O')); # true
   * 
   * validateDate('Tue, 28 Feb 2012 12:12:12 +0200', DateTime::RSS); # true
   * 
   * validateDate('Tue, 27 Feb 2012 12:12:12 +0200', DateTime::RSS); # false
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 2014/11/26
   * @note Requiere los CSS bootstrap y text_style.
   */

  function validate_date($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
  }

}

if (!function_exists('generate_random_string')) {
  /**
   * Genera una String aleatoria con el tamaña y los caracteres espeficicados
   * 
   * @param int $length Es el tamaño del string a generar, por defecto es 10
   * @param string $characters Son los caracteres que puede contener el string
   * generado, por defecto numeros, letras mayusculas y minusculas.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 2014/11/26
   */
  
  function generate_random_string($length = 10, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $randomString = '';
    for ($i = 0; $i < $length; $i++)
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    return $randomString;
  }

}

if (!function_exists('unserialized')) {
  /**
   * Obtiene el valor del elemento indicado de un form serializado enviado
   * por ajax usando Jquery.
   * 
   * @param array $data Es el formulario serializado enviado por ajax.
   * @param string $searched_key Es el nombre del elemento en el formulario
   * del que se desea obtener el valor.
   * @return string El valor del elemento indicado, false si este no existe.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 2014/12/10
   */

  function unserialized($data, $searched_key) {
    for($i=0; $i<count($data);$i++)
      if($data[$i]['name']==$searched_key)
        return $data[$i]['value'];
    return false;
  }

}
?>