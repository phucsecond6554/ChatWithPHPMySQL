<?php
  require('../lib/User_Model.php');

  $user_model = new User_Model();

  $return_data = array();

  if($_POST['password'] !== $_POST['passconf']){
    $return_data['status'] = 'error';
    $return_data['error'] = 'Password không trùng khớp';

    die(json_encode($return_data));
  } // Neu password khong trung khop, viet vay thoi chu khong xay ra truong hop nay vi JS da kiem tra roi

  if($user_model->check_exist($_POST['username'])){
    $return_data['status'] = 'error';
    $return_data['error'] = 'Username đã có người sử dụng';

    die(json_encode($return_data));
  } // Neu ten nguoi dung da duoc su dung

  $userdata = array(
    'name' => $_POST['username'],
    'pass' => password_hash($_POST['password'] , PASSWORD_DEFAULT);
  );

  if($user_model->create($userdata)){
    $return_data['status'] = 'success';

    die(json_encode($return_data));
  }// Neu them du lieu thanh cong
 ?>
