<?php
$dir = 'pages/';
if (isset($_GET['p'])) {
	$page = $_GET['p'];
	switch ($page) {
		case 'karyawan':
			include $dir . 'karyawan.php';
			break;
		case 'absen':
			include $dir . 'absen.php';
			break;
		case 'izin':
			include $dir . 'izin.php';
			break;
		case 'gaji':
			include $dir . 'gaji.php';
			break;
		case 'delete':
			include $dir . 'delete.php';
			break;
		default:
			include $dir . 'blank.php';
			break;
	}
} else {
	include $dir . 'karyawan.php';
}
