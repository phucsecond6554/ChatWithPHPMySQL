<?php
require('Model.php');
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
  }

 ?>
