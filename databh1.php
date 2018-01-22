<?php
	$conn = mysqli_connect("localhost", "root", "", "exchangeagram");
	if(!$conn){
		die("Connection Failed ". mysqli_connect_error());
	}
?>