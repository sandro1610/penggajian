<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Data Absensi</h3>
            </div>
            <div class="container">
                <div class="table-responsive py-4">
                    <table class="table" id="absen" class="display" cellspacing="0" width="100%">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th></th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Datang</th>
                                <th>Status</th>
                                <th>Transport</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $sql = "SELECT * FROM tb_absen
                                    INNER JOIN tb_user ON tb_absen.user_id = tb_user.id_user";

                            $query = mysqli_query($link, $sql);
                            while ($hasil = mysqli_fetch_array($query)) :
                            ?>
                                <tr class="text-center">
                                    <td>
                                        <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $hasil['id_absen']; ?>">Detail</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $hasil['id_absen']; ?>" role="dialog">
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
                                                                        <label for="nama" class="col-sm-2 col-form-label">Tanggal</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['tanggal']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Datang</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['datang']; ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Status</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?php if ($hasil['status'] == 1) {
                                                                                                                    echo 'Hadir';
                                                                                                                } elseif ($hasil['status'] == 0) {
                                                                                                                    echo 'Tidak Hadir';
                                                                                                                } else {
                                                                                                                    echo 'Something ERROR';
                                                                                                                }
                                                                                                                ?>" class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Transport</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" disabled value="<?= $hasil['transport']; ?>" class="form-control" id="nama">
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
                                    <td><?= $hasil['datang']; ?></td>
                                    <td><?php if ($hasil['status'] == 1) {
                                            echo '<a href="#" type="button" class="btn btn-success btn-sm">Hadir</a>';
                                        } elseif ($hasil['status'] == 0) {
                                            echo '<a href="#" type="button" class="btn btn-danger btn-sm">Tidak Hadir</a>';
                                        } else {
                                            echo 'Something ERROR';
                                        }
                                        ?></td>
                                    <td><?= $hasil['transport']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="javascript:hapusData_absen('<?= $hasil['id_absen']; ?>')">
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