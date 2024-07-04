
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <!-- <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a> -->
    <ul id="topMenu" class="nav pull-right">
    
        <?php 
          $conn = mysqli_connect('localhost', 'root', '', 'toko_jamu');
          if(isset($_SESSION['idUser'])){
            $iduser = $_SESSION['idUser'];
            $queryUser = mysqli_query($conn, "SELECT * FROM tabel_user WHERE idUser='$_SESSION[idUser]'");
            $arrayUser = mysqli_fetch_array($queryUser);
            echo '
            <li class="">
                <a href="proses/logout.php"><button class="btn btn-large btn-danger" id="btn-logout"><strong>Logout</strong></button></a>
            </li>
            ';
          }else{
            echo '
                <li class="">
                  <a href="login.php"><span class="btn btn-large btn-success"><strong>Login</strong></span></a>
                </li>
                <li class="">
                  <a href="daftar.php"><span class="btn btn-large btn btn-primary"><strong>Daftar</strong></span></a>
                </li>
            ';
          }
       ?>
    </ul>
  </div>
</div>
</div>
</div>