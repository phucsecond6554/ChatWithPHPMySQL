<?php
  require('../lib/Message_Model.php');
  require('../lib/User_Model.php');
  require('../lib/lib.php');
  session_start();

  $mess_model = new Message_Model();
  $user_model = new User_Model();

  $mess_data = array(
    'from_user' => $_SESSION['id'],
    'to_user' => $_POST['to_user'],
    'content' => remove_xss($_POST['content']),
    'send_time' => get_date()
  );

  if($mess_model->create($mess_data)){
    $status = 'success';
  }else {
    $status = 'error';
  }

  $update_mess = $mess_model->get_message($mess_data['from_user'], $mess_data['to_user']);

  die(json_encode(
    array(
    'status' => $status,
    'data' => $update_mess,
    'user_from' => $user_model->get_username($mess_data['from_user']),
    'user_to' => $user_model->get_username($mess_data['to_user'])
  )));
 ?>
