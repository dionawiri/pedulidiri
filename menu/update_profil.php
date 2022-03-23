<?php
session_start();
if(empty($_SESSION['nik'])){?>
    <script>
        alert('Silahkan Login Terlebih Dahulu.')
        window.location.assign('../index.php');
    </script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - Peduli Diri</title>

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15"> 
                </div>
                <div class="sidebar-brand-text mx-3">
                    <img src="../img/who.png" width="25%">Peduli Diri </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
           

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span></a>
            </li>
<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Logout" apabila anda ingin mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    </ul>
                <h3>Aplikasi Peduli Diri - Edit Catatan Perjalanan</h3>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-4 text-gray-800">
                        <?php 
                        $url = @$_GET['url'];
                        if(!empty($url)){
                            switch ($url) {
                                    case 'tulis_catatan':
                                    include 'tulis_catatan.php';
                                    break;

                                    case 'catatan_perjalanan';
                                    include 'catatan_perjalanan.php';
                                
                                    default:
                                    echo "Halaman Tidak Ditemukan";
                                    break;
                                }
                            }else{
                                
                                
                            }
                        ?>
                    </div>

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
        <form method="post" action="proses_update_profil.php">
                <input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
            
            <div class="form-group col-2"> 
               <label>NIK</label> 
               <input name="nik" class="form-control" type="text" value="<?php echo $d['nik']; ?>" disabled>
            </div>
            <div class="form-group col-4"> 
               <label>Nama Lengkap</label> 
               <input name="nama_lengkap" class="form-control" type="text" value="<?php echo $d['nama_lengkap']; ?>" required>
            </div>
            <div class="form-group col-4"> 
               <label>Password</label> 
               <input name="password" class="form-control" type="text" value="<?php echo $d['password']; ?>" required>
            </div>
            <div class="form-group col-4"> 
               <label>Alamat</label> 
               <input name="alamat" class="form-control" type="text" value="<?php echo $d['alamat']; ?>" required>
            </div>
            <div class="form-group col-2">
               <label>Tanggal Lahir</label> 
               <input name="tgl_lahir" class="form-control" type="date" value="<?php echo $d['tgl_lahir']; ?>" required>
            </div>
            <div class="card">
        <div class="card-header">
        <div class="form-group">
                <button type="submit" value="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                
            </div>
    </div>
        </form>
    </div>
</div>
<?php 
	}
	?>

    
                </div>
                    <!-- <img align="left" src="../img/duck.gif" width="10%" >
                    <img  src="../img/duck.gif" width="5%" >
                    <img  src="../img/duck.gif" width="2%" > -->

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Peduli Diri 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->