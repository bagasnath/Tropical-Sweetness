<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Edit Barang</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>

<?php
    //mengambil primary key yang dipilih
    require('../config/db.php');
    $id = $_GET ['idProduk'];
    $tampilkan = mysqli_query($conn,"SELECT * FROM tabel_produk where idProduk = '$id'");
    while($array = mysqli_fetch_array($tampilkan)){
    $gambar = $array['gambar'] .".png";
    $nama = $array['nama'];
    $stock = $array['stock'];
    $harga = $array['harga'];
    $keterangan = $array['keterangan'];
    }
    
    ?>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">EDIT BARANG</h2>
                </div>
                <div class="card-body">
                    <form action="proses/editBarang.php" method="POST" enctype="multipart/form-data">
                        <input type=hidden name=idProduk value="<?php echo $id ?>">
                    	<div class="form-row">
                            <div class="name">Foto Barang</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" id="FileToUpload" name="foto" value="<?php echo $gambar ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama Barang</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama" value="<?php echo $nama ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Stok Barang</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="stock" value="<?php echo $stock ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Harga Barang</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text"  name="harga" value="<?php echo $harga ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Keterangan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" name="keterangan" value="<?php echo $keterangan ?>" style="resize:vertical">
                                </div>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->