<?php
$nik = $_POST['nik'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];

include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE nik='$nik' AND password='$password'");

if(mysqli_num_rows($query)==0){ ?>

    <script>
        alert("NIK dan Nama lengkap tidak ditemukan.");
        window.location.assign("#")
    </script>
    <?php 
    }else{
        session_start();
        $_SESSION['nik'] = $nik;
        $_SESSION['password'] = $password;
        $_SESSION['nama_lengkap'] = $nama_lengkap;
        header("location:user.php");
    }
    ?>

