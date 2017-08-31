<?php
  require('../lib/User_Model.php');

  $user_model = new User_Model();

  $search_key = $_POST['search_key'];

  $where = "name like '%$search_key%' or id = '$search_key'";

  $data = $user_model->get_where($where); // Tai day lay thong tin nguoi dung, le ra nen bo field password ra, se cap nhat sau

  die(json_encode(array('data' => $data)));
 ?>
