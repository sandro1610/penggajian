<?php 
require 'config.php';
if (isset($_POST["login"]) ){ 
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$email' ");
	if (mysqli_num_rows($query) == 1) {
		if ($result = mysqli_fetch_assoc($query)) {
			if (password_verify($password, $result["password"])) {
				session_start();
					$_SESSION['id_user'] = $result["id_user"];
					$_SESSION['email'] = $result["email"];
					$_SESSION['nama'] = $result["nama"];
					$_SESSION['jabatan'] = $result["jabatan"];
	                $_SESSION['password'] = $result["password"];
	                $_SESSION['level'] = $result["level"];
                    if ($_SESSION['level'] == 'Admin') {
						echo "<script>alert('Login Success');</script>";
						echo "<script>window.location='../admin/index.php';</script>";
					} elseif ($_SESSION['level'] == 'User') {
						echo "<script>alert('Login Success');</script>";
						echo "<script>window.location='../index.php';</script>";
					}
			}else{
				echo "<script>alert('Wrong Password');</script>";
                echo "<script>window.location='../index.php?p=login';</script>";
			}
		}
	}else{
		echo "<script>alert('User 0');</script>";
		echo "<script>window.location='../index.php?p=login';</script>";
	}
}
