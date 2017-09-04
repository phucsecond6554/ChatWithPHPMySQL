<?php
  require('lib/Message_Model.php');
  require('lib/User_Model.php');
  session_start();

  if(!isset($_SESSION['username'])){
    // Neu chua dang nhap
    header('Location: index.php'); // Chuyen ve trang chu
    ///die('Chua dang nhap');
  }

  $mess_model = new Message_Model();
  $user_model = new User_Model();

  $miss_message = $mess_model->find_miss_message($_SESSION['id']); // Tim nhung tin nhan bo lo

  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    $username =
    die(json_encode(array('data'=>$miss_message)));
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Notification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  </head>
  <body>
    <h1>Những người đã nhắn cho bạn</h1>
    <table class="table" id="noti_table">
      <tr>
        <th>Tên người nhắn</th>
        <th>Reply</th>
      </tr>

      <?php
        if(count($miss_message) == 0){
          echo '<h5>Hiện không có tin nhắn nào cho bạn';
        }else
        {
          foreach($miss_message as $data){
      ?>
        <tr>
          <td><?php echo $data['name'] ?></td>
          <td>
            <form action="Chat.php" method="post">
              <input type="hidden" name="user_to" value="<?php echo $data['from_user'] ?>">
              <button type="submit" name="button" class="btn btn-primary">Chat</button>
            </form>
          </td>
        </tr>
      <?php } }?>
    </table>

    <a href="User_List.php" class="btn btn-primary">Tìm bạn bè</a>
  </body>

  <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script src="js/Notification.js"></script>
</html>
