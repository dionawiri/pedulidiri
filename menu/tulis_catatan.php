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
        <form method="post" action="simpan_catatan.php">
            <div class="form-group">
                <label>Tanggal Perjalanan</label>
                <input type="date" name="tanggal" class="form-control" placeholder="Pilih Tanggal" required>
            </div>
            <div class="form-group">
                <label>Waktu Perjalanan</label>
                <input type="time" name="waktu" class="form-control" placeholder="Pilih Waktu" required>
            </div>
            <div class="form-group">
                <label>Lokasi Perjalanan</label>
                <input type="text" name="lokasi" class="form-control" placeholder="Masukkan lokasi Perjalanan" required>
            </div>
            <div class="form-group">
                <label>Suhu Tubuh</label>
                <input type="text" name="suhu" class="form-control" placeholder="Masukkan Suhu Tubuh" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                
            </div>

            </div>
        </form>
    </div>
    </div>
</div>