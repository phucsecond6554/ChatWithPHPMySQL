<?php
  require('lib/Message_Model.php');
  require('lib/User_Model.php');

  session_start();

  $user_to = $_POST['user_to']; // Luu bien kiem tra dang chat voi ai

  $mess_model = new Message_Model();
  $user_model = new User_Model();

  $mess_data= $mess_model->get_message($_SESSION['id'], $user_to);

  $user_from_name = $user_model->get_username($_SESSION['id']); // Lay ten cua nguoi dung (tai luu id khong luu ten)
  $user_to_name = $user_model->get_username($user_to);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="main_box">
        <h1><?php echo $user_from_name ?></h1>
        <div class="message_box" id="message_box">
          <?php
            foreach($mess_data as $message){
              if($message['from_user'] == $_SESSION['id']){ // Neu tin nhan la cua minh
                echo "<div class='mess me'>";
                echo '<i>' . $user_from_name . '</i>';
                echo '<p>' . $message['content'] .'</p>';
                echo '</div>';
              }else {
                echo "<div class='mess other'>";
                echo '<i>' . $user_to_name . '</i>';
                echo '<p>' . $message['content'] .'</p>';
                echo '</div>';
              }
            }
           ?>
        </div>
        </div> <!--Message box-->

        <div class="input_box">
          <input type="text" name="chat_content" id="chat_content" class="form-control">
          <button type="button" class="btn btn-primary" id="send_btn">Send</button>
        </div>
      </div> <!--Main box -->
    </div>
  </body>

  <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="js/chat.js"></script>
  <script>
    $("#send_btn").click(function(){
      var user_to = "<?php echo $user_to ?>";
      add_message(user_to);
      $("#chat_content").val("");
    }); // Nhan nut send

    $("#chat_content").keypress(function(event){
      if(event.which == 13){
        var user_to = "<?php echo $user_to ?>";
        add_message(user_to);
        $("#chat_content").val("");
      }
    }); // Khi nhan enter

    setInterval(function(){
      var user_to = "<?php echo $user_to ?>";
      update_message(user_to);
    }, 1000); // Xu li realtime

    $("#message_box").scrollTop($("#message_box")[0].scrollHeight); // Luon cuon cuoi tin nhan
  </script>
</html>
