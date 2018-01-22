<?php 
session_start(); 
include 'databh1.php';

if(isset($_COOKIE['connected']) && !empty($_COOKIE['connected'])){
	$token = $_COOKIE['connected'];
	$sql = "DELETE FROM user_tokens WHERE token = '$token'";
	$result = $conn->query($sql);
	setcookie("connected", "", time() - 3600);
}
session_destroy();
if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
	header('Location: login.php');
	die();
}else{
	header('Location: login.php');
}
	?>
