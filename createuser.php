<?php
	include 'databh1.php';
	session_start();
	$name = $_POST['name1'];
	$email = $_POST['email1'];
	$uid = $_POST['uid1'];
	$pwd = $_POST['pwd1'];
	if(empty($_POST['name1']) || empty($_POST['email1']) || empty($_POST['uid1']) || empty($_POST['pwd1'])){
		echo "<p style='text-align: center; color: #BF360C;'><img src='images/error.png' style='width: 20px; height: 20px; margin-right: 10px;'/>Please fill out all the fields.</p>";
	}else{
		$sql = "SELECT id FROM users WHERE uid = '$uid'";
		$result = $conn->query($sql);
		$num = mysqli_num_rows($result);
		if($num>0){
			echo "<p style='text-align: center; color: #BF360C;'><img src='images/error.png' style='width: 20px; height: 20px; margin-right: 10px;'/>The Username is Already Taken. Please Choose Another One.</p>";
		}else{
			$hash = password_hash($pwd, PASSWORD_BCRYPT);
			$sql = "INSERT INTO users(uid, name, eml, pwd) VALUES('$uid', '$name', '$email', '$hash')";
			$result = $conn->query($sql);
			echo "<p style='text-align: center; color: #1B5E20;'><img src='images/done.png' style='width: 20px; height: 20px; margin-right: 10px;'/>Congratulations! You Account has been Created. Login to continue.</p>";
		}
		
	}
	
?>