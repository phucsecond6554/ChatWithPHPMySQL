<?php
require('Model.php');
  /**
   *
   */
  class User_Model extends Model
  {

    function __construct()
    {
      parent::__construct();
      $this->table = 'all_user';
    }

    function check_exist($username){
      $sql = 'Select count(id) as number from '.$this->table.' where name = '."'".$username."'";

      $query = mysqli_query($this->conn , $sql);

      $data = mysqli_fetch_assoc($query);

      return $data[0]['number'] == 1;
    }
  }

 ?>
