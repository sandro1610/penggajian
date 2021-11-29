<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Data Izin</h3>
            </div>
            <div class="container">
                <div class="table-responsive py-4">
                    <table class="table" id="user" class="display" cellspacing="0" width="100%">
                        <thead class="table-dark">
                            <tr>
                                <th>Detail</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id_user = $_SESSION['id_user'];
                            $periode = date('m');
                            $sql = "SELECT * FROM tb_izin
                                    INNER JOIN tb_user ON tb_izin.user_id = tb_user.id_user";
                            $query = mysqli_query($link, $sql);
                            while ($hasil = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td>
                                        <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $hasil['id_izin']; ?>">Detail</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $hasil['id_izin']; ?>" role="dialog">
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
                                                                <form method="POST" action="includes/route.php">
                                                                    <input type="text" name="id_izin" value="<?php echo $hasil['id_izin']; ?>" hidden>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['nama']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Tanggal</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['tanggal']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Keterangan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['keterangan']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                                            <?php if ($hasil['status'] == 1) {
                                                                                echo '<button type="submit" name="izinkan" class="btn btn-lg btn-success">Izinkan</button>
                                                                                      <button type="submit" name="tidak_izinkan" class="btn btn-lg btn-danger">Tidak Izinkan</button>';
                                                                            } elseif ($hasil['status'] == 0) {
                                                                                echo '<a href="#" type="button" class="btn btn-danger btn-sm">TIdak diizinkan</a>';
                                                                            } elseif ($hasil['status'] == 2) {
                                                                                echo '<a href="#" type="button" class="btn btn-success btn-sm">Diizinkan</a>';
                                                                            } else {
                                                                                echo 'Something ERROR';
                                                                            }
                                                                            ?>
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
                                    <td><?= $hasil['nama']; ?></td>
                                    <td><?= $hasil['tanggal']; ?></td>
                                    <td><?= $hasil['keterangan']; ?></td>
                                    <td><?php if ($hasil['status'] == 0) {
                                            echo '<a href="#" type="button" class="btn btn-danger btn-sm">Tidak Diizinkan</a>';
                                        } elseif ($hasil['status'] == 1) {
                                            echo '<a href="#" type="button" class="btn btn-primary btn-sm">Proses</a>';
                                        } elseif ($hasil['status'] == 2) {
                                            echo '<a href="#" type="button" class="btn btn-success btn-sm">Diizinkan</a>';
                                        } else {
                                            echo 'Something ERROR';
                                        }
                                        ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="javascript:hapusData_izin('<?= $hasil['id_izin']; ?>')">
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
        <!-- Modal Edit-->
        <?php
        $sql = "SELECT * FROM tb_absen";
        $query = mysqli_query($link, $sql);
        while ($hasil = mysqli_fetch_array($query)) : ?>
            <div class="modal fade" id="modal-form-<?php echo $hasil['id_izin']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Edit Karyawan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <form>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?= $hasil['nama']; ?>" class="form-control" id="nama">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $hasil['email']; ?>" class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_rek" class="col-sm-2 col-form-label">No Rekening</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $hasil['no_rek']; ?>" class="form-control" id="no_rek">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $hasil['jabatan']; ?>" class="form-control" id="jabatan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $hasil['alamat']; ?>" class="form-control" id="alamat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $hasil['tgl_masuk']; ?>" class="form-control" id="tgl_masuk">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gaji_perjam" class="col-sm-2 col-form-label">Gaji Perjam</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $hasil['gaji_perjam']; ?>" class="form-control" id="gaji_perjam">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="level" class="col-sm-2 col-form-label">Level</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $hasil['level']; ?>" class="form-control" id="level">
                                            </div>
                                        </div>
                                        <center><button type="submit" class="btn btn-primary">Edit</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>