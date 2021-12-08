<?php
include "includes/config.php";
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['password']) && !isset($_SESSION['id_user']) && $_SESSION['level'] != 'Admin') {
  header("Location:index.php");
} 
if(isset($_POST["submit"])){
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jabatan = $_POST['jabatan'];
  $no_rek = $_POST['no_rek'];
  $tgl_masuk = $_POST['tgl_masuk'];
  $level = "User";
  $gaji = $_POST['gaji'];
  $sql = mysqli_query($link,"INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `alamat`, `jabatan`, `no_rek`, `tgl_masuk`, `level`, `gaji`) VALUES (NULL, '$email', '$password', '$nama', '$alamat', '$jabatan', '$no_rek', '$tgl_masuk', '$level', '$gaji')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='admin/index.php';</script>";
  }else {
        echo "<script>alert('Account Failed To Registered');</script>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/icon.png">
    <title>STIE APRIN PALEMBANG</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
    <form method="POST" class="form-signin">
        <h3 class="h3 mb-3 font-weight-normal">Tambah Akun Akun</h3>
        <div class="form-group">
            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" required autofocus>
        </div>
        <br>
        <div class="form-group">
            <input type="email" id="email" class="form-control" name="email" placeholder="E-mail" required>
        </div>
        <br>
        <div class="form-group">
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <br>
        <div class="form-group">
            <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" required>
        </div>
        <br>
        <div class="form-group">
            <input type="text" id="no_rek" class="form-control" name="no_rek" placeholder="No Rekening" required>
        </div>
        <br>
        <div class="form-group">
            <input type="text" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan" required>
        </div>
        <br>
        <div class="form-group">
            <input type="date" id="tgl_masuk" class="form-control" name="tgl_masuk" required>
        </div>
        <br>
        <div class="form-group">
            <input type="text" id="gaji" class="form-control" name="gaji" placeholder="Gaji perjam" required>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Tambah</button>
    </form>
</body>

</html>