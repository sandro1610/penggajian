 <!-- Check Section-->
 <section class="page-section portfolio">
     <div class="container">
         <div class="col-lg-12 pt-2">
             <center>
                 <h1>Izin Karyawan</h1>
                 <form action="includes/route.php" method="post">
                     <div class="col-md-6">
                         <input class="form-control border" type="date" name="tanggal">
                     </div>
                     <div class="col-md-6">
                         <textarea class="form-control border" placeholder="Keterangan" name="keterangan" cols="30" rows="5"></textarea>
                     </div>
                     <button type="submit" name="izin" class="btn btn-lg btn-primary">Izin</button>
                 </form>
             </center>
                 <table id="izin" class="table-responseive">
                     <thead>
                         <tr>
                             <th>Tanggal</th>
                             <th>Keterangan</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $id_user = $_SESSION['id_user'];
                            $periode = date('m');
                            $sql = "SELECT * FROM tb_izin
                            WHERE user_id = '$id_user' AND MONTH(tanggal) = $periode";
                            $query = mysqli_query($link, $sql);
                            while ($hasil = mysqli_fetch_array($query)) :
                            ?>
                             <tr>
                                 <td><?= $hasil['tanggal']; ?></td>
                                 <td><?= $hasil['keterangan']; ?></td>
                                    <td><?php if ($hasil['status'] == 1) {
                                                echo '<a href="#" type="button" class="btn btn-primary btn-sm">Proses</a>';
                                              } elseif ($hasil['status'] == 0) {
                                                echo '<a href="#" type="button" class="btn btn-danger btn-sm">Tidak Diizinkan</a>';
                                              } elseif ($hasil['status'] == 2) {
                                                echo '<a href="#" type="button" class="btn btn-success btn-sm">Diizinkan</a>';
                                              } else {
                                                  echo 'Something ERROR';
                                              }
                                    ?></td>
                             </tr>
                         <?php endwhile; ?>
                     </tbody>
                 </table>
         </div>
     </div>
 </section>