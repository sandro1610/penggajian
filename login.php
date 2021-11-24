<?php
session_start();
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == 'Admin') {
        header("Location:admin/index.php");
    } elseif ($_SESSION['level'] == 'Siswa') {
        header("Location:siswa/index.php");
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
    <title>PT MAHAPUTRA KARYA</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
    <form action="includes/ceklogin.php" method="POST" class="form-signin">
        <img class="mb-4" src="assets/img/logo.jpeg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Absensi Karyawan</h1>
        <h3 class="h3 mb-3 font-weight-normal">Login</h3>
        <div class="form-group">
            <input type="text" id="email" class="form-control" name="email" placeholder="E-mail" required autofocus>
        </div>
        <br>
        <div class="form-group">
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">MASUK</button>
    </form>
</body>

</html>