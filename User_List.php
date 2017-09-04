<?php
  require('lib/User_Model.php');
  session_start();

  if(!isset($_SESSION['id'])){
    // Neu chua dang nhap
    header('Location : index.php'); // Chuyen ve trang chu
  }

  $user_model = new User_Model();

  $user_list = $user_model->get_where();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Danh sach nguoi dung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <input type="search" name="search_key" id="search_input" class="form-control" placeholder="Search">

      <div class="list" id="list">
        <table class="table table-striped" id="user_table">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Chat</th>
          </tr>

          <?php foreach($user_list as $item){ ?>
            <tr>
              <td><?php echo $item['id'] ?></td>
              <td><?php echo $item['name'] ?></td>
              <td>
                <form action="Chat.php" method="post">
                  <input type="hidden" name="user_to" value="<?php echo $item['id'] ?>">
                  <button type="submit" name="button" class="btn btn-primary">Chat</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div> <!-- List -->
    </div> <!-- Container -->
  </body>

  <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script src="js/userlist.js"></script>
</html>
