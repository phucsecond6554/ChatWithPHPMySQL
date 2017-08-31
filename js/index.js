// Cac hieu ung tai trang chu

(function(){
  // Radio button chuyen doi giua Signin va Signup

  var current_mode = "signin";

  function type_radio_toggle(){
    if(document.getElementById("signin").checked == true){
      $("#passconf_group").hide();
      $("#sign_btn").text("Sign in");
      current_mode = "signin";
    }

    $("#signin").click(function(){
      $("#passconf_group").hide();
      $("#sign_btn").text("Sign in");
      current_mode = "signin";
    });

    $("#signup").click(function(){
      $("#passconf_group").show();
      $("#sign_btn").text("Sign up");
      current_mode = "signup";
    });
  } // Chuyen trang thai khi chon radio

  type_radio_toggle();

  function signin(){
    var myform = document.getElementById("signform");
    var fd = new FormData(myform);
    $.ajax({
        url: "http://localhost/ChatWithPHPMySQL/process/Signin.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(result){
          var json = JSON.parse(result);

          if(json.status == "error"){ // Neu co loi
            $("#error").text(json.error); // Thong bao loi cho nguoi dung
          }else if(json.status == "success"){ // Thanh cong
            window.location = "http://localhost/ChatWithPHPMySQL/User_List.php";
            //alert("HInh nhu dung roi day ban a");
          }
        }
    });
  } // Function signin

  function signup(){
    var myform = document.getElementById("signform");
    var fd = new FormData(myform);
    $.ajax({
        url: "http://localhost/ChatWithPHPMySQL/process/Signup.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'post',
        success: function(result){
          var json = JSON.parse(result);

          if(json.status == "error"){ // Neu co loi
            $("#error").text(json.error); // Thong bao loi cho nguoi dung
          }else if(json.status == "success"){ // Thanh cong
            window.location = "http://localhost/ChatWithPHPMySQL/User_List.php";
          }
        } // Function success
    });
  }; // Function signup


  function match_password(){
    var pass1 = $("#pass1").val();
    var pass2 = $("#pass2").val();

    if(pass1 !== pass2){
      alert("Password không trùng khớp")
      return false;
    }else {
      return true;
    }
  }

  $("#sign_btn").click(function(event){
    event.preventDefault();
    $("#error").text("");

    if(current_mode == "signin"){
      signin();
    }else if(current_mode == "signup"){
      if(match_password()){
        signup();
      }
    }
  });
})();
