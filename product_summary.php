<?php 
  require('config/db.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Keranjang Belanja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/trpc.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">

<!-- Navbar ================================================== -->
<?php include('component/nav.php'); ?>

<!-- Header End====================================================================== -->
<!-- Product =============================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">

    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Keranjang Belanja</li>
    </ul>
	<h3> Keranjang Belanja <a href="index.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>	
<table class="table table-bordered">
              <thead>
                <tr>
                  <th><h3>Produk</h3></th>
                  <th><h3>Keterangan</h3></th>
                  <th><h3>Stok</h3></th>
                  <th><h3>Quantity</h3></th>
                  <th><h3>Batal</h3></th>
                  <th><h3>Harga</h3></th>
                  <th><h3>Total</h3></th>
        		</tr>
              </thead>
      <tbody>
              <?php 
            
              $queryKeranjang = mysqli_query($conn, "SELECT * FROM tabel_trolly WHERE idUser='$_SESSION[idUser]' ");
              $jumlah = mysqli_num_rows($queryKeranjang);

              if($jumlah > 0){
                $queryTrolly = "SELECT * FROM tabel_trolly WHERE idUser='$_SESSION[idUser]'";
              $query_trolly = mysqli_query($conn, $queryTrolly);
              while($arrayTrolly = mysqli_fetch_array($query_trolly)){
                $queryProduk = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE idProduk='$arrayTrolly[idProduk]'");
                $arrayProduk = mysqli_fetch_array($queryProduk);
                
        echo '
              <tr>
                  <td><img width="60" src="admin/proses/image/'.$arrayProduk['gambar'].'.png"></td>
                  <td><h4><strong>'.$arrayProduk['nama'].'</strong></h4>
                  '.$arrayProduk['keterangan'].'</td>
                  <td><h5>'.$arrayProduk['stock'].' Buah</h5></td>
                  <td>
                  <h5>'.$arrayTrolly['jumlah'].' Buah</h5>
    		          
    		          </td>
    		          <td>
                    <h5> Rp. '.$arrayProduk['harga'].'</h5>
                   </td>
                   <td>
                    <h5> Rp. '.$arrayTrolly['total'].'</h5>
                   </td>
                   <td>
                   <center>
                    <a href="proses/batalBeli.php?idTrolly='.$arrayTrolly['idTrolly'].'"><button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button></a>
                   </center>
                   </td>
                </tr>';
                }
              
              echo '<tr>
              <td colspan="2">
                <h3>
                  Total yang dibayarkan :
                </h3>
              </td>
                  <td colspan="5">
                  <h3 class="pull-right">
                      
                  ';
                  $query = "SELECT SUM(total) as 'sumtotal' FROM tabel_trolly";
                  $res = mysqli_query($conn, $query);
                  $data = mysqli_fetch_array($res);

                 echo 'Rp.'.$data["sumtotal"];'
                 </h3>
                 </td>
                </tr>';
              echo '<tr>
                  <td colspan="7"><a href="proses/transaksi.php?idUser='.$_SESSION['idUser']."&sumtotal=".$data['sumtotal'].'" class="btn btn-large pull-right">Lanjutkan Transaksi <i class="icon-arrow-right"></i></a></td>
                </tr>';
                
            }
        ?>
        </tbody>
            </table>
            
</div>
</div>
</div>





<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include('component/footer.php'); ?>


<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<?php include('component/themes.php'); ?>
</body>
</html>