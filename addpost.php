<?php
	session_start();
	include 'databh1.php';
	if(isset($_FILES['file'])){
		$file = $_FILES['file'];
	

		$id = $_SESSION['uid'];
		//File Properties
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];

		//Working out the file extension.
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));

		$allowed = array('jpg', 'png', 'bmp');

		if(in_array($file_ext, $allowed)){
			if($file_error === 0){
				$file_name_new = uniqid('', true) . '.' . $file_ext;
				$file_destination = 'posts/' . $file_name_new;
				
				if(move_uploaded_file($file_tmp, $file_destination)){
					if(isset($_POST['description']) && !empty($_POST['description'])){
						$description = $_POST['description'];
						$sql = "INSERT INTO posts(uid,image,description) VALUES('$id','$file_destination','$description')";
						$result = $conn->query($sql);
					}else{
						$sql = "INSERT INTO posts(uid,image) VALUES('$id','$file_destination')";
						$result = $conn->query($sql);
					}
					header('Location: profile.php');
				}else{
					header('Location: error.php');
				}
			}
		}else{
			header('Location: error.php');
		}
	}else{
		header('Location: error.php');
	}