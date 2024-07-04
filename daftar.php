<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

    <title>Daftar</title>
    <!-- Ikon-->
    <link rel="shortcut icon" href="themes/images/ico/icon.jpg">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/style.css" media="screen" type="text/css" />

</head>
<body style="background-image: url('bootstrap/img/background1.jpg');">

<div class="container">
  <div class="login-card">
    <h1>DAFTAR</h1><br>
	  <form method="POST" action="proses/daftar.php">
	  <input type="text" name="nama" placeholder="Nama">
	  <input type="text" name="alamat" placeholder="Alamat">
	  <input type="text" name="telpon" placeholder="Telepon">
	  <input type="text" name="email" placeholder="Email">
	  <input type="password" name="password" placeholder="Password">
	  <input type="password" name="repassword" placeholder="Masukkan Password Lagi">
   <button type="submit" class="btn-large btn-primary submit">submit</button>
  </form>

  <div class="login-help">
    <a href="login.php">Masuk</a>
  </div>
</div>

</div>

</body>

</html>