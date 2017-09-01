<?php
require_once('Model.php');
  /**
   *
   */
  class Message_Model extends Model
  {

    function __construct()
    {
      parent::__construct();
      $this->table = 'message';
    }

    function get_message($from , $to){
      $sql = 'Select * from '.$this->table." where from_user in($from, $to) and to_user in($from, $to) ";
      $sql .= 'order by send_time asc';

      $query = mysqli_query($this->conn, $sql);

      $data = array();

      if($query){
        while ($row = mysqli_fetch_assoc($query)) {
          $data[] = $row;
        }
      } // Neu thanh cong co du lieu

      return $data;
    } // Function get_message
  }

 ?>
