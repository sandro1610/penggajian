<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-10">
                        <h3 class="mb-0">Data Karyawan</h3>
                    </div>
                    <div class="col-lg-2">
                        <div class="d-flex justify-content-end">
                            <a href="../registrasi.php" type="button" class="btn btn-warning btn-mb">Tambah User</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="table-responsive py-4">
                    <table class="table" id="user" class="display" cellspacing="0" width="100%">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th></th>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>E-mail</th>
                                <th>No Rekening</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk</th>
                                <th>Gaji</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $sql = "SELECT * FROM tb_user";

                            $query = mysqli_query($link, $sql);
                            while ($hasil = mysqli_fetch_array($query)) :
                            ?>
                                <tr class="text-center">
                                    <td>
                                        <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $hasil['id_user']; ?>">Detail</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $hasil['id_user']; ?>" role="dialog">
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
                                                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['nama']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" disabled value="<?= $hasil['email']; ?>" class="form-control" id="email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="no_rek" class="col-sm-2 col-form-label">No Rekening</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" disabled value="<?= $hasil['no_rek']; ?>" class="form-control" id="no_rek">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" disabled value="<?= $hasil['jabatan']; ?>" class="form-control" id="jabatan">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" disabled value="<?= $hasil['alamat']; ?>" class="form-control" id="alamat">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" disabled value="<?= $hasil['tgl_masuk']; ?>" class="form-control" id="tgl_masuk">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="gaji_karyawan" class="col-sm-2 col-form-label">Gaji</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" disabled value="<?= $hasil['gaji']; ?>" class="form-control" id="gaji_karyawan">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="email" disabled value="<?= $hasil['level']; ?>" class="form-control" id="level">
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
                                    <td><?= $no++; ?></td>
                                    <td><?= $hasil['nama']; ?></td>
                                    <td><?= $hasil['email']; ?></td>
                                    <td><?= $hasil['no_rek']; ?></td>
                                    <td><?= $hasil['jabatan']; ?></td>
                                    <td><?= $hasil['alamat']; ?></td>
                                    <td><?= $hasil['tgl_masuk']; ?></td>
                                    <td><?= $hasil['gaji']; ?></td>
                                    <td><?= $hasil['level']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-form-<?php echo $hasil['id_user']; ?>">
                                            <i class='fas fa-pencil-alt' style="color: white;"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="javascript:hapusData_user('<?= $hasil['id_user']; ?>')">
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
        $sql = "SELECT * FROM tb_user";
        $query = mysqli_query($link, $sql);
        while ($hasil = mysqli_fetch_array($query)) : ?>
            <div class="modal fade" id="modal-form-<?php echo $hasil['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
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
                                    <form method="POST" action="includes/route.php">
                                        <input type="text" name="id_user" hidden value="<?= $hasil['id_user']; ?>" id="">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" value="<?= $hasil['nama']; ?>" class="form-control" id="nama">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" value="<?= $hasil['email']; ?>" class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_rek" class="col-sm-2 col-form-label">No Rekening</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="no_rek" value="<?= $hasil['no_rek']; ?>" class="form-control" id="no_rek">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jabatan" value="<?= $hasil['jabatan']; ?>" class="form-control" id="jabatan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="alamat" value="<?= $hasil['alamat']; ?>" class="form-control" id="alamat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tgl_masuk" value="<?= $hasil['tgl_masuk']; ?>" class="form-control" id="tgl_masuk">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gaji_karyawan" class="col-sm-2 col-form-label">Gaji</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="gaji" value="<?= $hasil['gaji']; ?>" class="form-control" id="gaji_karyawan">
                                            </div>
                                        </div>
                                        <center><button type="submit" name="edit_user" class="btn btn-primary">Edit</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>