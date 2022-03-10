<div class="card">
        <div class="card-header">
        <a href="user.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
                </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu</th>
                        <th>Update</th> 
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php 
                    include 'koneksi.php';
                    $no     = 1;
                    $sql    = "SELECT * FROM catatan WHERE nik='$_SESSION[nik]'";
                    $query  = mysqli_query($koneksi, $sql);
                    foreach ($query as $value) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['tanggal'] ?></td>
                        <td><?= $value['waktu'] ?></td>
                        <td><?= $value['lokasi'] ?></td>
                        <td><?= $value['suhu'] ?></td> 
                        <td class="text-center"><a href="update.php?id_catatan=<?php echo $value['id_catatan']; ?>"><button type="submit" class="btn btn-warning"><i class="fa fa-pen"></i> </button></a>
                        <a href="update_catatan.php"><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>