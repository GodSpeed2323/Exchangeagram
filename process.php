<?php
	session_start();
	include 'databh1.php';
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];

	$sql = "SELECT pwd,uid FROM users WHERE uid = '$uid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$pwd1 = $row['pwd'];
		if(password_verify($pwd, $pwd1)){
			if(isset($_POST['remember'])){
				$length = 20;
				$token = bin2hex(random_bytes($length));
				setcookie("connected", $token, time() + 2592000);
				$_COOKIE['connected'] = $token;
				$sql1 = "INSERT INTO user_tokens(uid,token) VALUES('$uid', '$token')";
				$result1 = $conn->query($sql1);
			}
			$_SESSION['uid'] = $row['uid'];
			header('Location: profile.php');
		}
		else{
			$a = 1;
			header('Location: login.php?error='.$a);
		}
?>