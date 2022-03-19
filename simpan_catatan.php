<?php

session_start();
$nik        = $_SESSION['nik'];
$tanggal    = $_POST['tanggal'];
$waktu      = $_POST['waktu'];
$lokasi     = $_POST['lokasi'];
$suhu       = $_POST['suhu'];

$format = "\n$nik|$tanggal|$waktu|$lokasi|$suhu";
$file = fopen('catatan.txt', 'a');
fwrite($file, $format);
fclose($file);

include 'koneksi.php';
$sql = "INSERT INTO catatan(nik, tanggal, waktu, lokasi, suhu)
        VALUES('$nik','$tanggal','$waktu','$lokasi','$suhu')";
$query = mysqli_query($koneksi, $sql);

if($query){?>
    <script>
        alert("Data Catatan tersimpan");
        window.location.assign("user.php?url=catatan_perjalanan")
    </script>
    <?php 
    } else{?>
    <script>
        alert("Data Tidak Tersimpan!");
        window.location.assign("user.php?url=tulis_catatan")
    </script>
    <?php 
    } 

