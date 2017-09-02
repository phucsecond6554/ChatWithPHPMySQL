<?php
require('../lib/Message_Model.php');
require('../lib/User_Model.php');
require('../lib/lib.php');
session_start();

$mess_model = new Message_Model();
$user_model = new User_Model();

$update_mess = $mess_model->get_message($_SESSION['id'], $_POST['to_user']);

die(json_encode(
  array(
  'data' => $update_mess,
  'user_from' => $user_model->get_username($_SESSION['id']),
  'user_to' => $user_model->get_username($_POST['to_user'])
)));
 ?>
