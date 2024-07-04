<?php 
  require('../config/db.php');
  session_start();
  $idBarang = $_GET['idProduk'];
  $idUser = $_GET['idUser'];
  $jumlah = $_POST['jumlah'];

  $query = mysqli_query($conn, "SELECT harga FROM tabel_produk WHERE idProduk='$idBarang'");
  $data = mysqli_fetch_array($query);
  $harga = $data['harga'];
  
$total = $jumlah * $harga;
  $queryInsert = mysqli_query($conn, "INSERT INTO tabel_trolly (idUser, idProduk, jumlah, harga, total) VALUES ('$idUser','$idBarang','$jumlah','$harga','$total')");

  if($queryInsert){
    header('location: ../product_summary.php');
  }



 ?>