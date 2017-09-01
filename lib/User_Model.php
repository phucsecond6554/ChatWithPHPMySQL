<?php
require_once('Model.php');
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

      return $data['number'] == 1;
    } // check_exist function

    function get_username($id){
      $sql = 'Select name from '.$this->table.' where id = '.$id;

      $query = mysqli_query($this->conn, $sql);

      $data = mysqli_fetch_assoc($query);

      return $data['name'];
    }// function get_username
  }

 ?>
