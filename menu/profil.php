<?php
     
	include '../koneksi.php';
	
	$data = mysqli_query($koneksi,"SELECT * FROM user WHERE nik='$_SESSION[nik]'");
	while($d = mysqli_fetch_array($data)){
		?>
	
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
        <form method="post" action="update_profil.php">
                <input type="hidden" name="id_catatan" value="<?php echo $d['id_user']; ?>">
            
            <div class="form-group col-2"> 
               <label>NIK</label> 
               <input name="lokasi" class="form-control" type="text" value="<?php echo $d['nik']; ?>" disabled>
            </div>
            <div class="form-group col-4"> 
               <label>Nama Lengkap</label> 
               <input name="lokasi" class="form-control" type="text" value="<?php echo $d['nama_lengkap']; ?>" disabled>
            </div>
            <div class="form-group col-4"> 
               <label>Password</label> 
               <input name="lokasi" class="form-control" type="text" value="<?php echo $d['password']; ?>" disabled>
            </div>
            <div class="form-group col-4"> 
               <label>Alamat</label> 
               <input name="lokasi" class="form-control" type="text" value="<?php echo $d['alamat']; ?>" disabled>
            </div>
            <div class="form-group col-2">
               <label>Tanggal Lahir</label> 
               <input name="tanggal" class="form-control" type="date" value="<?php echo $d['tgl_lahir']; ?>" disabled>
            </div>
            <div class="card">
        <div class="card-header">
        <a href="update_profil.php" class="btn btn-warning">
            <span class="icon text-white-50">
                 <i class="fas fa-pen"></i>
            </span>
            <span class="text"> Edit</span>
        </a>
    </div>
        </form>
    </div>
</div>
<?php 
	}
	?>