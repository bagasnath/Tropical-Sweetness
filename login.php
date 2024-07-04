<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Masuk</title>
    <!-- Ikon-->
    <link rel="shortcut icon" href="themes/images/ico/icon.jpg">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/style.css" media="screen" type="text/css" />

</head>
<body style="background-image: url('bootstrap/img/background1.jpg');">

<div class="container">
  <div class="login-card">
    <h1>Masuk</h1><br>
  <form method="POST" action="proses/login.php">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
   <button type="submit" class="btn-large btn-primary submit">submit</button>
  </form>

  <div class="login-help">
    <a href="daftar.php">Daftar</a>
  </div>
</div>

</div>

</body>

</html>