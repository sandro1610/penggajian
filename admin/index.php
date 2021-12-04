<?php
include '../includes/config.php';
session_start();
if (empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['id_user'])) {
  header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>STIE APRIN PALEMBANG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/logo.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Page plugins -->
  <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/argon-dashboard.css?v=1.1.0" type="text/css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
</head>


<body>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="index.php">
        <img src="../assets/img/logo.png" width="50" height="50" class="navbar-brand-img">
        <p>STIE APRIN</p>
      </a>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">
                <img src="../assets/img/logo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class=" nav-link" href="?p=karyawan"><i class="fas fa-columns" style="color: orange;"></i> Data Karyawan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?p=absen">
              <i class="fas fa-address-card" style="color: orange;"></i>Data Absen
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?p=izin">
              <i class="fas fa-users" style="color: orange;"></i> Data Izin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?p=gaji">
              <i class="fas fa-users" style="color: orange;"></i> Data Gaji
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <div class="header pb-4 pt-md-5">
      <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
          <!-- User -->
          <ul class="navbar-nav align-items-center d-none d-md-flex ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown">
                <div class="media align-items-center">
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['nama']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <a href="includes/logout.php" class="dropdown-item">
                  <i class="fas fa-running"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="container-fluid mt-3">
      <div class="row mt-3">
        <div class="col-md-12 mb-5 mb-xl-0">

          <?php
          include 'includes/controller-page.php';
          ?>

        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.min.js?v=1.1.0"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#user').DataTable();
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#gaji').DataTable({
        "order": [
          [2, "desc"]
        ]
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#absen').DataTable({
        "order": [
          [2, "desc"]
        ]
      });
    });
  </script>
  <script language="JavaScript" type="text/javascript">
    function hapusData_izin(id) {
      if (confirm("Apakah anda yakin akan menghapus data ini?")) {
        window.location.href = 'index.php?q=izin&p=delete&id=' + id;
      }
    }

    function hapusData_user(id) {
      if (confirm("Apakah anda yakin akan menghapus data ini?")) {
        window.location.href = 'index.php?q=user&p=delete&id=' + id;
      }
    }

    function hapusData_absen(id) {
      if (confirm("Apakah anda yakin akan menghapus data ini?")) {
        window.location.href = 'index.php?q=absen&p=delete&id=' + id;
      }
    }

    function hapusData_gaji(id) {
      if (confirm("Apakah anda yakin akan menghapus data ini?")) {
        window.location.href = 'index.php?q=gaji&p=delete&id=' + id;
      }
    }
  </script>
</body>

</html>