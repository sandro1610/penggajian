<!-- Check Section-->
<section class="page-section portfolio">
    <div class="container pt-3">
        <div class="d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8 pl-3">
                        <div class="row">
                            <div class="col-lg-2">
                                <img class="logo-invoice" src="assets/img/logo.jpeg" alt="" srcset="">
                            </div>
                            <div class="col-lg-10 pt-4">
                                <h4>PT MAHAPUTRA KARYA KONTRUKSINDO</h4>
                                <h6>JL. Kol. H.Burlian No 108 Palembang</h6>
                            </div>
                        </div>
                    </div>
                    <?php
                    $id_user = $_SESSION['id_user'];
                    $periode = date('m');
                    $sql = "SELECT * FROM tb_gaji
                            INNER JOIN tb_user ON tb_gaji.user_id = tb_user.id_user
                            WHERE user_id = '$id_user' AND periode = $periode";
                    $query = mysqli_query($link, $sql);
                    $check = mysqli_num_rows($query);
                    if ($check == 1) {
                    $hasil = mysqli_fetch_array($query);
                    ?>
                    <div class="col-lg-4 pt-5">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= $hasil['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Unit Kerja</td>
                                    <td>: <?= $hasil['jabatan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Periode</td>
                                    <td>: <?php
                                            echo date("d F Y", mktime(0, 0, 0, date('m') + 1, 1, date('Y')));
                                            ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <center>
                    <h6>SLIP GAJI</h6>
                </center>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <h6>PENERIMAAN</h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Gaji Pokok</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $hasil_rupiah = number_format($hasil['total_gaji'], 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Tunjangan Operasional</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $hasil_rupiah = number_format($hasil['makan'], 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Uang Makan</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $hasil_rupiah = number_format($hasil['makan'], 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $hasil_rupiah = number_format($hasil['transport'], 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                                <tr style="font-weight: bolder;">
                                    <td>Total Penerimaan</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $total_penerimaan = $hasil['total_gaji'] + $hasil['makan'] + $hasil['makan'] + $hasil['transport'];
                                                        $hasil_rupiah = number_format($total_penerimaan, 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                                <tr style="color: white;">
                                    <td>.</td>
                                    <td>. </td>
                                    <td class="invoice">.</td>
                                </tr>
                                <tr style="font-weight: bolder; border-top: 5px; border-style:solid; border:black;">
                                    <td>Gaji Bersih</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $total_bersih = ($hasil['total_gaji'] + $hasil['makan'] + $hasil['makan'] + $hasil['transport']) - ($hasil['pinjaman'] + $hasil['iuran']);
                                                        $hasil_rupiah = number_format($total_bersih, 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h6>POTONGAN</h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Pinjaman</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $hasil_rupiah = number_format($hasil['pinjaman'], 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Iuran</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $hasil_rupiah = number_format($hasil['iuran'], 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                                <tr style="color: white;">
                                    <td>.</td>
                                    <td>. </td>
                                    <td class="invoice">.</td>
                                </tr>
                                <tr style="color: white;">
                                    <td>.</td>
                                    <td>. </td>
                                    <td class="invoice">.</td>
                                </tr>
                                <tr style="font-weight: bolder;">
                                    <td>Total Potongan</td>
                                    <td> : Rp </td>
                                    <td class="invoice"><?php
                                                        $total_potongan = $hasil['pinjaman'] + $hasil['iuran'];
                                                        $hasil_rupiah = number_format($total_potongan, 2, ',', '.');
                                                        echo $hasil_rupiah;
                                                        ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-7">
                        <br>
                        <br>
                        <br>
                        <p>Dibuat oleh,</p>
                        <br>
                        <br>
                        <p style="text-decoration: underline;">Resi Jatri</p>
                        <p style="margin-top: -15px;">Keuangan</p>
                    </div>
                    <div class="col-md-5">
                        <br>
                        <br>
                        <p>Palembang, <?php
                                        echo date("d F Y", mktime(0, 0, 0, date('m') + 1, 1, date('Y')));
                                        ?></p>
                        <p style="margin-top: -15px;">Diterima oleh,</p>
                        <br>
                        <br>
                        <p style="text-decoration: underline;"><?= $hasil['nama']; ?></p>
                        <p style="margin-top: -15px;"><?= $hasil['jabatan']; ?></p>
                    </div>
                </div>
                <?php } elseif ($check == 0) {?>
                    <div class="col-lg-4 pt-5">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= $_SESSION['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Unit Kerja</td>
                                    <td>: <?= $_SESSION['jabatan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Periode</td>
                                    <td>: <?php
                                            echo date("d F Y", mktime(0, 0, 0, date('m') + 1, 1, date('Y')));
                                            ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <center>
                    <h6>SLIP GAJI</h6>
                </center>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <h6>PENERIMAAN</h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Gaji Pokok</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                                <tr>
                                    <td>Tunjangan Operasional</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                                <tr>
                                    <td>Uang Makan</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                                <tr style="font-weight: bolder;">
                                    <td>Total Penerimaan</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                                <tr style="color: white;">
                                    <td>.</td>
                                    <td>. </td>
                                    <td class="invoice">.</td>
                                </tr>
                                <tr style="font-weight: bolder; border-top: 5px; border-style:solid; border:black;">
                                    <td>Gaji Bersih</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h6>POTONGAN</h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Pinjaman</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                                <tr>
                                    <td>Iuran</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                                <tr style="color: white;">
                                    <td>.</td>
                                    <td>. </td>
                                    <td class="invoice">.</td>
                                </tr>
                                <tr style="color: white;">
                                    <td>.</td>
                                    <td>. </td>
                                    <td class="invoice">.</td>
                                </tr>
                                <tr style="font-weight: bolder;">
                                    <td>Total Potongan</td>
                                    <td> : Rp </td>
                                    <td class="invoice">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-7">
                        <br>
                        <br>
                        <br>
                        <p>Dibuat oleh,</p>
                        <br>
                        <br>
                        <p style="text-decoration: underline;">Resi Jatri</p>
                        <p style="margin-top: -15px;">Keuangan</p>
                    </div>
                    <div class="col-md-5">
                        <br>
                        <br>
                        <p>Palembang, <?php
                                        echo date("d F Y", mktime(0, 0, 0, date('m') + 1, 1, date('Y')));
                                        ?></p>
                        <p style="margin-top: -15px;">Diterima oleh,</p>
                        <br>
                        <br>
                        <p style="text-decoration: underline;"><?= $_SESSION['nama']; ?></p>
                        <p style="margin-top: -15px;"><?= $_SESSION['jabatan']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>