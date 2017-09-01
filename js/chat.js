// Xu li trang chat.php

function add_message(user_to){
  $.ajax({
    url : "http://localhost/ChatWithPHPMySQL/process/Add_Message.php",
    type : "POST",
    dataType: "json",
    data : {
      to_user : user_to,
      content : $("#chat_content").val()
    },
    success : function(result){
      var html = "";

      $.each(result['data'], function(key, item){
        if(item['from_user'] !== user_to){ // Neu tin nhan la cua minh
          html += "<div class ='mess me'>";
          html += "<i>" + result['user_from'] + "</i>";
          html += "<p>" + item['content'] + "</p>";
          html += "</div>";
        }else {
          html += "<div class ='mess other'>";
          html += "<i>" + item['user_from'] + "</i>";
          html += "<p>" + item['content'] + "</p>";
          html += "</div>";
        }
      }); // Vong lap

      $("#message_box").html(html);

      console.log(result);
    }
  });
};
