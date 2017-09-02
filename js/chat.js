// Xu li trang chat.php

var old_height = $("#message_box")[0].scrollHeight;

function print_message(result, user_to){
  var html = "";

  $.each(result['data'], function(key, item){
    if(item['from_user'] !== user_to){ // Neu tin nhan la cua minh
      html += "<div class ='mess me'>";
      html += "<i>" + result['user_from'] + "</i>";
      html += "<p>" + item['content'] + "</p>";
      html += "</div>";
    }else {
      html += "<div class ='mess other'>";
      html += "<i>" + result['user_to'] + "</i>";
      html += "<p>" + item['content'] + "</p>";
      html += "</div>";
    }
  }); // Vong lap

  $("#message_box").html(html);

  if($("#message_box")[0].scrollHeight > old_height){
    $("#message_box").scrollTop($("#message_box")[0].scrollHeight);
    old_height = $("#message_box")[0].scrollHeight;
  }

} // Function print_message khi lay du lieu thanh cong

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
      print_message(result, user_to);
    }
  });
}; // Function add_message

function update_message(user_to){
  $.ajax({
    url : "http://localhost/ChatWithPHPMySQL/process/Update_Message.php",
    type : "POST",
    dataType: "json",
    data : {
      to_user : user_to
    },
    success : function(result){
      print_message(result, user_to);
    }
  });
}; // Function update_message
