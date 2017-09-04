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

    function find_miss_message($to){
      // Tim nhung tin nhan co to_user la cua minh va trang thai la not_seen
      $sql = "Select m.from_user, u.name from message m join all_user u on m.from_user = u.id";
      $sql .= " where m.state = 'not_seen' and m.to_user = $to group by from_user";

      $data = array();

      $query = mysqli_query($this->conn, $sql);

      if($query){
        while($row = mysqli_fetch_assoc($query)){
          $data[] = $row;
        }
      }

      return $data;
    } // find_miss_message: Tim nhung tin nhan gui toi nhung chua xem
  }

 ?>
