<?php
$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama_lengkap'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];


include '../koneksi.php';
$query_validasi = " SELECT * FROM user WHERE nik='$nik'";
$query = mysqli_query($koneksi, $query_validasi);

if(mysqli_num_rows($query)==0){
    $query_register = mysqli_query($koneksi, "INSERT INTO user(nik,nama_lengkap,password,alamat,tgl_lahir)
                                                VALUES('$nik','$nama_lengkap','$password','$alamat','$tgl_lahir')");
    if($query_register){ ?>
    <script>
        alert("Registrasi Berhasil, Silahkan Login");
        window.location.assign("../index.php")
    </script>
    <?php }                                            
}else{ ?>
    <script>
        alert("NIK yang anda gunakan sudah terdaftar");
        window.location.assign("register.php")
    </script>
    <?php 
    } 

