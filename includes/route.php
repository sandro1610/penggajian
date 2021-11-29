<?php
session_start();
include 'config.php';
date_default_timezone_set("Asia/Jakarta");
$id_user = $_SESSION['id_user'];
$tanggal = date("Y-m-d");
$jam = date('H:i:s');
$status = '';
if (isset($_POST['absen'])) {
    $sql = mysqli_query($link, "INSERT INTO `tb_absen` (`id_absen`, `user_id`, `tanggal`, `datang`) VALUES (NULL, '$id_user', '$tanggal', '$jam')");
    $sql1 = mysqli_query($link, "SELECT * FROM tb_user WHERE id_user = '$id_user'");
    $result = mysqli_fetch_array($sql1);
    $transport = $result['transport'];
    $gaji = $result['gaji'];
    $periode = date('m');
    $sql = "SELECT * FROM tb_gaji WHERE periode = '$periode' AND user_id = '$id_user'";
    $query = mysqli_query($link, $sql);
    $hasil = mysqli_fetch_array($query);
    $check = mysqli_num_rows($query);
    if ($check == 0) {
        $insert_gaji = mysqli_query($link, "INSERT INTO `tb_gaji` (`id_gaji`, `user_id`, `total_gaji`, `transport`, `periode`) VALUES (NULL, '$id_user','$gaji', '$transport', '$periode')");
        $update_absen = mysqli_query($link, "UPDATE `tb_absen` SET `transport` = '$transport', `status` = '1' WHERE tanggal = '$tanggal' AND user_id = '$id_user'");
        if ($update_absen && $insert_gaji) {
            echo "<script>alert('Data Successfully Send');</script>";
            echo "<script>window.location='../?p=home';</script>";
        } else {
            echo "<script>alert('Data Failed to Save');</script>";
        }
    } elseif ($check == 1) {
        $update_absen = mysqli_query($link, "UPDATE `tb_absen` SET `transport` = '$transport', `status` = '1' WHERE tanggal = '$tanggal' AND user_id = '$id_user'");
        $transport = $hasil['transport']+$transport;
        $update_gaji = mysqli_query($link, "UPDATE `tb_gaji` SET `transport` = '$transport' WHERE periode = '$periode' AND user_id = '$id_user'");
        if ($update_absen && $update_gaji) {
            echo "<script>alert('Data Successfully Send');</script>";
            echo "<script>window.location='../?p=home';</script>";
        } else {
            echo "<script>alert('Data Failed to Save');</script>";
        }
    }
}

if (isset($_POST['izin'])) {
    $tanggal_izin = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $sql = mysqli_query($link, "INSERT INTO `tb_izin` (`id_izin`, `user_id`, `tanggal`, `keterangan`) VALUES (NULL, '$id_user', '$tanggal_izin', '$keterangan')");
    if ($sql) {
        echo "<script>alert('Data Successful Send');</script>";
        echo "<script>window.location='../?p=home';</script>";
    } else {
        echo "<script>alert('Data Failed to Save');</script>";
    }
}

