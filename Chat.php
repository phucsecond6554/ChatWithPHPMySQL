<?php
  $user_to = $_POST['user_to']; // Luu bien kiem tra dang chat voi ai
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
        <div class="message_box" id="message_box">

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
    });
  </script>
</html>
