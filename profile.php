<?php
	include 'databh1.php';
	session_start();
	if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
		header('Location: login.php');
		exit();
	}
	$uid = $_SESSION['uid'];
	$sql = "SELECT dp FROM users WHERE uid = '$uid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$dp = $row['dp'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Exchangeagram - <?php echo $uid;?> </title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <link rel="stylesheet" type="text/css" href="CSS/custom_content.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <meta name="theme-color" content="#1A237E">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style type="text/css">
    	.feedcard{
    		background-color: #FFFFFF;
    		box-shadow: 3px 3px 3px #EDE7F6;
    		min-height: 200px;
    		width: 97%;
		}
    </style>
  </head>
	<body>
		<div class="loader"></div>
		<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #FFFFFF; border: none;">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-left" href="profile.php" style="margin-top: 18px; color: #939393; text-decoration: none; font-size: 20px;"><img src="images/lo2.png" style="height: 40px; width: 40px; margin-right: 1px;"> Exchangeagram</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <div id="custom-search-input">
                                <form class="navbar-form navbar-left" method="POST" action="searchresults.php" id="search">
                                    <div class="input-group">
                                        <input type="text" class="search-query form-control" placeholder="Search" id="query" name="query"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="submit">
                                                <span class=" glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                </div>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <?php
                                if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
                                    if(isset($dp) && !empty($dp)){
                                       echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'><img src='".$dp."' style='width: 20px; height: 20px; border-radius: 50px; margin-right: 10px;'/>" .$_SESSION['uid']."<span class='caret'></span></a>"; 
                                   }else{
                                    echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'><img src='images/alternate2.png' style='width: 20px; height: 20px; border-radius: 50px; margin-right: 10px;'/>" .$_SESSION['uid']."<span class='caret'></span></a>";
                                   }
                                
                                }
                                else{
                                    echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>User<span class='caret'></span></a>";
                                    }
                                    ?>
                                    <ul class="dropdown-menu">
                                    	<li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
        </div>
        <div class="container-fluid back">
        	<div class="container content">
        		<br><br><br><br><br><br><br>
        		<div class="row">
        			<div class="col-sm-5 col-lg-5 col-md-5">
        				<?php
        					if(isset($dp) && !empty($dp)){
        						echo "<img src='".$dp."' style='width: 170px; height: 170px; border-radius: 50px; border:4px solid #0288D1;' class='center-block'/>";
        					}else{
        						echo "<img src='images/alternate2.png' style='width: 170px; height: 170px; border-radius: 50px; border:4px solid #0288D1;' class='center-block'/>";
        					}
        				?>
        			</div>
        			<div class="col-sm-7 col-lg-7 col-md-7">
        				<?php
        					echo "<h2>".$uid."</h2>";
        					$sql = "SELECT id FROM posts WHERE uid = '$uid'";
        					$result = $conn->query($sql);
        					$postsnumber = mysqli_num_rows($result);
        					echo "<br>";
        					echo "<h4 style='display: inline;'>".$postsnumber." Posts</h4>";
        					echo "<a id='addpost' class='bton1' style='margin-left: 30px;'>Post Image</a>";
        					echo "<br><br><br>";
        					echo "<a id='updatedp' class='bton1'>Update Profile Image</a>";
        				?>
        			</div>
        		</div>
        		<br>
        		<hr style="border-width: 3px;">
        		<br>
        		<div class="row">
        			<div class='col-sm-3 col-lg-3 col-md-3'>
        				
        			</div>
        			<div class='col-sm-6 col-lg-6 col-md-6'>
        				<?php
        					if($postsnumber == 0){
        						echo "<p style='color: #636363; text-align: center;'> No Posts Yet </p>";
        					}else{
        					$sql = "SELECT * FROM posts WHERE uid = '$uid' ORDER BY id DESC";
        					$result = $conn->query($sql);
        					while($row = $result->fetch_assoc()){
        						echo "<div class='center-block feedcard'>";
        							echo "<br>";
        							if(isset($dp) && !empty($dp)){
        								echo "<img src='".$dp."' style='width: 40px; height: 40px; border-radius: 50px; display: inline; margin-left: 15px;' class='center-block'/>";
        							}else{
        								echo "<img src='images/alternate2.png' style='width: 40px; height: 40px; border-radius: 50px; display: inline; margin-left: 15px;' class='center-block'/>";
        							}
        							echo "<h4 style='display:inline; margin-left: 15px;'>".$uid."</h4>";
        							echo "<br><br>";
        							$image = $row['image'];
        							echo "<img src='".$image."' style='width: 100%; height: 500px;'/>";
        							echo "<br><br>";
        							if(isset($row['description']) && !empty($row['description'])){
        								$descript = $row['description'];
        								echo "<p style='margin-left: 15px;'>".$descript."</p>";
        							}
        							echo "<br>";
        						echo "</div>";
        						echo "<br>";
        					}
                            echo "<p style='text-align: center;'>No More Posts.</p>";
        				}
        		?>	
        			</div>
        			<div class='col-sm-3 col-lg-3 col-md-3'>
        				
        			</div>
        		</div>

        	</div>
            <br><br><br>
        </div>
        <div class="container-fluid footer" style="background-color: #F5F5F5; margin-bottom: 0px;">
            <div class="container">
                <p style="color: #636363; " class="left"> Exchangeagram.com</p>
                <p style="color: #636363; text-align: right;" class="right">&copySanjay Shanbhag</p>
            </div>
        </div>
        <div id="overlay"></div>
        	<div id="popup">
        		<div class="notihead">
                    <div class="popupcontrols">
                        <span id="popupclose">X</span>
                    </div>
                    <h2 style="text-align: center; color: #EEEEEE;">Update Profile Picture</h2>
                </div>
                <div class="popupcontent">
                    <br>
                    <?php
                        if(isset($dp) && !empty($dp)){
                            echo "<img src='".$dp."' style='height: 140px; width: 140px; border-radius: 50px; border:4px solid #0288D1;' class='center-block'/>";
                        }else{
                            echo "<img src='images/alternate2.png' style='width: 140px; height: 140px; border-radius: 50px; border:4px solid #0288D1;' class='center-block'/>";
                        }
                    ?>
                    <br><br>
                    <form method="POST" action="adddp.php" enctype="multipart/form-data">
                            <input type="file" name="file" class="center-block">
                            <br>
                            <input type="submit" value="Upload" class="bton1 center-block">
                    </form>
                </div>
            </div>
            <div id="popup1">
            	<div class="notihead">
                    <div class="popupcontrols">
                        <span id="popupclose1">X</span>
                    </div>
                    <h2 style="text-align: center; color: #EEEEEE;">Add Post</h2>
                </div>
                <div class="popupcontent">
                    <br><br>
                    <form method="POST" action="addpost.php" enctype="multipart/form-data">
                            <input type="file" name="file" class="bton1 center-block">
                            <br>
                            <h4 style="text-align: center;"> Say Something About this Picture</h4>
                            <textarea placeholder="Say Something Nice." class='center-block' style="resize: none; width: 300px; height: 200px;" id="description" name="description"></textarea>
                            <br>
                            <input type="submit" value="Upload" class="bton1 center-block">
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                // Initialize Variables
                var closePopup = document.getElementById("popupclose");
                var closePopup1 = document.getElementById("popupclose1");
                var overlay = document.getElementById("overlay");
                var popup = document.getElementById("popup");
                var popup1 = document.getElementById("popup1");
                var button = document.getElementById("updatedp");
                var button1 = document.getElementById("addpost");

                closePopup.onclick = function() {
                    overlay.style.display = 'none';
                    popup.style.display = 'none';
                };
                closePopup1.onclick = function() {
                    overlay.style.display = 'none';
                    popup1.style.display = 'none';
                };
                button.onclick = function() {
                    overlay.style.display = 'block';
                    popup.style.display = 'block';
                }
                button1.onclick = function() {
                    overlay.style.display = 'block';
                    popup1.style.display = 'block';
                }
            </script>
        </body>
    </html>
