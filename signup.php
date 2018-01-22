<?php
  session_start();
  include 'databh1.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Exchangeagram </title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <meta name="theme-color" content="#1A237E">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
      <style>
        .logbox{
            background-color: #FFFFFF;
            vertical-align: middle;
            border-radius: 10px;
            box-shadow: 4px 4px 4px #999;
            width: 85%;
            min-height: 500px;
            vertical-align: middle;
        }
        .backBuffer{
            width: 100%;
            height: 100%;
    background-color: #ECEFF1;
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    position: fixed; 
    bottom: 0px;

}
a{
  color: #03A9F4;
}
a:hover{
  color: #26C6DA;
  text-decoration: none; 
  display: inline;
}

      </style>
        <script type="text/javascript">
            function loadDoc(){
                document.getElementById('resudiv').innerHTML = "";
                var name = $("#name");
                var email = $("#email");
                var pwd = $("#pwd");
                var uid = $("#uid");
                var url = "createuser.php";
                $.post(url,{name1: name.val(), email1: email.val(), pwd1: pwd.val(), uid1: uid.val()}, function(data){
                    $('.resudiv').append(data);
                });
            }
      </script>
    </head>
<body>


          <div class="container-fluid backBuffer" style="padding: 0px;">
          <div class="container">
  <br><br><br><br>
        <div class="row">
            <div class="col-sm-3 col-lg-3 col-md-3">
            </div>
            <div class="col-sm-6 col-lg-6 col-md-6">
        <div class="center-block logbox">
            <br><h2 style="text-align: center; color: #D50000"><img src="images/lo2.png" style="width: 50px; height: 50px; position: relative; top: -5px; margin-right: 10px;"/>Exchangeagram Signup</h2>
            <br><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <label class="control-label" for="email" style="margin-left: 50px; color: #3949AB;">Name:</label>
                        </div>
                        <div class="col-sm-7 col-lg-7 col-md-7">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <label class="control-label" for="email" style="margin-left: 50px; color: #3949AB;">E-Mail:</label>
                        </div>
                        <div class="col-sm-7 col-lg-7 col-md-7">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-Mail" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <label class="control-label" for="email" style="margin-left: 50px; color: #3949AB;">Username:</label>
                        </div>
                        <div class="col-sm-7 col-lg-7 col-md-7">
                            <input type="text" class="form-control" name="uid" id="uid" placeholder="Enter User ID" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <label class="control-label" for="pwd" style="margin-left: 50px; color: #3949AB;">Password:</label>
                        </div>
                        <div class="col-sm-7 col-lg-7 col-md-7">          
                             <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">        
                    <div style="text-align: center;">
                        <p onclick="loadDoc()" class="btn btn-default">Create Account</p>
                    </div>
                </div>
            <br>
             <div style="text-align: center;">
                <h4 style="color: #26C6DA; display: inline;"> Already have an account yet?</h4>
                <a href="login.php">Login!. </a>
            </div>
            <br>
            <div id="resudiv" class="resudiv">
            </div>
        </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-md-3">
        </div>
    </div>
   </div>
</div>
<br><br>
</body>
</html>