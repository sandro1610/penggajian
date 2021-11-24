<?php
session_start();
include '../../includes/config.php';

if (isset($_POST['submit_umkm'])) {
    $nama_umkm = $_POST['nama_umkm'];
    $kategori = $_POST['kategori'];
    $status = NULL;
    $alamat = $_POST['alamat'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $gmaps = $_POST['gmaps'];
    $user_id = $_POST['user_id'];
    $v_key = md5(time() . $user_id);

    $query = mysqli_query($link, "INSERT INTO `tb_umkm` (`id_umkm`, `user_id`, `nama_umkm`, `kategori`, `alamat`, `kelurahan`, `kecamatan`, `gmaps`, `status`, `v_key`) 
                                        VALUES (NULL, '$user_id', '$nama_umkm', '$kategori', '$alamat', '$kelurahan', '$kecamatan', '$gmaps', '$status', '$v_key')");

    if ($query) {
        if ($_SESSION['level'] == 'User') {
            echo "<script>alert('Data Successfully Send');</script>";
            echo "<script>window.location='../../index.php?p=umkm';</script>";
        } elseif ($_SESSION['level'] == 'Admin') {
            echo "<script>alert('Data Successfully Send');</script>";
            echo "<script>window.location='../index.php?p=umkm';</script>";
        }
    } else {
        echo "<script>alert('Data Failed to Send');</script>";
        echo "<script>window.location='../index.php?p=umkm';</script>";
    }
}

