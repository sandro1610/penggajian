<?php
$dir = 'pages/';
if (isset($_GET['p'])) {
	$page = $_GET['p'];
	switch ($page) {
		case 'home':
			include $dir . 'home.php';
			break;
		case 'absen':
			include $dir . 'absen.php';
			break;
		case 'slip':
			include $dir . 'slip.php';
			break;
		case 'izin':
			include $dir . 'izin.php';
			break;
		default:
			include $dir . 'blank.php';
			break;
	}
} else {
	include $dir . 'home.php';
}
