<?php
if (isset($_GET['q'])) {
	$q = $_GET['q'];
	switch ($q) {
		case 'user':
			if (isset($_GET['id'])) {
                $id     = $_GET['id'];
                $sql    = "DELETE FROM tb_user WHERE id_user='".$id."'";
                $query  = mysqli_query($link,$sql);
                if($query){
                    echo "<script>alert('Data Successfully Deleted');</script>";
                    echo "<script>window.location='?p=karyawan';</script>";
                }else{
                    echo "<script>alert('Data Failed To Delete');</script>";
                    echo "<script>window.location='?p=karyawan';</script>";
                }
            }
			break;
		case 'pembimbing':
			if (isset($_GET['id'])) {
                $id     = $_GET['id'];
                $sql    = "DELETE FROM tb_pembimbing WHERE id_pembimbing='".$id."'";
                $query  = mysqli_query($link,$sql);
                if($query){
                    echo "<script>alert('Data Successfully Deleted');</script>";
                    echo "<script>window.location='?p=pembimbing';</script>";
                }else{
                    echo "<script>alert('Data Failed To Delete');</script>";
                    echo "<script>window.location='?p=pembimbing';</script>";
                }
            }
			break;
		case 'user':
			if (isset($_GET['id'])) {
                $id     = $_GET['id'];
                $sql    = "DELETE FROM tb_user WHERE id='".$id."'";
                $query  = mysqli_query($link,$sql);
                if($query){
                    echo "<script>alert('Data Successfully Deleted');</script>";
                    echo "<script>window.location='?p=dashboard';</script>";
                }else{
                    echo "<script>alert('Data Failed To Delete');</script>";
                    echo "<script>window.location='?p=dashboard';</script>";
                }
            }
			break;
		default:
			include $dir . 'blank.php';
			break;
	}
} else {
	include $dir . 'dashboard.php';
}