<?php require_once("../koneksi/dbkoneksi.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus</title>
    <?php require_once("header.php") ?>
    <?php require_once("../header.php") ?>
</head>
<body>
    <br>
    <div class="container">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
                <a href="index.php"><h5 class="card-title"><- Back</h5></a>
                <div class="card-tools">
                  <h3>Tambah Kursus</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Kursus</label>
                        <input type="text" name="nama" class="form-control-file" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail Kursus</label>
                        <textarea name="detail" id="detail" class="form-control" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail Kursus</label>
                        <input type="file" name="image" class="form-control-file" id="thumbnail" required>
                    </div>
                    <button type="submit" name="tambah" value="Submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    session_start();
    $pengajar = $_SESSION['id_pengajar'];
    if (isset($_POST['tambah'])) {
        $nama_kursus = $_POST['nama'];
        $detail = $_POST['detail'];
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/img/".$image);
        echo $nama_file;
        $sql = mysqli_query($con,"INSERT INTO `kursus` (`id_kursus`, `nama`, `detail`, `pengajar`, `status`, `image`) VALUES (NULL, '$nama_kursus', '$detail', '$pengajar', 'Premium', '$image');");
        header("Location: index.php");
    }
?>
