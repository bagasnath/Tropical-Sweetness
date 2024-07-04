<?php 
  require('../../config/db.php');

  $filename = md5($_FILES['foto']['name']);
  $error = $_FILES['foto']['error'];
  $tmp_name = $_FILES['foto']['tmp_name'];

  move_uploaded_file($tmp_name, "image/" . $filename.'.png');

  $nama = $_POST['nama'];
  $stock = $_POST['stock'];
  $harga = $_POST['harga'];
  $keterangan = $_POST['keterangan'];

    $query = mysqli_query($conn, "INSERT INTO tabel_produk (gambar, nama, keterangan, harga, stock) VALUES ('$filename', '$nama', '$keterangan', '$harga', '$stock')");

    if($query == true){
      echo '
           <script>
             alert("Produk ditambahkan");
             window.location = "../barang.php"
           </script>
         ';
    }else{
      echo '
     <script>
         alert("Produk gagal ditambahkan");
         window.location="../tambahBarang.php"
       </script>
     ';
    }
    mysqli_close($conn);
  //}

?>
  
