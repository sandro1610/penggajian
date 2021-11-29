<?php
if (isset($_GET['q'])) {
    $q = $_GET['q'];
    switch ($q) {
        case 'user':
            if (isset($_GET['id'])) {
                $id     = $_GET['id'];
                $sql    = "DELETE FROM tb_user WHERE id_user='" . $id . "'";
                $query  = mysqli_query($link, $sql);
                if ($query) {
                    echo "<script>alert('Data Successfully Deleted');</script>";
                    echo "<script>window.location='?p=karyawan';</script>";
                } else {
                    echo "<script>alert('Data Failed To Delete');</script>";
                    echo "<script>window.location='?p=karyawan';</script>";
                }
            }
            break;
        case 'absen':
            if (isset($_GET['id'])) {
                $id     = $_GET['id'];
                $sql    = "DELETE FROM tb_absen WHERE id_absen='" . $id . "'";
                $query  = mysqli_query($link, $sql);
                if ($query) {
                    echo "<script>alert('Data Successfully Deleted');</script>";
                    echo "<script>window.location='?p=absen';</script>";
                } else {
                    echo "<script>alert('Data Failed To Delete');</script>";
                    echo "<script>window.location='?p=absen';</script>";
                }
            }
            break;
        case 'izin':
            if (isset($_GET['id'])) {
                $id     = $_GET['id'];
                $sql    = "DELETE FROM tb_izin WHERE id_izin='" . $id . "'";
                $query  = mysqli_query($link, $sql);
                if ($query) {
                    echo "<script>alert('Data Successfully Deleted');</script>";
                    echo "<script>window.location='?p=izin';</script>";
                } else {
                    echo "<script>alert('Data Failed To Delete');</script>";
                    echo "<script>window.location='?p=izin';</script>";
                }
            }
            break;
        case 'gaji':
            if (isset($_GET['id'])) {
                $id     = $_GET['id'];
                $sql    = "DELETE FROM tb_gaji WHERE id_gaji='" . $id . "'";
                $query  = mysqli_query($link, $sql);
                if ($query) {
                    echo "<script>alert('Data Successfully Deleted');</script>";
                    echo "<script>window.location='?p=gaji';</script>";
                } else {
                    echo "<script>alert('Data Failed To Delete');</script>";
                    echo "<script>window.location='?p=gaji';</script>";
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
