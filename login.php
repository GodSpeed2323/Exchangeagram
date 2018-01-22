<?php
  session_start();
  include 'databh1.php';
  if(isset($_COOKIE['connected']) && !empty($_COOKIE['connected'])){
    $token = $_COOKIE['connected'];
    $sql = "SELECT * FROM user_tokens WHERE token = '$token'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $num = mysqli_num_rows($result);
    if($num >= 1){
        $length = 20;
        $uid = $row['uid'];
        $token1 = bin2hex(random_bytes($length));
        setcookie("connected", $token1, time() + 2592000);
        $sql = "UPDATE user_tokens SET token = '$token1' WHERE uid = '$uid'";
        $result = $conn->query($sql);
        $_SESSION['uid'] = $uid;
        header('Location: profile.php');
        exit();
    }
  }
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
  margin-left: 10px; 
  display: inline;
}

      </style>
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
            <br><h2 style="text-align: center; color: #D50000"><img src="images/lo2.png" style="width: 50px; height: 50px; position: relative; top: -5px; margin-right: 10px;"/>Exchangeagram Login</h2>
            <br><br>
            <form class="form-horizontal" action="process.php" method="POST">
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
                <div style="text-align: center;">
                    <div class="form-group">
                        <input type = "checkbox" name="remember" value="remember" id="remember" style="display: inline;"/> <label style="color: #636363;">Remember Me</label>
                    </div>
                </div>
                <div class="form-group">        
                    
                    <button type="submit" class="btn btn-default center-block">Submit</button>
                </div>
            </form>
            <br>
             <div style="text-align: center;">
                <h4 style="color: #26C6DA; display: inline;"> Don't have an account yet?</h4>
                <a href="signup.php">Create a free account. </a>
            </div>
            <br>
            <?php
                if(isset($_GET['error']) && !empty($_GET['error'])){
                    echo "<p style='text-align: center; color: #BF360C;'><img src='images/error.png' style='width: 20px; height: 20px; margin-right: 10px;'/>Wrong Credentials!</p>";
                }
            ?>
        </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-md-3">
        </div>
    </div>
   </div>
</div>
</body>
</html>