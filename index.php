<?php
  session_start();

  if(isset($_SESSION['username'])){ // Neu da dang nhap
    header('Location: Notification.php'); // Chuyen qua danh sach nguoi dung
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Chương trình chat đơn giản bằng PHP và MySQL</h1>

      <div class="sign_form" id="sign_form">
        <h5 class="text-center">Tài khoản của bạn</h5>

        <form id="signform">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div> <!--Username -->

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="pass1" required>
          </div> <!-- Password -->

          <div class="form-group" id="passconf_group">
            <label for="passconf">Password Confirmation</label>
            <input type="password" name="passconf" class="form-control" id="pass2" required>
          </div> <!--Password Comfirmation -->

          <div class="form-group">
            <label>Bạn đăng ký hay đăng nhập</label>
            <input type="radio" name="type" value="signin" id="signin" checked> Sign in
            <input type="radio" name="type" value="signup" id="signup"> Sign up
          </div> <!--Type -->

          <i id="error" style="display:block"></i>

          <button type="button" name="button" id="sign_btn" class="btn btn-default">Sign in</button>
        </form>
      </div> <!--Sign form-->
    </div> <!--Container-->
  </body>

  <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script src="js/index.js">

  </script>
</html>
