<?php 
  require('../../config/db.php');

  $filename = md5($_FILES['foto']['name']);
  $error = $_FILES['foto']['error'];
  $tmp_name = $_FILES['foto']['tmp_name'];

  move_uploaded_file($tmp_name, "image/" . $filename.'.png');

  $id = $_POST['idProduk'];
  $nama = $_POST['nama'];
  $stock = $_POST['stock'];
  $harga = $_POST['harga'];
  $keterangan = $_POST['keterangan'];

    $query = mysqli_query($conn, "UPDATE tabel_produk set nama = '$nama',
    gambar = '$filename',
    keterangan = '$keterangan',
    harga = '$harga',
    stock = '$stock'
    where idProduk = '$id' ");

    if($query == true){
      echo '
           <script>
             alert("Produk Berhasil Diedit");
             window.location = "../barang.php"
           </script>
         ';
    }else{
      echo '
     <script>
         alert("Produk gagal Diedit");
         window.location="../editBarang.php"
       </script>
     ';
    }
    mysqli_close($conn);
  //}

?>
  
