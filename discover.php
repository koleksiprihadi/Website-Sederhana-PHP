<?php require_once("koneksi/dbkoneksi.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Discover</title>
  <?php require_once("header.php") ?>
</head>
<body>
  <?php require_once ("menu.php"); ?>
  <br><br>
  
  <div class="row row-cols-1 row-cols-md-3">
  <?php 
    setcookie('id', '', 0, '/');
    setcookie('nama_kursus', '', 0, '/');
    setcookie('id_pengajar', '', 0, '/');
    $query = mysqli_query($con,"SELECT * FROM kursus");
    while ($list = mysqli_fetch_array($query)) { ?>
      <div class="col mb-4">
        <div class="card">
          <img src="assets/img/<?php echo $list['image'];?>" class="card-img-top" height='250px' alt="">
          <div class="card-body">
            <h5 class="card-title"><?php echo $list['nama']; ?></h5>
            <p class="card-text"><?php echo $list['detail']; ?></p>
            <form action="setcookie.php" method="POST">
              <input type="text" name="nama_kursus" value="<?php echo $list['nama']; ?>" hidden>
              <input type="text" name="id_pengajar" value="<?php echo $list['pengajar']; ?>"hidden>
              <input type="text" name="id_kursus" value="<?php echo $list['id_kursus']; ?>"hidden>
              <input type="submit" class="btn btn-primary">
            </form>
          </div>
          <div class="card-footer"><?php echo $list['status']; ?></div>
        </div>
      </div>
  <?php } ?>
  </div>
</body>
</html>
<?php include_once("assets/js/navbar.php"); ?>