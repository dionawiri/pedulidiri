<?php 
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id_catatan = $_GET['id_catatan'];
$nik        = $_SESSION['nik'];


$format     = "\n$nik|$id_catatan";
$file       = fopen('txt/delete_catatan.txt', 'a');
fwrite($file, $format);
fclose($file);
// menghapus data dari database
mysqli_query($koneksi,"delete from catatan where id_catatan='$id_catatan'");

// mengalihkan halaman kembali ke index.php
?>
<script>
        alert("Data Berhasil Dihapus");
        window.location.assign("user.php?url=catatan_perjalanan")
    </script>


