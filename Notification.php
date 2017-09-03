<?php
  require('lib/Message_Model.php');
  require('lib/User_Model.php');
  session_start();

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

      <?php foreach($miss_message as $data){ ?>
        <tr>
          <td><?php echo $data['name'] ?></td>
          <td>
            <form action="Chat.php" method="post">
              <input type="hidden" name="user_to" value="<?php echo $data['from_user'] ?>">
              <button type="submit" name="button" class="btn btn-primary">Chat</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </table>
  </body>

  <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script>
  function update_noti(){
      $.ajax({
        url : "http://localhost/ChatWithPHPMySQL/Notification.php",
        type : "POST",
        dataType : "json",
        success: function(result){
          var html = "<tr>";
          html += "<th>Tên người nhắn </th>";
          html += "<th>Reply</td>";
          html += "</tr>";

          $.each(result['data'] , function(key, item){
            html += "<tr>";
            html += "<td>" + item['name'] + "</td>";

            // Xu li button chat
            var button = "<form action='Chat.php' method='post'>";
            button += `<input type='hidden' name='user_to' value='${item['from_user']}'>`;
            button += "<button type='submit' name='button' class='btn btn-primary'>Chat</button>"
            button += "</form>";

            html += "<td>" + button + "</td>";
            html += "</tr>";
          });// Vong lap

          //$("#noti_table").html(html);
        }
      });
    } // Function update_noti

    setInterval(update_noti(), 1000);
  </script>
</html>
