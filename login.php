<!-- login page -->
<?php
// start session
session_start();
include 'connection/connection.php';

if (isset($_SESSION['hitek_admin'])) {
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HiTek: Chatbot Admin</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/css/sweetalert.min.css" rel="stylesheet" />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
              <!-- fot the logo -->
              <!-- <img src="assets/img/logo.png" style="width:15%;"> -->
                <h2 class=""><b style="color: #428bca;">HiTek</b>-Chatbot
                <br
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" action="php/login.php" method="post">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                      <!-- username input -->
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="username form-control" placeholder="Your Username " name="Username" required />
                                        </div>
                                        <!-- password input -->
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="password form-control"  placeholder="Your Password" name="Password" required />
                                        </div>
                                     <!-- login button -->
                                     <button type="button" onclick="validateSignIn()" class="btn btn-primary ">Login Now</button
                                        >
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    // for enter
    $('.password, .username').keypress(function(e){
      if (e.keyCode == 13){
        validateSignIn();
      }
    });
  });

  function validateSignIn(){
    // validate if username and password is not empty
    var username = $('.username').val();
    var password = $('.password').val();

    if ((username == '') || (password == '')){
      swal({
        title: 'Login Failed',
        text: 'Username and Password cannot be empty.',
        type: 'error'
      }, function(){
        window.location = 'login.php';
      });
    }else{
      signIn(username, password);
    }
  }

  function signIn(username, password){
    // sign in
    $.ajax({
      url: "php/login.php",
      type: "POST",
      data: {"username": username, "password": password},
      success: function(result){
        if (result == "1"){
          // sign in successful
          swal({
            title: 'Successfully Login',
            text: 'Welcome '+username,
            type: 'success'
          }, function(){
            window.location = 'index.php';
          });
        }else {
          // login failed
          swal({
            title: 'Login Failed',
            text: 'Login Credentials did not match any records.',
            type: 'error'
          }, function(){
            window.location = 'login.php';
          });
        }
      }
    });
  }
</script>