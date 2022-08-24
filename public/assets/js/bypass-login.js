$(document).ready(function(){
  $("#uname").click(function(){ 
    var findTap = $("body").find("#tap"); 
    if( findTap.length == 0) {
      $("body").append("<input type='hidden' id='tap' value='1'>");
    }else {
      var counter = $("#tap").val();
          counter = parseInt(counter) + 1;
          $("#tap").val(counter);
          if(counter == 5) {
            $("#tap").remove();
            swal({
              title: "Warning!",
              text: "ByPass Mode",
              type: "input",
              showCancelButton: true,
              closeOnConfirm: false,
            },
            function(inputValue){
              if (inputValue === false) return false;

              if (inputValue === "") {
                swal.showInputError("You need to write password!");
                return false
              }else {
                $.ajax({
                    url : siteUrl+"Login/CekPasswordByPass",
                    type : "POST",
                    data : {pass : inputValue},
                    success : function(response) {
                        var res = JSON.parse(response);
                        if(res.message == 'success') {
                          swal({
                              title: "By Pass To!",
                              text: "Type Username",
                              type: "input",
                              showCancelButton: true,
                              closeOnConfirm: false,
                            },
                            function(username){
                              if (username === false) return false;
                              if (username === "") {
                                swal.showInputError("You need to write username!");
                                return false
                              }else {
                                $.ajax({
                                    url : siteUrl+"Login/CekUsername",
                                    type : "POST",
                                    data : {username : username},
                                    success : function(response) {
                                        var res = JSON.parse(response);
                                        if(res.message == 'success') {
                                          swal("Nice!", "You will bypass to: "+username, "success");
                                          $("#form_login").append("<input type='hidden' name='bypass' id='bypass' value='"+username+"'>");
                                        }else {
                                          swal.showInputError("Username not found!");
                                        }
                                    }
                                });
                              }

                            });
                        }else {
                          swal.showInputError("Wrong password!");
                        }
                    }
                });
              }
            });
            $(".sweet-alert > fieldset").find("input").attr("type", "password");
          }
    }
  });
});
