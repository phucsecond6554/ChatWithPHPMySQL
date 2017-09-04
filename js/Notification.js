(function(){
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

          $("#noti_table").html(html);
        }
      });
    } // Function update_noti

    setInterval(update_noti(), 1000);
})();
