<?php 
  session_start();
  if(!isset($_SESSION['idAdmin'])){
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
  <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/icon.jpg">
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">

        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            
            <!-- Log out               -->
            <div class="list-inline-item logout"><a id="logout" href="proses/logout.php" class="nav-link">Logout <i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">

        <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
        <br><br><br>
                <li><a href="user.php"> <i class="icon-home"></i>User </a></li>
                <li><a href="admin.php"> <i class="icon-grid"></i>Admin </a></li>
                <li><a href="barang.php"> <i class="fa fa-bar-chart"></i>Barang </a></li>
                <li class="active"><a href="transaksi.php"> <i class="icon-padnote"></i>Transaksi </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Tabel Transaksi</h2>
          </div>
        </div>
        <br>
        <section class="no-padding-top">
          <div class="container-fluid">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Tabel Transaksi</strong></div>
                  <div class="table-responsive"> 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama Pembeli</th>
                          <th>Nama Barang</th>
                          <th>Total</th>
                          <th>Alamat</th>
                          <th>Tanggal</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                    $conn = mysqli_connect('localhost', 'root', '', 'toko_jamu');
                    $queryBarang = mysqli_query($conn, "SELECT * FROM tabel_transaksi");
                        while($arrayBarang = mysqli_fetch_array($queryBarang)){
                          $queryUser = mysqli_query($conn, "SELECT namaUser, alamat FROM tabel_user WHERE idUser");
                           $arrayUser = mysqli_fetch_array($queryUser);
                          echo '
                            <tr>
                            <td class="nama-user text-center">'.$arrayUser['namaUser'].'</td>
                            <td class="nama-barang text-center" style="width:30vw">'.$arrayBarang['daftarBarang'].'</td>
                            <td class="id-transaksi text-center">Rp. '.$arrayBarang['total'].'</td>
                            <td class="alamat-user text-left">'.$arrayUser['alamat'].'</td>
                            <td class="id-transaksi text-center">'.$arrayBarang['tanggal'].'</td>
                            <td class="hapus"><a href="proses/hapusTransaksi.php?idTransaksi='.$arrayBarang['idTransaksi'].'"><button type="button" class="btn btn-danger"><image src="img/sampah.jpg" width="50dp"></button></a></td>
                          </tr>

                          ';
                      }
                   ?> 
                      </tbody>
                    </table>
                  </div>
                </div>

        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom">2020 &copy; Kelompok 2.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>