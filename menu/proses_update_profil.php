<?php

session_start();

$id_user         = $_POST['id_user'];
$nik             = $_SESSION['nik'];
$nama_lengkap    = $_POST['nama_lengkap'];
$password        = $_POST['password'];
$alamat          = $_POST['alamat'];
$tgl_lahir       = $_POST['tgl_lahir'];

$format = "\n$id_user|$nik|$nama_lengkap|$password|$alamat|$tgl_lahir";
$file = fopen('../txt/update_user.txt', 'a');
fwrite($file, $format);
fclose($file);

include '../koneksi.php';
$sql = "UPDATE user SET     nik='$nik',
                            nama_lengkap='$nama_lengkap',
                            password='$password',
                            alamat='$alamat',
                            tgl_lahir='$tgl_lahir'
                            WHERE id_user='$id_user'";
$query = mysqli_query($koneksi, $sql);

if($query){?>
    <script>
        alert("Data Catatan tersimpan");
        window.location.assign("user.php")
    </script>
    <?php 
    } else{?>
    <script>
        alert("Data Tidak Tersimpan!");
        window.location.assign("profil_update.php")
    </script>
    <?php 
    } 

