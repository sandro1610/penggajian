<!-- Check Section-->
<section class="page-section portfolio">
    <div class="container">
        <div class="col-lg-12 pt-5">
            <h2>Data Absen Bulan <?php  echo date('F') ?></h2>
            <table id="absen" class="table">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Hadir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $id_user = $_SESSION['id_user'];
                    $periode = date('m');
                    $sql = "SELECT * FROM tb_absen WHERE user_id = '$id_user' AND MONTH(tanggal) = $periode
                            ORDER BY tanggal DESC";
                    $query = mysqli_query($link, $sql);
                    while ($hasil = mysqli_fetch_array($query)) :
                    ?>
                        <tr>
                            <td><?= $hasil['tanggal']; ?></td>
                            <td><?= $hasil['datang']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>