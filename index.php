<?php 
  require('config/db.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tropical Sweetness</title>
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
<div id="welcomeLine" class="row">
  <div class="span6">
	<h3>Selamat datang di Tropical Sweetness! 🌴🍍</h3>
  </div>
  <div class="span6">
  <div class="pull-right">
  		<?php 
	        $conn = mysqli_connect('localhost', 'root', '', 'toko_jamu');
	        if(isset($_SESSION['idUser'])){
	          echo '
	            <a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i>Keranjang </span> </a> 
	          ';
	        }else{
	          echo '
	          	<a href="" disabled ><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i>Keranjang </span></a> 
	            ';
	        }
	    ?>
  </div>
  </div>
</div>
<!-- Navbar ================================================== -->
<?php include('component/nav.php'); ?>

<!-- Header End====================================================================== -->
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<img style="height:200dp" src="themes/images/carousel/4.png" alt="special offers"/>

		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<img style="height:200dp" src="themes/images/carousel/6.png" alt=""/>
			
		  </div>
		  </div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">

<!-- Product====================================================================== -->
		<h3> Produk </h3>	
		<hr class="soft"/>
		<p>
		Tropical Sweetness adalah toko online yang menyediakan berbagai macam buah-buahan tropis dengan harga terjangkau. Kami menawarkan buah-buahan segar yang dapat Anda beli langsung melalui website kami. Sebelum melakukan pembelian, kami sarankan Anda untuk mendaftar jika belum memiliki akun dan login jika sudah memiliki akun agar dapat melakukan transaksi dengan mudah. Nikmati pengalaman berbelanja buah tropis terbaik di Tropical Sweetness. Selamat berbelanja!
		</p>
		<hr class="soft"/>
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
			 <br class="clr"/>


<div class="tab-content">
	<div class="tab-pane" id="listView" >
		
		<?php 
		        require("config/db.php");
		        $limit = 999999999999;
		        $sql = mysqli_query($conn, "SELECT count(idProduk) FROM tabel_produk");
		        $row = mysqli_fetch_array($sql);
		        $rec_count = $row[0];
		        if(isset($_GET['page'])){
		          $page = $_GET['page'] + 1;
		          $offset = $limit * $page;
		        }else{
		          $page = 0;
		          $offset = 0;
		        }
		        $left_rec = $rec_count - ($page * $limit);
		        $queryBarang = "SELECT * FROM tabel_produk LIMIT $offset,$limit";
		        $query_barang = mysqli_query($conn, $queryBarang);

		        while($arrayBarang = mysqli_fetch_array($query_barang)){
          echo '
            <div class="row">
              <div id="'.$arrayBarang['idProduk'].'">
                <div class="span2">
                	<img src="admin/proses/image/'.$arrayBarang['gambar'].'.png">
                </div>
                
                <div class="span4">
                    <h3><strong>'.$arrayBarang['nama'].'</strong></h3>
                    <hr class="soft"/>
                    <p><small>'.$arrayBarang['keterangan'].'</small></p>
                    <h5>
                  	Stock : '.$arrayBarang['stock'].' Buah</h5>
                    <br class="clr"/>
                </div>

				<div class="span3 alignR">
				<form class="form-horizontal qtyFrm">
                   <h3>Rp.'.$arrayBarang['harga'].'</h3>

                   <form action="proses/beli.php?idProduk='.$arrayBarang['idProduk'].'&idUser='.$iduser.'" method = "POST">
                  	<h4 style="text-align:center">
                	<input class="span1" style= "margin-right" type="number" value="1" name="jumlah" min="1" max="'.$arrayBarang['stock'].'" style="margin-left:-1vw" name="jumlah">&nbsp';

                if(isset($_SESSION['idUser'])){
                if($arrayBarang['stock'] > 0){
                  echo '
                    <button class="btn btn-large btn-primary"><strong> Add to </strong><i class="icon-shopping-cart"></i></button>
                    </form>';
				}else{
                  echo '
                  <a disabled class="btn btn-large btn-primary" href=""> Add to <i class="icon-shopping-cart"></i></a>';
                  }
                }else{
                  echo '
                   <a disabled class="btn btn-large btn-primary" href=""> Add to <i class="icon-shopping-cart"></i></a>';
              }
               echo '
          		</form>
          		</div>
          </div>
        </div>
        <br>
          ';
        }

		 ?>

		<hr class="soft"/>
	</div>


	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		<?php 
		        require("config/db.php");
		        $sql = mysqli_query($conn, "SELECT count(idProduk) FROM tabel_produk");
		        $limit = 999999999999;
		        $row = mysqli_fetch_array($sql);
		        $rec_count = $row[0];
		        if(isset($_GET['page'])){
		          $page = $_GET['page'] + 1;
		          $offset = $limit * $page;
		        }else{
		          $page = 0;
		          $offset = 0;
		        }
		        $left_rec = $rec_count - ($page * $limit);
		        $queryBarang = "SELECT * FROM tabel_produk LIMIT $offset,$limit";
		        $query_barang = mysqli_query($conn, $queryBarang);

		        while($arrayBarang = mysqli_fetch_array($query_barang)){
          echo '
            <li class="span3">
			  <div class="thumbnail">
              <div id="'.$arrayBarang['idProduk'].'">
                <img src="admin/proses/image/'.$arrayBarang['gambar'].'.png">
                <div class="caption">
                    <h3 style="text-align:center"><strong>'.$arrayBarang['nama'].'</strong></h3>
                    <p><small>'.$arrayBarang['keterangan'].'</small></p>';

                if(isset($_SESSION['idUser'])){
                if($arrayBarang['stock'] > 0){
                	$queryProduk = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE idProduk");
                	$arrayProduk = mysqli_fetch_array($queryProduk);
                  echo '
                  <h5 style="text-align:center">
                  Stock : '.$arrayBarang['stock'].' Buah</h5>

                  <form action="proses/beli.php?idProduk='.$arrayBarang['idProduk'].'&idUser='.$iduser.'" method = "POST">
                  <h4 style="text-align:center">
                	<input class="span1" style= "margin-right" type="number" value="1" name="jumlah" min="1" max="'.$arrayBarang['stock'].'" style="margin-left:-1vw" name="jumlah">
                	
                 </h4>
                    <h4 style="text-align:center">
                  <button class="btn"><strong> Add to </strong><i class="icon-shopping-cart"></i></button>
                  </form>
                  ';
				}else{
                  echo '
					<h5 style="text-align:center">
                  Stock : '.$arrayBarang['stock'].' Buah</h5>

                  <form action="proses/beli.php?idProduk='.$arrayBarang['idProduk'].'&idUser='.$iduser.'" method = "POST">
                  <h4 style="text-align:center">
                	<input class="span1" style= "margin-right" type="number" value="1" name="jumlah" min="1" max="'.$arrayBarang['stock'].'" style="margin-left:-1vw" name="jumlah">

                   <h4 style="text-align:center">
                  <a class="btn disabled"> Add to <i class="icon-shopping-cart"></i></a>

                  </form>
                  ';
                  }
                }else{
                  echo '
					<h5 style="text-align:center">
                  Stock : '.$arrayBarang['stock'].' Buah</h5>

                  <form action="" method = "POST">
                  <h4 style="text-align:center">
                	<input class="span1" style= "margin-right" type="number" value="1" name="jumlah" min="1" max="'.$arrayBarang['stock'].'" style="margin-left:-1vw" name="jumlah">

                   <h4 style="text-align:center">
                  <a class="btn disabled"> Add to <i class="icon-shopping-cart"></i></a>
                  </form>
                  ';
              }
               echo '
                  <a class="btn btn-primary">Rp.'.$arrayBarang['harga'].'</a></h4>
            </div>
          </div>
        </div>
      </li>  
          ';
        }

		 ?>
			
	<hr class="soft"/>
	</div>
</div>

			<br class="clr"/>
</div>
</div>
</div>
</div>

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