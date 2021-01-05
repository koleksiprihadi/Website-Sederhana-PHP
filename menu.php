<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/finalproject">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/finalproject/discover.php">ONLINE COURSE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/finalproject">CHALENGE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/finalproject">BLOG</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
</ul>
<?php
$nama_peserta = $_SESSION['nama'];
if ($_SESSION['login'] == false){?>
  <a href="login.php" class="btn btn-success">Login</a>
    
  <a href="daftar.php" class="btn btn-primary">Daftar</a>
<?php } else{?>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Halo, <?php echo $nama_peserta ?>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="profile.php">Profile</a>
      <a class="dropdown-item" href="login.php">Logout</a>
    </div>
  </div>
<?php }?>
  </div>
</nav>