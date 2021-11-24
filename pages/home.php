<!-- Check Section-->
<section class="page-section portfolio">
    <div class="container">
        <div style="padding-top: 250px; margin-bottom: 100px;" class="col-lg-12">
            <center>
                <h1>Absensi Karyawan</h1>
                <?php
                $tanggal = mktime(date('m'), date("d"), date('Y'));
                echo "Tanggal : <b> " . date("d-m-Y", $tanggal) . "</b>";
                date_default_timezone_set("Asia/Jakarta");
                $jam = date("H:i:s");
                echo " | Pukul : <b> " . $jam . " " . " </b> ";
                $a = date("H");
                if (($a >= 6) && ($a <= 11)) {
                    echo " <b>, Selamat Pagi !! </b>";
                } else if (($a >= 11) && ($a <= 15)) {
                    echo " , Selamat  Pagi !! ";
                } elseif (($a > 15) && ($a <= 18)) {
                    echo ", Selamat Siang !!";
                } else {
                    echo ", <b> Selamat Malam </b>";
                }
                ?>
                <br>
                <form action="includes/route.php" method="post">
                    <?php
                    $user_id = $_SESSION['id_user'];
                    $hari = date('Y-m-d');
                    $sql = "SELECT * FROM tb_absen WHERE tanggal = '$hari' AND user_id = '$user_id'";
                    $query = mysqli_query($link, $sql);
                    $hasil = mysqli_fetch_array($query);
                    $check = mysqli_num_rows($query);
                    if ($check == 0) {
                    ?>
                        <button type="submit" name="absen" class="btn btn-lg btn-primary">Absen</button>
                    <?php
                    } else if ($hasil['status'] == '0') { ?>
                        <button type="submit" name="pulang" class="btn btn-lg btn-secondary">Pulang</button>
                    <?php } else if ($hasil['status'] == '1') {?>
                        <h3>Sampai Ketemu Besok :)</h3>
                        <?php } ?>
                </form>
            </center>
        </div>
    </div>
</section>