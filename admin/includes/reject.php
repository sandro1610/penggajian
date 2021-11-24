<?php 
include "../../includes/config.php";
session_start();
if (isset($_GET['v_key'])){
	$v_key = $_GET['v_key'];
	$sql = mysqli_query($link,"SELECT * FROM `tb_umkm` WHERE v_key = '$v_key'");
	if ($sql) {
		$query = mysqli_query($link,"UPDATE tb_umkm SET status = '0' WHERE v_key = '$v_key'");
		if ($query) {
			echo "<script>alert('UMKM TIdak Aktif');</script>";
			echo "<script>window.location='../index.php?p=dashboard';</script>";
		}
	}
}

?>