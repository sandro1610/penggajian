<?php
$tgl = '2021-07-08';
$datang = '07:30:00';
$pulang = '14:30:00';
$status = '';
$gaji = 30000;

if (isset($datang)) {
    if (isset($pulang)) {
        $status = 'hadir';
        $time_datang = strtotime($datang);
        $time_pulang = strtotime($pulang);
        $jumlah_time = round(($time_pulang - $time_datang)/3600);
        if ($jumlah_time > 8) {
            $jumlah_time = 8;
        }
        $total_gaji_hari = $jumlah_time*$gaji;
    }elseif (!isset($pulang)) {
        $status = 'tidak hadir';
        $jumlah_time = 0;
        $total_gaji_hari = 0;
    }
}

echo $status;
echo '<br>';
echo $jumlah_time;
echo '<br>';
echo $total_gaji_hari*30;

