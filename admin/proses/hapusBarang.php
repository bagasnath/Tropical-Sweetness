<?php 
  require('../../config/db.php');

  $idProduk = $_GET['idProduk'];
  $query = mysqli_query($conn, "DELETE FROM tabel_produk WHERE idProduk = '$idProduk'");
  if($query){
    echo '
      <script>
      alert("Barang berhasil dihapus !");
      window.location = "../barang.php";
      </script>
    ';
  }
 ?>