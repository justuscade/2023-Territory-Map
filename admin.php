



<?php
session_start();
$loc='http://' . $_SERVER['HTTP_HOST'];
if(isset($_SESSION['VA_ADMIN'])){
    header("Location:".$loc. "/2023-Territory-Map/admin_home.php");
}
?>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/login.css"/>

</head>
<body>
<div id="wrapper" style="margin-top:10%;">

<div id="login_form">
<h2>VA TERRITORY MAP<br> ADMIN LOGIN</h2>
 <p id="login_label">Please Enter Your Provided Credentials</p>
 <form id="login-form">
  <input type="text" name="vausername" id="vausername" placeholder="Enter Username">
  <br>
  <input type="password" name="vapassword" id="vapassword" placeholder="***********">
  <br>
  <input type="button" name="login" value="LOGIN" id="login_button" onclick="do_login()">
 </form>
 <div id="errormessage"></div>
 <p id="loading_spinner"><img src="assets/img/loader1.gif"></p>
</div>

</div>
</body>
</html>


<script>
    function do_login()
    {
     var username=$("#vausername").val();
     var pass=$("#vapassword").val();
     if(username!="" && pass!="")
     {
      $("#loading_spinner").css({"display":"block"});
      $.ajax({
      type:'post',
      url:'services/login.php',
      data:{
       do_login:"do_login",
       vausername:username,
       vapassword:pass
      },
      success:function(response) {
        console.log(response);
        console.log(JSON.parse(response));
      if(JSON.parse(response)=="success")
      {
        window.location.href="admin_home.php";
      }
      else
      {
        $("#loading_spinner").css({"display":"none"});
        $("#errormessage").html("<h6 style='color: red'>Failed to loging wrong username or password</h6>");
      }
      }
      });
     }
    
     else
     {
      $("#errormessage").html("<h6 style='color: red'>Please Fill All The Details</h6>");
     }
    
     return false;
    }
    </script>