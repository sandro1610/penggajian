<?php
include '../../includes/config.php';
require '../vendor/phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['cek'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $periode = $bulan . "-" . $tahun;
    $sheet->setTitle('Data Gaji' . $periode);
    $sheet->setCellValue('A1', 'Nama');
    $sheet->setCellValue('B1', 'Alamat');
    $sheet->setCellValue('C1', 'No Rekening');
    $sheet->setCellValue('D1', 'Jabatan');
    $sheet->setCellValue('E1', 'Tunjangan Jabatan');
    $sheet->setCellValue('F1', 'Transport');
    $sheet->setCellValue('G1', 'Honor Mengajar');
    $sheet->setCellValue('H1', 'Honor Lainnya');
    $sheet->setCellValue('I1', 'Gaji');
    $sheet->setCellValue('J1', 'Gaji Kotor');
    $sheet->setCellValue('K1', 'Pinjaman');
    $sheet->setCellValue('L1', 'Iuran');
    $sheet->setCellValue('M1', 'Total Gaji');
    $gaji = mysqli_query($link, "SELECT * FROM tb_gaji INNER JOIN tb_user ON tb_gaji.user_id = tb_user.id_user
                                                       WHERE month(periode) = $bulan AND year(periode) = $tahun");
    $row = 2;
    while ($record = mysqli_fetch_array($gaji)) {
        $gaji_kotor = $record['total_gaji'] + $record['tunjangan_jabatan'] + $record['honor_ngajar'] + $record['honor_lainnya'] + $record['transport'];
        $total_bersih = ($record['total_gaji'] + $record['tunjangan_jabatan'] + $record['honor_ngajar'] + $record['honor_lainnya'] + $record['transport']) - ($record['pinjaman'] + $record['iuran']);
        $sheet->setCellValue('A' . $row, $record['nama']);
        $sheet->setCellValue('B' . $row, $record['alamat']);
        $sheet->setCellValue('C' . $row, $record['no_rek']);
        $sheet->setCellValue('D' . $row, $record['jabatan']);
        $sheet->setCellValue('E' . $row, $record['tunjangan_jabatan']);
        $sheet->setCellValue('F' . $row, $record['transport']);
        $sheet->setCellValue('G' . $row, $record['honor_ngajar']);
        $sheet->setCellValue('H' . $row, $record['honor_lainnya']);
        $sheet->setCellValue('I' . $row, $record['total_gaji']);
        $sheet->setCellValue('J' . $row, $gaji_kotor);
        $sheet->setCellValue('K' . $row, $record['pinjaman']);
        $sheet->setCellValue('L' . $row, $record['iuran']);
        $sheet->setCellValue('M' . $row, $total_bersih);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer->save('C:\Users\Lenovo M92Z\Documents\Laporan\Data Gaji '.$periode.'.xlsx');

    header('Location:../?p=gaji');
}
