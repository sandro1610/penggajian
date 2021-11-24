<?php
/**
 * Informasi untuk koneksi database
 */
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'penggajian';

$link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
