<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Data Gaji</h3>
            </div>
            <div class="container">
                <div class="table-responsive py-4">
                    <table class="table" id="gaji" class="display" cellspacing="0" width="100%">
                        <thead class="table-dark">
                            <tr>
                                <th>Detail</th>
                                <th>Periode</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>No Rekening</th>
                                <th>Pinjaman</th>
                                <th>Iuran</th>
                                <th>Makan</th>
                                <th>Transport</th>
                                <th>Operasional</th>
                                <th>Total Gaji</th>
                                <th>Gaji Bersih</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id_user = $_SESSION['id_user'];
                            $tahun = date('Y');
                            $sql = "SELECT * FROM tb_gaji
                                    INNER JOIN tb_user ON tb_gaji.user_id = tb_user.id_user";
                            $query = mysqli_query($link, $sql);
                            while ($hasil = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td>
                                        <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $hasil['id_gaji']; ?>">Detail</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $hasil['id_gaji']; ?>" role="dialog">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h4 class="modal-title" id="modal-title-default">Detail</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="card shadow border-0">
                                                            <div class="card-body px-lg-5 py-lg-5">
                                                                <form>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Periode</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?php echo date("d F Y", mktime(0, 0, 0, $hasil['periode'] + 1, 1, date('Y'))); ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['nama']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Jabatan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['jabatan']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">No Rekening</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['no_rek']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Pinjaman</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['pinjaman']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Iuran</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['iuran']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Makan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['makan']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Transport</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['transport']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Operasional</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['operasional']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Total Gaji</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['total_gaji']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Gaji Bersih</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?php
                                                                                                                $total_bersih = ($hasil['total_gaji'] + $hasil['makan'] + $hasil['makan'] + $hasil['transport']) - ($hasil['pinjaman'] + $hasil['iuran']);
                                                                                                                echo $total_bersih; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo date("d F Y", mktime(0, 0, 0, $hasil['periode'] + 1, 1, date('Y'))); ?></td>
                                    <td><?= $hasil['nama']; ?></td>
                                    <td><?= $hasil['jabatan']; ?></td>
                                    <td><?= $hasil['no_rek']; ?></td>
                                    <td><?= $hasil['pinjaman']; ?></td>
                                    <td><?= $hasil['iuran']; ?></td>
                                    <td><?= $hasil['makan']; ?></td>
                                    <td><?= $hasil['transport']; ?></td>
                                    <td><?= $hasil['operasional']; ?></td>
                                    <td><?= $hasil['total_gaji']; ?></td>
                                    <td><?php
                                        $total_bersih = ($hasil['total_gaji'] + $hasil['makan'] + $hasil['operasional'] + $hasil['transport']) - ($hasil['pinjaman'] + $hasil['iuran']);
                                        echo $total_bersih; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-form-<?php echo $hasil['id_gaji']; ?>">
                                            <i class='fas fa-pencil-alt' style="color: white;"></i>
                                        </a>
                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="modal-form-<?php echo $hasil['id_gaji']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modal-title-default">Edit Gaji</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="card bg-secondary shadow border-0">
                                                            <div class="card-body px-lg-5 py-lg-5">
                                                                <form action="includes/route.php" method="POST">
                                                                    <input type="text" name="id_gaji" hidden value="<?= $hasil['id_gaji']; ?>" id="">
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Pinjaman</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="pinjaman" value="<?= $hasil['pinjaman']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Iuran</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="iuran" value="<?= $hasil['iuran']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Makan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="makan" value="<?= $hasil['makan']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Transport</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="transport" value="<?= $hasil['transport']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Operasional</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="operasional" value="<?= $hasil['operasional']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <center><button type="submit" name="edit_gaji" class="btn btn-primary">Edit</button></center>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-sm btn-danger" href="javascript:hapusData_siswa('<?= $hasil['id_gaji']; ?>')">
                                            <i class='fas fa-trash' style="color: white;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>