<?php
  function get_date($pattern = 'Y/m/d H:i:s'){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    return date($pattern);
  } // Ham lay thoi gian

  function change_date_format($date, $format){
    return date($format, strtotime($date));
  }

  function remove_xss($string){
    $pattern = '/<[a-zA-Z0-9]{0,}>/';

  return preg_replace($pattern, '<remove>', $string);
  } // Ngan Xss
 ?>
