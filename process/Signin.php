<?php
  require('../lib/User_Model.php');
  session_start();

  $user_model = new User_Model();

  $return_data = array();

  $username = $_POST['username']; // Username nguoi dung nhap vao

  if(!$user_model->check_exist($username)){ // Neu khong ton tai ten nguoi dung do
    $return_data['status'] = 'error';
    $return_data['error'] = 'Tên người dùng hoặc mật khẩu không đúng';

    die(json_encode($return_data));
  }

  $data = $user_model->get_where("name = '$username'"); //Lay thong tin username nguoi dung nhap vao

  if(!password_verify($_POST['password'], $data[0]['pass'])){ // Password khong dung
    $return_data['status'] = 'error';
    $return_data['error'] = 'Tên người dùng hoặc mật khẩu không đúng';

    die(json_encode($return_data));
  }else {
    $return_data['status'] = 'success';

    $_SESSION['username'] = $data[0]['name'];
    $_SESSION['id'] = $data[0]['id']; // Luu session

    die(json_encode($return_data));
  }
 ?>
