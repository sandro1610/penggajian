<?php
include "../../includes/config.php";
session_start();
if (isset($_POST['izinkan'])) {
    $id_izin = $_POST['id_izin'];
    $sql = mysqli_query($link, "UPDATE `tb_izin` SET `status` = '2' WHERE `tb_izin`.`id_izin` = $id_izin");
    if ($sql) {
        $query_izin = "SELECT * FROM `tb_izin` WHERE `id_izin` = $id_izin";
        $query = mysqli_query($link, $query_izin);
        $hasil = mysqli_fetch_array($query);
        $user_id = $hasil['user_id'];
        $tanggal_izin = $hasil['tanggal'];
        $query_absen = "SELECT * FROM tb_absen WHERE tanggal = '$tanggal_izin' AND user_id = '$user_id'";
        $query = mysqli_query($link, $query_absen);
        $hasil = mysqli_fetch_array($query);
        $check = mysqli_num_rows($query);
        $jumlah_time = 9;
        $sql1 = mysqli_query($link, "SELECT * FROM tb_user WHERE id_user = '$user_id'");
        $result = mysqli_fetch_array($sql1);
        $total_gaji_hari = $jumlah_time * $result['gaji_perjam'];
        $date = date('m',strtotime($tanggal_izin));
        if ($check == 0) {
            $insert_absen = mysqli_query($link, "INSERT INTO `tb_absen` (`id_absen`, `user_id`, `tanggal`, `datang`, `pulang`, `total_gaji_hari`, `status`) VALUES (NULL, '$user_id', '$tanggal_izin', '08:00:00', '17:00:00', '$total_gaji_hari', '1')");
            $update_gaji = mysqli_query($link, "UPDATE tb_gaji SET tb_gaji.total_gaji = tb_gaji.total_gaji + $total_gaji_hari WHERE tb_gaji.periode = $date AND tb_gaji.user_id = $user_id");
            if ($insert_absen && $update_gaji) {
                echo "<script>alert('Data Successful Send');</script>";
                echo "<script>window.location='../?p=izin';</script>";
            } else {
                echo "<script>alert('Data Failed to Save');</script>";
                echo "<script>window.location='../?p=izin';</script>";
            }
        } else if ($check == 1) {
            $update_absen = mysqli_query($link, "UPDATE `tb_absen` SET `datang` = '08:00:00', `pulang` = '17:00:00', `total_gaji_hari` = '$total_gaji_hari', `status` = '1' WHERE tanggal = '$tanggal_izin' AND user_id = '$user_id'");
            $update_gaji = mysqli_query($link, "UPDATE tb_gaji SET tb_gaji.total_gaji = tb_gaji.total_gaji + $total_gaji_hari WHERE tb_gaji.periode = $date AND tb_gaji.user_id = $user_id");
            if ($update_absen) {
                echo "<script>alert('Data Successful Send');</script>";
                echo "<script>window.location='../?p=izin';</script>";
            } else {
                echo "<script>alert('Data Failed to Save');</script>";
                echo "<script>window.location='../?p=izin';</script>";
            }
        }
    }
}

if (isset($_POST['tidak_izinkan'])) {
    $id_izin = $_POST['id_izin'];
    $sql = mysqli_query($link, "UPDATE `tb_izin` SET `status` = '0' WHERE `tb_izin`.`id_izin` = $id_izin");
    if ($sql) {
        echo "<script>alert('Data Successful Send');</script>";
        echo "<script>window.location='../?p=izin';</script>";
    } else {
        echo "<script>alert('Data Failed to Save');</script>";
    }
}

if (isset($_POST['edit_gaji'])) {
    $id_gaji = $_POST['id_gaji'];
    $pinjaman = $_POST['pinjaman'];
    $tunjangan_jabatan = $_POST['tunjangan_jabatan'];
    $transport = $_POST['transport'];
    $iuran = $_POST['iuran'];
    $honor_ngajar = $_POST['honor_ngajar'];
    $sql = mysqli_query($link, "UPDATE `tb_gaji` SET `pinjaman` = '$pinjaman', `iuran` = '$iuran', `tunjangan_jabatan` = '$tunjangan_jabatan', `transport` = '$transport', `honor_ngajar` = '$honor_ngajar' WHERE id_gaji = $id_gaji");
    if ($sql) {
        echo "<script>alert('Data Successful Send');</script>";
        echo "<script>window.location='../?p=gaji';</script>";
    } else {
        echo "<script>alert('Data Failed to Save');</script>";
    }
}

if (isset($_POST['edit_user'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_rek = $_POST['no_rek'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $gaji_perjam = $_POST['gaji_perjam'];
    $sql = mysqli_query($link, "UPDATE `tb_user` SET `nama` = '$nama', `email` = '$email', `no_rek` = '$no_rek', `jabatan` = '$jabatan', `alamat` = '$alamat', `tgl_masuk` = '$tgl_masuk', `gaji_perjam` = '$gaji_perjam' WHERE id_user = $id_user");
    if ($sql) {
        echo "<script>alert('Data Successful Send');</script>";
        echo "<script>window.location='../?p=karyawan';</script>";
    } else {
        echo "<script>alert('Data Failed to Save');</script>";
    }
}
