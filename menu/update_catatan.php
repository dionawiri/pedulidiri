<?php

session_start();
$id_catatan = $_POST['id_catatan'];
$nik        = $_SESSION['nik'];
$tanggal    = $_POST['tanggal'];
$waktu      = $_POST['waktu'];
$lokasi     = $_POST['lokasi'];
$suhu       = $_POST['suhu'];

$format     = "\n$nik|$id_catatan|$tanggal|$waktu|$lokasi|$suhu";
$file       = fopen('txt/update_catatan.txt', 'a');
fwrite($file, $format);
fclose($file);

include '../koneksi.php';
$sql = "UPDATE catatan SET tanggal='$tanggal',
                            waktu='$waktu',
                            lokasi='$lokasi',
                            suhu='$suhu'
                            WHERE id_catatan='$id_catatan'";
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
        window.location.assign("user.php?url=update")
    </script>
    <?php 
    } 

