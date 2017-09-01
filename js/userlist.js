// Xu li suggest username theo search key

(function(){
  function get_suggest(search_key){
    $.ajax({
      url : "http://localhost/ChatWithPHPMySQL/process/Get_Suggest.php",
      type : "POST",
      dataType : "json",
      data : {
        search_key : search_key
      },
      success: function(result){
        var html = "<tr>";
        html += "<th>ID </th>";
        html += "<th>Name </th>";
        html += "<th>Chat</th>";
        html += "</tr>";

        $.each(result['data'], function(key, item){
          html += "<tr>";
          html += "<td>" + item['id'] + "</td>";
          html += "<td>" + item['name'] + "</td>";

          // Xu li button chat
          var button = "<form action='Chat.php' method='post'>";
          button += `<input type='hidden' name='user_to' value='${item['id']}'>`;
          button += "<button type='submit' name='button' class='btn btn-primary'>Chat</button>"
          button += "</form>";

          html += "<td>" + button + "</td>";
        }); // Vong lap

        $("#user_table").html(html);

      } // Function success
    });
  }// function get_suggest

  $("#search_input").keyup(function(){
    var search_key = $("#search_input").val();
    get_suggest(search_key);
  });
})();
