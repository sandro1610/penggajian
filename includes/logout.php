<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password']) && empty($_SESSION['id_user'])) {
    header("Location:../login.php");
} 
	if(session_destroy()){
		echo "<script>alert('Logout Success');</script>";
		echo "<script>window.location='../index.php';</script>";
	}
?>